<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Vendor;
use App\Models\Estimate;
use App\Models\State;
use App\Models\City;
use App\Models\Supplier;
use App\Models\ProductCategory;
use App\Models\ExpenseCategory;
use App\Models\Account;
use App\Models\AccountDetail;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Requests\Application\Expense\Store;
use App\Http\Requests\Application\Expense\Update;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Auth;
use App\Models\TaxType;


class ExpenseController extends Controller
{
    /**
     * Display Expenses Page
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();
 
        // Get Expenses by Company
        $expenses = QueryBuilder::for(Expense::findByCompany($currentCompany->id))
            ->allowedFilters([
                AllowedFilter::exact('expense_category_id'),
                AllowedFilter::scope('from'),
                AllowedFilter::scope('to'),
            ])
            ->oldest()
            ->paginate()
            ->appends(request()->query());

        return view('application.expenses.index', [
            'expenses' => $expenses
        ]); 
    }

    /**
     * Display the Form for Creating New Expense
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */

      public function newCreate(Request $request){
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Get next Estimate number if the auto generation option is enabled
        $estimate_prefix = $currentCompany->getSetting('estimate_prefix');
        $next_estimate_number = Estimate::getNextestimateNumber($currentCompany->id, $estimate_prefix);

        // Create new Estimate model and set estimate_number and company_id
        // so that we can use them in the form
        $estimate = new Estimate();
        $estimate->estimate_number = $next_estimate_number ?? 0;
        $estimate->company_id = $currentCompany->id;
        $expense = new Expense();

        // Also for filling form data and the ui
        $customers = $currentCompany->customers;
        $states = State::all();
        $citie = City::all();
        $details = AccountDetail::all();
        $categories = ProductCategory::all();
         // $suppliers = Supplier::findByCompany($currentCompany->id);
         $suppliers = Supplier::all();
         // $paymethod = PaymentMethod::findByCompany($currentCompany->company_id);
         $paymethod = PaymentMethod::all();
         $account = Account::all();
         $all_taxes =TaxType::all();
        $products = $currentCompany->products;
        $tax_per_item = (boolean) $currentCompany->getSetting('tax_per_item');
        $discount_per_item = (boolean) $currentCompany->getSetting('discount_per_item');

        return view('application.expenses.create', [
            'estimate' => $estimate,
            'expense' => $expense,
            'customers' => $customers,
            'products' => $products,
            'tax_per_item' => $tax_per_item,
            'discount_per_item' => $discount_per_item,
            'states' => $states,
            'categories' => $categories,
            'suppliers'=> $suppliers,
            'paymethod'=> $paymethod,
            'citie' => $citie,
            'account' => $account,
            'details' => $details,
            'all_taxes' => $all_taxes,
        ]);
      }
     

    public function create(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        $expense = new Expense();
        // $suppliers = Supplier::findByCompany($currentCompany->id);
        $suppliers = Supplier::all();
        // $paymethod = PaymentMethod::findByCompany($currentCompany->company_id);
        $paymethod = PaymentMethod::all();
        $accounts = Account::all();



        $tax_per_item = (boolean) $currentCompany->getSetting('tax_per_item');
        // Fill model with old input
        if (!empty($request->old())) {
            $expense->fill($request->old());
        }

        // Vendors list for select2 options
        $vendors = Vendor::findByCompany($currentCompany->id)->get();

        return view('application.expenses.create', [
            'expense' => $expense,
            'vendors' => $vendors,
            'tax_per_item'=> $tax_per_item,
            'suppliers'=> $suppliers,
            'paymethod'=> $paymethod,
            'accounts' => $accounts,
        ]); 
    }

