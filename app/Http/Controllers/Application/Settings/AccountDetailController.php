<?php

namespace App\Http\Controllers\Application\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountDetail;
use App\Models\Account;


class AccountDetailController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Get Expense Categories by Company
        $account_details = AccountDetail::findByCompany($currentCompany->id)->paginate(15);

        return view('application.settings.account_detail.index', [
            'account_details' => $account_details,
        ]);
    }
 
    /**
     * Display the Form for Creating New Expense Category
     *
     * @param  \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $account_details = new AccountDetail();

        // Fill model with old input
        if (!empty($request->old())) {
            $expense_category->fill($request->old());
        }

        return view('application.settings.account_detail.create', [
            'account_details' => $account_details,
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
        // $account = Account::get();

        // Create Expense Category and Store in Database
        AccountDetail::create([
            'name' => $request->name,
            // 'account_id' =>$request->id ,
            'company_id' => $currentCompany->id,
        ]);
 
        session()->flash('alert-success', __('messages.account_details added'));
        return redirect()->route('settings.account_details', ['company_uid' => $currentCompany->uid]);
    }

}
