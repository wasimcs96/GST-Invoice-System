<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Imports\InvoiceImport;
// use Maatwebsite\Excel\Concerns\ToModel;
// use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Carbon\Carbon;
use Auth;

class InvoiceImport implements WithHeadingRow, ToCollection
{
    // dd($products);
    protected $products;
    
    public function  __construct($products)
    {
        $this->products =$products;
        // dd($this->products);
    }
    
    public function collection(Collection $row)
    {
        // $rowIndex = $row->getIndex();
        // $row = $row->toArray();
     

        // $customer = Customer::where('email',$email)->first();
        
        // $customer->id;
// dd($email);
        // if ($customer->fails()) {
        //     return redirect(''.auth()->user()->uid.'/export');
        // }
        // dd($row);
        foreach($row as $ro)
        {
            $email =$ro['email'];
            $customer = Customer::where('email',$email)->first();
            if (isset($customer)) {
                $invoice = Invoice::create([
                'customer_id' => $customer->id,
                'company_id'  => Auth::user()->id,
                'invoice_date' => Carbon::now()->format('Y-m-d'),
                'due_date'    => Carbon::now()->format('Y-m-d'),
                'invoice_number'    => $ro['invoice_number'],
                'reference_number' => $ro['reference_number'],
                // 'status'     => 'DRAFT',
                // 'paid_status'    => 'UNPAID',
                'status'     => $ro['status'],
                'attachment'     => $ro['attachment'],
                'paid_status' => $ro['paid_status'],
                'tax_per_item' => $ro['tax_per_item'],
                'discount_per_item'     => $ro['discount_per_item'],
                'notes'    => $ro['notes'],
                'private_notes' => $ro['private_notes'],
                'discount_type'     => $ro['discount_type'],
                'discount_val'    => $ro['discount_val'],
                'sub_total' => $ro['sub_total'],
                'total'    => $ro['total'],
                'due_amount' => $ro['due_amount'],
            ]);
            // dd($this->products);
                InvoiceItem::create([
                'invoice_id'=>$invoice->id,
                'product_id'=>$this->products,
                'company_id'=>Auth::user()->id,
                'description'=> $ro['product_description'],
                'price'=> $ro['product_price'],
                'quantity'=> $ro['product_quantity'],
                'discount_type'=> $ro['product_discount_type'],
                'discount_val'=> $ro['product_discount_val'],
                'total'=> $ro['product_total'],
            ]);
            }
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
