<?php

namespace App\Http\Controllers\Application\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sac;

class ProductSacController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Get Expense Categories by Company
        $product_sac_codes = Sac::findByCompany($currentCompany->id)->paginate(15);

        return view('application.settings.product_sac.index', [
            'product_sac_codes' => $product_sac_codes,
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
        $product_sac_codes = new Sac();

        // Fill model with old input
        // if (!empty($request->old())) {
        //     $expense_category->fill($request->old());
        // }

        return view('application.settings.product_sac.create', [
            'product_sac_codes' => $product_sac_codes,
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
        Sac::create([
            'name' => $request->name,
            // 'account_id' =>$request->id ,
            'company_id' => $currentCompany->id,
        ]);
 
        session()->flash('alert-success', __('messages.product_sac added'));
        return redirect()->route('settings.product_sac', ['company_uid' => $currentCompany->uid]);
    }
}
