<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Application\Product\Store;
use App\Http\Requests\Application\Product\Update;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\ProductCategory;
use App\Models\Account;
use App\Models\Sac;
use App\Models\ProductService;

class ProductController extends Controller
{
    /**
     * Display Products Page
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();
        $categories = ProductCategory::all();
        $inventory_accounts = Account::all();
        $product_sac = Sac::all();
        $product_servicess = ProductService::all();
        // Get Products by Company
        $products = QueryBuilder::for(Product::findByCompany($currentCompany->id))
            ->where('hide', false)
            ->allowedFilters([
                AllowedFilter::partial('name'),
                AllowedFilter::exact('unit_id'),
            ])
            ->oldest()
            ->paginate()
            ->appends(request()->query());

        return view('application.products.index', [
            'products' => $products,
            'categories' => $categories,
            'inventory_accounts' => $inventory_accounts,
            'product_sac'   => $product_sac,
            'product_servicess' => $product_servicess,
        ]);
    }

    /**
     * Display the Form for Creating New Product
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product = new Product();

        // Fill model with old input
        if (!empty($request->old())) {
            $product->fill($request->old());
        }
        $product_sac = Sac::all();
           $categories = ProductCategory::all();
           $product_servicess = ProductService::all();
        return view('application.products.create', [
            'product' => $product,
            'categories' =>  $categories,
            'product_sac' => $product_sac,
            'product_servicess' => $product_servicess,
        ]); 
    }

    /**
     * Store the Product in Database
     *
     * @param \App\Http\Requests\Application\Product\Store $request
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Store $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Redirect back
        $canAdd = $currentCompany->subscription('main')->canUseFeature('products');
        if (!$canAdd) {
            session()->flash('alert-danger', __('messages.you_have_reached_the_limit'));
            return redirect()->route('products', ['company_uid' => $currentCompany->uid]);
        }
        $price = preg_replace('~\D~', '', $request->price);

        $limage = $request->image;
            $limage_new_name = time().$limage->getClientOriginalName();
           $st1= $limage->move('assets/images', $limage_new_name);

        // dd($st1);
        // Create Product and Store in Database
        $product = Product::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'hsn' => $request->hsn,
            'category_id' =>$request->category_id,
            'company_id' => $currentCompany->id,
            'unit_id' => $request->unit_id,
            'price'  => $price,
            'description' => $request->description,
            'image' => $st1,
            'initial_quantity' => $request->initial_quantity,
            'as_date' => $request->as_date,
            'inventory_assests_accounts_id' => $request->initial_quantity,
            'income_account' => $request->income_account,
            'sac_id' => $request->sac_id,
            'abatement' => $request->abatement,
            'service_id'=>$request->service_id,
        ]);

        // Add custom field values
        $product->addCustomFields($request->custom_fields);

        // Add Product Taxes
        if ($request->has('taxes')) {
            foreach ($request->taxes as $tax) {
                $product->taxes()->create([
                    'tax_type_id' => $tax
                ]);
            }
        }
        

        // Record product 
        $currentCompany->subscription('main')->recordFeatureUsage('products');

        session()->flash('alert-success', __('messages.product_added'));
        return redirect()->route('products', ['company_uid' => $currentCompany->uid]);
        
    }

    /**
     * Display the Form for Editing Product
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $product = Product::findOrFail($request->product);
        $categories = ProductCategory::all();
        $product_sac = Sac::all();
        $product_servicess = ProductService::all();
        $inventory_accounts = Account::all();
        return view('application.products.edit', [
            'product' => $product,
            'categories' =>$categories,
            'product_sac' => $product_sac,
            'inventory_accounts' => $inventory_accounts,
            'product_servicess' => $product_servicess,
        ]); 
    }

    /**
     * Update the Product in Database
     *
     * @param \App\Http\Requests\Application\Product\Update $request
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Update $request)
    {
        $user = $request->user();
        
        $currentCompany = $user->currentCompany();

        $product = Product::findOrFail($request->product);
        $price = preg_replace('~\D~', '', $request->price);
        $st1 ='';
        if ($request->hasFile('image')) {
            $limage = $request->image;
            $limage_new_name = time().$limage->getClientOriginalName();
            $st1= $limage->move('assets/images', $limage_new_name);
        }
        // dd($price);
        // Update the Expense
        $product->update([

             'name' => $request->name,
            'sku' => $request->sku,
            'hsn' => $request->hsn,
            'category_id' =>$request->category_id,
            'company_id' => $currentCompany->id,
            'unit_id' => $request->unit_id,
            'price'  => $price,
            'description' => $request->description,
            'image' => $st1,
            'initial_quantity' => $request->initial_quantity,
            'as_date' => $request->as_date,
            'inventory_assests_accounts_id' => $request->initial_quantity,
            'income_account' => $request->income_account,
            'sac_id' => $request->sac_id,
            'abatement' => $request->abatement,
            'service_id'=>$request->service_id,
        ]);
        

        // Update custom field values
        
        $product->updateCustomFields($request->custom_fields);
        


        // Remove old Product Taxes
        $product->taxes()->delete();

        // Update Product Taxes
        if ($request->has('taxes')) {
            foreach ($request->taxes as $tax) {
                $product->taxes()->create([
                    'tax_type_id' => $tax
                ]);
            }
        }

        session()->flash('alert-success', __('messages.product_updated'));
        return redirect()->route('products', ['company_uid' => $currentCompany->uid]);
    }

    /**
     * Delete the Product
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();
        
        $product = Product::findOrFail($request->product);

        // If the product already in use in Invoice Items
        // then return back and flash an alert message
        // if ($product->invoice_items()->exists() && $product->invoice_items()->count() > 0) {
        //     session()->flash('alert-success', __('messages.product_cant_deleted_invoice'));
        //     return redirect()->route('products.edit', ['product' => $request->product, 'company_uid' => $currentCompany->uid]);
        // }

        // // If the product already in use in Estimate Items
        // // then return back and flash an alert message
        // if ($product->estimate_items()->exists() && $product->estimate_items()->count() > 0) {
        //     session()->flash('alert-success', __('messages.product_cant_deleted_estimate'));
        //     return redirect()->route('products.edit', ['product' => $request->product, 'company_uid' => $currentCompany->uid]);
        // }

        // // Delete Product Taxes from Database
        // if ($product->taxes()->exists() && $product->taxes()->count() > 0) {
        //     $product->taxes()->delete();
        // }

        // Delete Product from Database
        $product->delete();

        // Reduce feature
        $currentCompany->subscription('main')->reduceFeatureUsage('products');
        
        session()->flash('alert-success', __('messages.product_deleted'));
        return redirect()->route('products', ['company_uid' => $currentCompany->uid]);
    }

    public function customerstore(Store $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Redirect back
        $canAdd = $currentCompany->subscription('main')->canUseFeature('products');
        if (!$canAdd) {
            session()->flash('alert-danger', __('messages.you_have_reached_the_limit'));
            return redirect()->route('products', ['company_uid' => $currentCompany->uid]);
        }
        $price = preg_replace('~\D~', '', $request->price);
        $limage = $request->image;
        $limage_new_name = time().$limage->getClientOriginalName();
       $st1= $limage->move('assets/images', $limage_new_name);
        // dd($price);
        // Create Product and Store in Database
        $product = Product::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'hsn' => $request->hsn,
            'category_id' =>$request->category_id,
            'company_id' => $currentCompany->id,
            'unit_id' => $request->unit_id,
            'price'  => $price,
            'description' => $request->description,
            'image' => $st1,
            'initial_quantity' => $request->initial_quantity,
            'as_date' => $request->as_date,
            'inventory_assests_accounts_id' => $request->initial_quantity,
            'income_account' => $request->income_account,
            'sac_id' => $request->sac_id,
            'abatement' => $request->abatement,
            'service_id'=>$request->service_id,
        ]);

        // Add custom field values
        $product->addCustomFields($request->custom_fields);

        // Add Product Taxes
        if ($request->has('taxes')) {
            foreach ($request->taxes as $tax) {
                $product->taxes()->create([
                    'tax_type_id' => $tax
                ]);
            }
        }
        

        // Record product 
        $currentCompany->subscription('main')->recordFeatureUsage('products');

        session()->flash('alert-success', __('messages.product_added'));
        return redirect()->route('invoices.create', ['company_uid' => $currentCompany->uid]);
        
    }
    public function estimatestore(Store $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Redirect back
        $canAdd = $currentCompany->subscription('main')->canUseFeature('products');
        if (!$canAdd) {
            session()->flash('alert-danger', __('messages.you_have_reached_the_limit'));
            return redirect()->route('products', ['company_uid' => $currentCompany->uid]);
        }
        $price = preg_replace('~\D~', '', $request->price);
        $limage = $request->image;
        $limage_new_name = time().$limage->getClientOriginalName();
       $st1= $limage->move('assets/images', $limage_new_name);
        // dd($price);
        // Create Product and Store in Database
        $product = Product::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'hsn' => $request->hsn,
            'category_id' =>$request->category_id,
            'company_id' => $currentCompany->id,
            'unit_id' => $request->unit_id,
            'price'  => $price,
            'description' => $request->description,
            'image' => $st1,
            'initial_quantity' => $request->initial_quantity,
            'as_date' => $request->as_date,
            'inventory_assests_accounts_id' => $request->initial_quantity,
            'income_account' => $request->income_account,
            'sac_id' => $request->sac_id,
            'abatement' => $request->abatement,
            'service_id'=>$request->service_id,
        ]);

        // Add custom field values
        $product->addCustomFields($request->custom_fields);

        // Add Product Taxes
        if ($request->has('taxes')) {
            foreach ($request->taxes as $tax) {
                $product->taxes()->create([
                    'tax_type_id' => $tax
                ]);
            }
        }
        

        // Record product 
        $currentCompany->subscription('main')->recordFeatureUsage('products');

        session()->flash('alert-success', __('messages.product_added'));
        return redirect()->route('estimates.create', ['company_uid' => $currentCompany->uid]);
        
    }
    // public function delete(Request $request)
    // {
    //     $user = $request->user();
    //     $currentCompany = $user->currentCompany();
        
    //     $accounts = AccountDetail::findOrFail($request->account_detail);
        
    //     // Delete Expense Category from Database
    //     $accounts->delete();

    //     session()->flash('alert-success', __('messages.account_deleted'));
    //     return redirect()->route('settings.account_details', ['company_uid' => $currentCompany->uid]);
    // }
}
