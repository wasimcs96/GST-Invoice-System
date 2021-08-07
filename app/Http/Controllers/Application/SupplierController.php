<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Supplier;

class SupplierController extends Controller
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
 
        // Get Products by Company
        $suppliers = Supplier::findByCompany($currentCompany->id)
            ->get();

        return view('application.suppliers.index', [
            'suppliers' => $suppliers
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
        $supplier = new Supplier();

        // Fill model with old input
        if (!empty($request->old())) {
            $supplier->fill($request->old());
        }

        return view('application.suppliers.create', [
            'supplier' => $supplier,
        ]); 
    }

    /**
     * Store the Product in Database
     *
     * @param \App\Http\Requests\Application\Product\Store $request
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Redirect back
        // $canAdd = $currentCompany->subscription('main')->canUseFeature('products');
        // if (!$canAdd) {
        //     session()->flash('alert-danger', __('messages.you_have_reached_the_limit'));
        //     return redirect()->route('products', ['company_uid' => $currentCompany->uid]);
        // }
        // $price = preg_replace('~\D~', '', $request->price);
        
        // dd($price);
        // Create Product and Store in Database

        $limage = $request->attachment;
        $limage_new_name = time().$limage->getClientOriginalName();
       $st1= $limage->move('assets/images', $limage_new_name);

        $supplier = Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'phone' =>$request->phone,
            'company_id' => $currentCompany->id,
            'display_name' => $request->display_name,
            'website'  => $request->website,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'country' => $request->country,
            'pin_code' =>$request->pin_code,
            'billing_rate' => $request->billing_rate,
            'pan_number' => $request->pan_number,
            'attachment'  => $st1,
            'tds_entity' => $request->tds_entity,
            'tds_section' => $request->tds_section,
            'notes' => $request->notes,
            'balance' => $request->balance,
            'balance_date' => $request->balance_date,
            'account_number' =>$request->account_number,
            'gst_type' => $request->gst_type,
            'gstin' => $request->gstin,
            'tax_reg_number'  => $request->tax_reg_number,
            'effective_date' => $request->effective_date,
        ]);
        
        

        // Record product 
        $currentCompany->subscription('main')->recordFeatureUsage('products');

        session()->flash('alert-success', __('messages.product_added'));
        return redirect()->route('suppliers', ['company_uid' => $currentCompany->uid]);
        
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
        $supplier = Supplier::findOrFail($request->supplier);

        return view('application.suppliers.edit', [
            'supplier' => $supplier,
        ]); 
    }

    /**
     * Update the Product in Database
     *
     * @param \App\Http\Requests\Application\Product\Update $request
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = $request->user();
        
        $currentCompany = $user->currentCompany();

        $supplier = Supplier::findOrFail($request->supplier);

        $limage = $request->attachment;
        $limage_new_name = time().$limage->getClientOriginalName();
       $st1= $limage->move('assets/images', $limage_new_name);
        
        // dd($price);
        // Update the Expense
        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'phone' =>$request->phone,
            'company_id' => $currentCompany->id,
            'display_name' => $request->display_name,
            'website'  => $request->website,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'country' => $request->country,
            'pin_code' =>$request->pin_code,
            'billing_rate' => $request->billing_rate,
            'pan_number' => $request->pan_number,
            'attachment'  => $st1,
            'tds_entity' => $request->tds_entity,
            'tds_section' => $request->tds_section,
            'notes' => $request->notes,
            'balance' => $request->balance,
            'balance_date' => $request->balance_date,
            'account_number' =>$request->account_number,
            'gst_type' => $request->gst_type,
            'gstin' => $request->gstin,
            'tax_reg_number'  => $request->tax_reg_number,
            'effective_date' => $request->effective_date,
        ]);

        session()->flash('alert-success', __('messages.product_updated'));
        return redirect()->route('suppliers', ['company_uid' => $currentCompany->uid]);
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
        
        $supplier = Supplier::findOrFail($request->supplier);

        // If the product already in use in Invoice Items
        // then return back and flash an alert message
        // if ($product->invoice_items()->exists() && $product->invoice_items()->count() > 0) {
        //     session()->flash('alert-success', __('messages.product_cant_deleted_invoice'));
        //     return redirect()->route('products.edit', ['product' => $request->product, 'company_uid' => $currentCompany->uid]);
        // }

        // If the product already in use in Estimate Items
        // then return back and flash an alert message
        // if ($product->estimate_items()->exists() && $product->estimate_items()->count() > 0) {
        //     session()->flash('alert-success', __('messages.product_cant_deleted_estimate'));
        //     return redirect()->route('products.edit', ['product' => $request->product, 'company_uid' => $currentCompany->uid]);
        // }

        // Delete Product Taxes from Database
        // if ($product->taxes()->exists() && $product->taxes()->count() > 0) {
        //     $product->taxes()->delete();
        // }

        // Delete Product from Database
        $supplier->delete();

        // Reduce feature
        $currentCompany->subscription('main')->reduceFeatureUsage('products');
        
        session()->flash('alert-success', __('messages.product_deleted'));
        return redirect()->route('suppliers', ['company_uid' => $currentCompany->uid]);
    }
}
