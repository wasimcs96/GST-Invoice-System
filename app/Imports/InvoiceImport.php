<?php

namespace App\Imports;
use App\Models\Customer;
use App\Models\Invoice;
use Maatwebsite\Excel\Concerns\ToModel;
// use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Carbon\Carbon;

class InvoiceImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        $email =$row['email'];
        $customer = Customer::where('email',$email)->first();
        // $customer->id;
// dd($email);
        // if ($customer->fails()) {
        //     return redirect(''.auth()->user()->uid.'/export');
        // }
        foreach($row as $product)
        {
            $invoice = Invoice::create([
                'customer_id' => $customer->id,
                'company_id'  => auth()->company()->id,
                'invoice_date' => Carbon::now()->format('Y-m-d'), 
                'due_date'    => Carbon::now()->format('Y-m-d'),
                'invoice_number'    => $product['invoice_number'], 
                'reference_number' => $product['reference_number'], 
                // 'status'     => 'DRAFT',
                // 'paid_status'    => 'UNPAID', 
                'status'     => $product['status'],
                'paid_status'    => $product['paid_status'], 
                'tax_per_item' => $product['tax_per_item'], 
                'discount_per_item'     => $product['discount_per_item'],
                'notes'    => $product['notes'], 
                'private_notes' => $product['private_notes'], 
                'discount_type'     => $product['discount_type'],
                'discount_val'    => $product['discount_val'], 
                'sub_total' => $product['sub_total'], 
                'total'    => $product['total'], 
                'due_amount' => $product['due_amount'],
            ]);
            Product::create([
                'invoice_id'=>$invoice->id,
                'product_id '=>'2',
                'company_id'=>auth()->company()->id,
                'description'=> $product['product_description'],
                'price'=> $product['product_price'],
                'quantity'=> $product['product_quantity'],
                'discount_type'=> $product['product_discount_type'],
                'discount_val'=> $product['product_discount_val'],
                'total'=> $product['product_total'],
            ]);
        }
        // dd($row);
        // $invoice_date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['invoice_date']))->format('j-f-Y');
        // $due_date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['due_date']))->format('j-f-Y');

        // return new Invoice([
        //     'customer_id'     => $customer->id,
        //     'company_id'    => auth()->company()->id, 
        //     'invoice_date' => Carbon::now()->format('Y-m-d'), 
        //     'due_date'     => Carbon::now()->format('Y-m-d'),
        //     'invoice_number'    => $row['invoice_number'], 
        //     'reference_number' => $row['reference_number'], 
        //     'status'     => 'DRAFT',
        //     'paid_status'    => 'UNPAID', 
        //     'tax_per_item' => $row['tax_per_item'], 
        //     'discount_per_item'     => $row['discount_per_item'],
        //     'notes'    => $row['notes'], 
        //     'private_notes' => $row['private_notes'], 
        //     'discount_type'     => $row['discount_type'],
        //     'discount_val'    => $row['discount_val'], 
        //     'sub_total' => $row['sub_total'], 
        //     'total'    => $row['total'], 
        //     'due_amount' => $row['due_amount'], 
        //     // 'sent '     => $row['name'],
        //     // 'viewed '    => $row['email'],
        // ]);

        // return new Product([
        //     'invoice_id '     => auth()->company()->id,
        //     'product_id '    => auth()->company()->id, 
        //     'company_id ' => auth()->company()->id, 
        //     'description'     => Carbon::now()->format('Y-m-d'),
        //     'price'    => $row['invoice_number'], 
        //     'quantity' => $row['reference_number'], 
        //     'discount_type'     => 'DRAFT',
        //     'discount_val'    => 'UNPAID', 
        //     'discount_val' => $row['tax_per_item'], 
        // ]);
    }
}
