<?php

namespace App\Http\Controllers\Application\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductService;

class ProductServicesController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Get Expense Categories by Company
        $product_services = ProductService::findByCompany($currentCompany->id)->paginate(15);

        return view('application.settings.product_service.index', [
            'product_services' => $product_services,
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
        $product_services = new ProductService();

        // Fill model with old input
        // if (!empty($request->old())) {
        //     $expense_category->fill($request->old());
        // }

        return view('application.settings.product_service.create', [
            'product_services' => $product_services,
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
        ProductService::create([
            'name' => $request->name,
            // 'account_id' =>$request->id ,
            'company_id' => $currentCompany->id,
        ]);
 
        session()->flash('alert-success', __('messages.product_service added'));
        return redirect()->route('settings.product_service', ['company_uid' => $currentCompany->uid]);
    }
}
