<?php

namespace App\Imports;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Imports\InvoiceImport;
use Maatwebsite\Excel\Concerns\ToModel;
// use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Carbon\Carbon;
use Auth;

class InvoiceImport implements ToModel, WithHeadingRow
{
    // dd($products);
    protected $products;
    
    public function  __construct($products)
    {
        $this->products =$products;
    }
    
    public function onRow(Row $row)
    {
        // dd($row);
        $rowIndex = $row->getIndex();
        $row = $row->toArray();
        $email =$row['email'];
        $customer = Customer::where('email',$email)->first();
        
        // $customer->id;
// dd($email);
        // if ($customer->fails()) {
        //     return redirect(''.auth()->user()->uid.'/export');
        // }
        foreach($row as $rows)
        {
            dd($rows);
            $invoice = Invoice::create([
                'customer_id' => $customer->id,
                'company_id'  => Auth::user()->id,
                'invoice_date' => Carbon::now()->format('Y-m-d'), 
                'due_date'    => Carbon::now()->format('Y-m-d'),
                'invoice_number'    => $rows['invoice_number'], 
                'reference_number' => $rows['reference_number'], 
                // 'status'     => 'DRAFT',
                // 'paid_status'    => 'UNPAID', 
                'status'     => $rows['status'],
                'paid_status'    => $rows['paid_status'], 
                'tax_per_item' => $rows['tax_per_item'], 
                'discount_per_item'     => $rows['discount_per_item'],
                'notes'    => $rows['notes'], 
                'private_notes' => $rows['private_notes'], 
                'discount_type'     => $rows['discount_type'],
                'discount_val'    => $rows['discount_val'], 
                'sub_total' => $rows['sub_total'], 
                'total'    => $rows['total'], 
                'due_amount' => $rows['due_amount'],
            ]);
            InvoiceItem::create([
                'invoice_id'=>$invoice->id,
                'product_id '=>$this->products,
                'company_id'=>Auth::user()->id, 
                'description'=> $rows['product_description'],
                'price'=> $rows['product_price'],
                'quantity'=> $rows['product_quantity'],
                'discount_type'=> $rows['product_discount_type'],
                'discount_val'=> $rows['product_discount_val'],
                'total'=> $rows['product_total'],
            ]);
        }
        // dd($row);
        // $invoice_date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['invoice_date']))->format('j-f-Y');
        // $due_date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['due_date']))->format('j-f-Y');

        // $invoice =  new Invoice([
        //     'customer_id'     => $customer->id,
        //     'company_id'    => Auth::user()->id, 
        //     'invoice_date' => Carbon::now()->format('Y-m-d'), 
        //     'due_date'     => Carbon::now()->format('Y-m-d'),
        //     'invoice_number'    => $row['invoice_number'], 
        //     'reference_number' => $row['reference_number'], 
        //     'status'     => $row['status'],
        //     'paid_status'    => $row['paid_status'],
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
        // $invoice->return;
        // dd($invoice->id);

        // return new InvoiceItem([
        //     'invoice_id'=> $invoice->id,
        //     'product_id'=>$this->products,
        //     'company_id' => Auth::user()->id, 
        //     'description'=> $row['product_description'],
        //     'price'=> $row['product_price'],
        //     'quantity'=> $row['product_quantity'],
        //     'discount_type'=> $row['product_discount_type'],
        //     'discount_val'=> $row['product_discount_val'],
        //     'total'=> $row['product_total'],
        // ]);
    }
}
