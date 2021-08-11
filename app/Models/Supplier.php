<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "suppliers";
    protected $fillable = [
        'name','email','company','company_id','phone','display_name','website','address','state','city','country','pin_code','billing_rate','pan_number','tds_entity','tds_section','notes','balance','balance_date','account_number','gst_type','gstin','tax_reg_number','effective_date','attachment',
    ];

    public function scopeFindByCompany($query, $company_id)
    {
        $query->where('company_id', $company_id);
    }

    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }
}
