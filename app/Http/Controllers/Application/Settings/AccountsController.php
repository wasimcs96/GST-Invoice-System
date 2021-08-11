<?php

namespace App\Http\Controllers\Application\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\AccountDetail;

class AccountsController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Get Expense Categories by Company
        $accounts = Account::findByCompany($currentCompany->id)->paginate(15);

        return view('application.settings.accounting.index', [
            'accounts' => $accounts,
        ]);
    }  

    public function create(Request $request)
    {
        $accounts = new Account();
        $details = AccountDetail::all();
        // Fill model with old input
        // if (!empty($request->old())) {
        //     $expense_category->fill($request->old());
        // }

        return view('application.settings.accounting.create', [
            'accounts' => $accounts,
            'details' => $details,
        ]);
    }
 
    /**
     * Store the Expense Category in Database
     *
     * @param \App\Http\Requests\Application\Settings\ExpenseCategory\Store $request
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Create Expense Category and Store in Database
        Account::create([
            'name' => $request->name,
            'company_id' => $currentCompany->id,
            'detail_id'=> $request->detail_id,
            'account_type'=> $request->account_type,
            'description'=> $request->description,
            'tax'=> $request->tax,
            'balance'=> $request->balance,
            'as_date'=> $request->as_date,


        ]);
 
        session()->flash('alert-success', __('messages.account added'));
        return redirect()->route('settings.accounts_setting', ['company_uid' => $currentCompany->uid]);
    }

    /**
     * Display the Form for Editing Expense Category
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $accounts = Account::findOrFail($request->product_category);
 
        return view('application.settings.accounting.edit', [
            'accounts' => $accounts,
        ]);
    }

    /**
     * Update the Expense Category
     *
     * @param \App\Http\Requests\Application\Settings\ExpenseCategory\Update $request
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        $accounts = Account::findOrFail($request->Account);
        
        // Update Expense Category in Database
        $accounts->update([
            'name' => $request->name,
            'company_id' => $currentCompany->id,
            'detail_id'=> $request->detail_id,
            'account_type'=> $request->account_type,
            'description'=> $request->description,
            'tax'=> $request->tax,
            'balance'=> $request->balance,
            'as_date'=> $request->as_date,
        ]);
 
        session()->flash('alert-success', __('messages.account_updated'));
        return redirect()->route('settings.accounting', ['company_uid' => $currentCompany->uid]);
    }

    /**
     * Delete the Expense Category
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();
        
        $accounts = Account::findOrFail($request->Account);
        
        // Delete Expense Category from Database
        $accounts->delete();

        session()->flash('alert-success', __('messages.account_deleted'));
        return redirect()->route('settings.accounting', ['company_uid' => $currentCompany->uid]);
    }

    public function invoicestore(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Create Expense Category and Store in Database
        Account::create([
            'name' => $request->name,
            'company_id' => $currentCompany->id,
            'detail_type'=> $request->detail_type,
            'account_type'=> $request->account_type,
            'description'=> $request->description,
            'tax'=> $request->tax,
            'balance'=> $request->balance,
            'as_date'=> $request->as_date,
       
        ]);
 
        session()->flash('alert-success', __('messages.account_added'));
        return redirect()->route('invoices.create', ['company_uid' => $currentCompany->uid]);
    }
}
