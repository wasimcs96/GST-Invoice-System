<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ledger;
use App\Models\Vendor;
use App\Http\Requests\Application\Ledger\Store;
use App\Http\Requests\Application\Ledger\Update;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class LedgerController extends Controller
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
        $expenses = QueryBuilder::for(Ledger::findByCompany($currentCompany->id))
            ->allowedFilters([
                AllowedFilter::exact('expense_category_id'),
                AllowedFilter::scope('from'),
                AllowedFilter::scope('to'),
            ])
            ->oldest()
            ->paginate()
            ->appends(request()->query());

        return view('application.ledgers.index', [
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
    public function create(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        $expense = new Ledger();

        // Fill model with old input
        if (!empty($request->old())) {
            $expense->fill($request->old());
        }

        // Vendors list for select2 options
        $vendors = Vendor::findByCompany($currentCompany->id)->get();

        return view('application.ledgers.create', [
            'expense' => $expense,
            'vendors' => $vendors
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
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Create Expense and Store in Database
        $expense = Ledger::create([
            'expense_category_id' => $request->expense_category_id,
            'amount' => $request->amount,
            'company_id' => $currentCompany->id,
            'vendor_id' => $request->vendor_id,
            'expense_date' => $request->expense_date,
            'notes' => $request->notes,
        ]);

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
        return redirect()->route('ledgers', ['company_uid' => $currentCompany->uid]);
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

        $expense = Ledger::findOrFail($request->ledger);

        // Vendors list for select2 options
        $vendors = Vendor::findByCompany($currentCompany->id)->get();

        return view('application.ledgers.edit', [
            'expense' => $expense,
            'vendors' => $vendors,
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

        $expense = Ledger::findOrFail($request->ledger);
        
        // Update the Expense
        $expense->update([
            'expense_category_id' => $request->expense_category_id,
            'amount' => $request->amount,
            'vendor_id' => $request->vendor_id,
            'expense_date' => $request->expense_date,
            'notes' => $request->notes,
        ]);

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
        return redirect()->route('ledgers.edit', ['ledger' => $expense->id, 'company_uid' => $currentCompany->uid]);
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
        
        $expense = Ledger::findOrFail($request->ledger);

        // Delete Expense from Database
        $expense->delete();

        session()->flash('alert-success', __('messages.expense_deleted'));
        return redirect()->route('ledgers', ['company_uid' => $currentCompany->uid]);
    }
}
