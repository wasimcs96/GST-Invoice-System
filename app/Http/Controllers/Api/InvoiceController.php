<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\InvoiceItem;
use Auth;
class InvoiceController extends Controller
{
    public function store(Request $request)
    {
        
        $user = $request->user('api');
        // dd($request->all()); 
        $currentCompany = $user->currentCompany();

        // Redirect back
        // $canAdd = $currentCompany->subscription('main')->canUseFeature('invoices_per_month');
        // if (!$canAdd) {
        //     session()->flash('alert-danger', __('messages.you_have_reached_the_limit'));
        //     return redirect()->route('invoices', ['company_uid' => $currentCompany->uid]);
        // } 

        // // Get company based settings
        // $tax_per_item = (boolean) $currentCompany->getSetting('tax_per_item');
        // $discount_per_item = (boolean) $currentCompany->getSetting('discount_per_item');
 
        // // Save Invoice to Database
        // $invoice = Invoice::create([
        //     'invoice_date' => $request->invoice_date,
        //     'due_date' => $request->due_date,
        //     'invoice_number' => $request->invoice_number,
        //     'reference_number' => $request->reference_number,
        //     'customer_id' => $request->customer_id,
        //     'company_id' => $currentCompany->company_id,
        //     'status' => $request->status,
        //     'paid_status' => $request->paid_status,
        //     'sub_total' => $request->sub_total,
        //     'discount_type' => $request->discount_type,
        //     'discount_val' => $request->discount_val ?? 0,
        //     'total' => $request->total,
        //     'due_amount' => $request->due_amount,
        //     'notes' => $request->notes,
        //     'private_notes' => $request->private_notes,
        //     'tax_per_item' => $tax_per_item,
        //     'discount_per_item' => $discount_per_item,
        // ]);
        // // dd($invoice);

        // // Arrays of data for storing Invoice Items
        // $products = $request->product;
        // $quantities = $request->quantity;
        // $taxes = $request->taxes;
        // $prices = $request->price;
        // $totals = $request->total;
        // $discounts = $request->discount;

        // // Add products (invoice items)
        // for ($i=0; $i < count($products); $i++) {
        //     $product = Product::firstOrCreate(
        //         ['id' => $products[$i], 'company_id' => $currentCompany->id],
        //         ['name' => $products[$i], 'price' => $prices[$i], 'hide' => 1]
        //     );

        //     $item = $invoice->items()->create([
        //         'product_id' => $product->id,
        //         'company_id' => $currentCompany->id,
        //         'quantity' => $quantities[$i],
        //         'discount_type' => 'percent',
        //         'discount_val' => $discounts[$i] ?? 0,
        //         'price' => $prices[$i],
        //         'total' => $totals[$i],
        //     ]);

        //     // Add taxes for Invoice Item if it is given
        //     if ($taxes && array_key_exists($i, $taxes)) {
        //         foreach ($taxes[$i] as $tax) {
        //             $item->taxes()->create([
        //                 'tax_type_id' => $tax
        //             ]);
        //         }
        //     }
        // }

        // // If Invoice based taxes are given
        // if ($request->has('total_taxes')) {
        //     foreach ($request->total_taxes as $tax) {
        //         $invoice->taxes()->create([
        //             'tax_type_id' => $tax
        //         ]);
        //     }
        // }

        // // Add custom field values
        // $invoice->addCustomFields($request->custom_fields);

        // // Record product 
        // $currentCompany->subscription('main')->recordFeatureUsage('invoices_per_month');


        // return redirect()->route('invoices.details', ['invoice' => $invoice->id, 'company_uid' => $currentCompany->uid]);

        $email =$request->email;
        $customer = Customer::where('email',$email)->first();
            if (isset($customer)) {
                $invoice = Invoice::create([
            'invoice_date' => $request->invoice_date,
            'due_date' => $request->due_date,
            'invoice_number' => $request->invoice_number,
            'reference_number' => $request->reference_number,
            'attachment' => $request->attachment,
            'customer_id' => $customer->id,
            'company_id' => $customer->company_id,
            'status' => $request->status,
            'paid_status' => $request->paid_status,
            'sub_total' => $request->sub_total,
            'discount_type' => $request->discount_type,
            'discount_val' => $request->discount_val ?? 0,
            'total' => $request->total,
            'due_amount' => $request->due_amount,
            'notes' => $request->notes,
            'private_notes' => $request->private_notes,
            'tax_per_item' => $request->tax_per_item,
            'discount_per_item' => $request->discount_per_item,
        ]);

        $item = InvoiceItem::create([
            'invoice_id'=>$invoice->id,
            'product_id'=>$request->product_id,
            'company_id'=>$customer->company_id,
            'description'=> $request->product_description,
            'price'=> $request->product_price,
            'quantity'=> $request->product_quantity,
            'discount_type'=> $request->product_discount_type,
            'discount_val'=> $request->product_discount_val,
            'total'=> $request->product_total,
        ]);

            }

        return response()->json('success',200);

    }

}
