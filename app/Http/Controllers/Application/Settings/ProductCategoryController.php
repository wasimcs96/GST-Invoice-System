<?php

namespace App\Http\Controllers\Application\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display Expense Category Settings Page
     * 
     * @param  \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        // Get Expense Categories by Company
        $product_categories = ProductCategory::findByCompany($currentCompany->id)->paginate(15);

        return view('application.settings.product_category.index', [
            'product_categories' => $product_categories,
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
        $product_category = new ProductCategory();

        // Fill model with old input
        if (!empty($request->old())) {
            $expense_category->fill($request->old());
        }

        return view('application.settings.product_category.create', [
            'product_category' => $product_category,
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
        ProductCategory::create([
            'name' => $request->name,
            'company_id' => $currentCompany->id,
        ]);
 
        session()->flash('alert-success', __('messages.expense_category_added'));
        return redirect()->route('settings.product_categories', ['company_uid' => $currentCompany->uid]);
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
        $product_category = ProductCategory::findOrFail($request->product_category);
 
        return view('application.settings.product_category.edit', [
            'product_category' => $product_category,
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

        $product_category = ProductCategory::findOrFail($request->product_category);
        
        // Update Expense Category in Database
        $product_category->update([
            'name' => $request->name
        ]);
 
        session()->flash('alert-success', __('messages.expense_category_updated'));
        return redirect()->route('settings.product_categories', ['company_uid' => $currentCompany->uid]);
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
        
        $product_category = ProductCategory::findOrFail($request->product_category);
        
        // Delete Expense Category from Database
        $product_category->delete();

        session()->flash('alert-success', __('messages.expense_category_deleted'));
        return redirect()->route('settings.product_categories', ['company_uid' => $currentCompany->uid]);
    }
}