    /**
     * Store the Expense in Database
     *
     * @param \App\Http\Requests\Application\Expense\Store $request
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $user = $request->user();
        $currentCompany = $user->currentCompany();
        $limage = $request->attachment;
        $limage_new_name = time().$limage->getClientOriginalName();
       $st1= $limage->move('assets/images', $limage_new_name);
        // Create Expense and Store in Database
        $expense = Expense::create([
            'supplier_id'=>$request->supplier_id,
            'company_id' => $currentCompany->id,
            // 'vendor_id' => $request->vendor_id,
            'payment_date' => $request->payment_date,
            'payment_type_id' => $request->payment_method,
            'payment_account_id' => $request->payment_account_id,
            'reference_number' => $request->reference_number,
            'sub_total'=>$request->sub_total,
            'total' => $request->grand_total,
            'amount' =>  $request->grand_total,
            'attachment' => $st1
        ]);

        $categorys = $request->expense_category_id;
        $prices = $request->price;
        $totals = $request->total;
        $desc = $request->description;

        // dd($categorys);
        // Add products (estimate items)

        // for ($i=0; $i < count(array($category)); $i++) {   

        //     $item = $expense->items()->create([
        //         'expense_category_id' => $category[$i],
        //         'company_id' => $currentCompany->id,
        //         'price' => $prices[$i],
        //         'total' => $totals[$i],
        //         'description' => $desc[$i],

        //     ]);

          
        // }
            // dd($categorys);
        for ($i=0; $i < count($categorys); $i++) {    
            
            $category = ExpenseCategory::firstOrCreate(
                ['id' => $categorys[$i], 'company_id' => $currentCompany->id],
                ['name' => $categorys[$i], 'price' => $prices[$i], 'hide' => 1]
            );

            // dd($category,$categorys[$i],$i,$categorys,count($categorys));

            $item = $expense->items()->create([
                'expense_category_id' => $category->id,
                'company_id' => $currentCompany->id,
                'price' => $prices[$i],
                'total' => $totals[$i],
                'description' => $desc[$i],

            ]);
            // dd($item);

          
        }

        // If Estimate based taxes are given
        if ($request->has('total_taxes')) {
            foreach ($request->total_taxes as $tax) {
                $expense->taxes()->create([
                    'tax_type_id' => $tax
                ]);
            }
        }

        // Add custom field values
        $expense->addCustomFields($request->custom_fields);

        // Upload Receipt File
        if ($request->receipt) {
            $request->validate(['receipt' => 'required|image|mimes:png,jpg|max:2048']);
            $path = $request->receipt->storeAs('receipts', 'receipt-'. $expense->id .'.'.$request->receipt->getClientOriginalExtension(), 'public_dir');
            $expense->receipt = '/uploads/'.$path;
            $expense->save();
        }

        session()->flash('alert-success', __('messages.expense_added'));
        return redirect()->route('expenses', ['company_uid' => $currentCompany->uid]);
    }

    /**
     * Display the Form for Editing Expense
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();
        // $customers = $currentCompany->customers;
        $states = State::all();
        $citie = City::all();
        $details = AccountDetail::all();
        $categories = ExpenseCategory::all();
         // $suppliers = Supplier::findByCompany($currentCompany->id);
         $suppliers = Supplier::all();
         // $paymethod = PaymentMethod::findByCompany($currentCompany->company_id);
         $paymethod = PaymentMethod::all();
         $account = Account::all();
        $tax_per_item = (boolean) $currentCompany->getSetting('tax_per_item');
        $discount_per_item = (boolean) $currentCompany->getSetting('discount_per_item');

        $expense = Expense::findOrFail($request->expense);

        // Vendors list for select2 options
        $vendors = Vendor::findByCompany($currentCompany->id)->get();

        return view('application.expenses.edit', [
            'expense' => $expense,
            'vendors' => $vendors,
            'tax_per_item' => $tax_per_item,
            'discount_per_item' => $discount_per_item,
            'states' => $states,
            'categories' => $categories,
            'suppliers'=> $suppliers,
            'paymethod'=> $paymethod,
            'citie' => $citie,
            'account' => $account,
            'details' => $details,
        ]);
    }

    public function newedit($expense,$id)
    {
        $user = Auth::user()->id;
        
        $currentCompany = Auth::user()->currentCompany();
        // dd($id);
        $expense = Expense::findOrFail($id);

        // dd($expense);
        $details = AccountDetail::all();
        // $categories = ExpenseCategory::all();
        $suppliers = Supplier::all();
         // $paymethod = PaymentMethod::findByCompany($currentCompany->company_id);
         $paymethod = PaymentMethod::all();
         $account = Account::all();

        // Filling form data and the ui
        $customers = $currentCompany->customers;
        $categories = $currentCompany->categories;

        return view('application.expenses.edit', [
            'expense' => $expense,
            'customers' => $customers,
            'categories' => $categories,
            'tax_per_item' => $expense->tax_per_item,
            'discount_per_item' => $expense->discount_per_item,
            'details' => $details,
            'categories' => $categories,
            'suppliers' => $suppliers,
            'paymethod' => $paymethod,
            'account' => $account
        ]);
    }

    /**
     * Update the Expense in Database
     *
     * @param \App\Http\Requests\Application\Expense\Update $request
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();
        
        $expense = Expense::findOrFail($request->expense);
        $st1 ='';
        if ($request->hasFile('attachment')) {
            $limage = $request->attachment;
            $limage_new_name = time().$limage->getClientOriginalName();
            $st1= $limage->move('assets/images', $limage_new_name);
        }
        
        // Update the Expense
        $expense->update([
            'supplier_id'=>$request->supplier_id,
            'company_id' => $currentCompany->id,
            // 'vendor_id' => $request->vendor_id,
            'payment_date' => $request->payment_date,
            'payment_type_id' => $request->payment_method,
            'payment_account_id' => $request->payment_account_id,
            'reference_number' => $request->reference_number,
            'sub_total'=>$request->sub_total,
            'total' => $request->grand_total,
            'amount' =>  $request->grand_total,
            'attachment' => $st1
        ]);

        $categorys = $request->expense_category_id;
        $prices = $request->price;
        $totals = $request->total;
        $desc = $request->description;

        $expense->items()->delete();
        // dd($category);
        // Add products (estimate items)
        for ($i=0; $i < count($categorys); $i++) {    
            
            $category = ExpenseCategory::firstOrCreate(
                ['id' => $categorys[$i], 'company_id' => $currentCompany->id],
                ['name' => $categorys[$i], 'price' => $prices[$i], 'hide' => 1]
            );

            // dd($category,$categorys[$i],$i,$categorys,count($categorys));

            $item = $expense->items()->create([
                'expense_category_id' => $category->id,
                'company_id' => $currentCompany->id,
                'price' => $prices[$i],
                'total' => $totals[$i],
                'description' => $desc[$i],

            ]);
            // dd($item);

          
        }
        
        $expense->taxes()->delete();
        // If Estimate based taxes are given
        if ($request->has('total_taxes')) {
            foreach ($request->total_taxes as $tax) {
                $expense->taxes()->create([
                    'tax_type_id' => $tax
                ]);
            }
        }
        // Update custom field values
        $expense->updateCustomFields($request->custom_fields);

        // Upload Receipt File
        if ($request->receipt) {
            $request->validate(['receipt' => 'required|image|mimes:png,jpg|max:2048']);
            $path = $request->receipt->storeAs('receipts', 'receipt-'. $expense->id .'.'.$request->receipt->getClientOriginalExtension(), 'public_dir');
            $expense->receipt = '/uploads/'.$path;
            $expense->save();
        }

        session()->flash('alert-success', __('messages.expense_updated'));
        return redirect()->route('expenses.edit', ['expense' => $expense->id, 'company_uid' => $currentCompany->uid]);
    }

    /**
     * Delete the Expense
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();
        
        $expense = Expense::findOrFail($request->expense);

        // Delete Expense from Database
        $expense->delete();

        session()->flash('alert-success', __('messages.expense_deleted'));
        return redirect()->route('expenses', ['company_uid' => $currentCompany->uid]);
    }
}
