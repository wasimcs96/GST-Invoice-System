<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = "accounts";

    protected $fillable = [
        'name',
        'detail_type',
        'account_type',
        'company_id',
        'description',
        'tax',
        'balance',
        'as_date',
        
    ];

    public function scopeFindByCompany($query, $company_id)
    {
        $query->where('company_id', $company_id);
    }
    
}
