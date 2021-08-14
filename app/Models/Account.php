<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AccountDetail;

class Account extends Model
{
    protected $table = "accounts";

    protected $fillable = [
        'name',
        'detail_id',
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

    public function accountDetail()
    {
        return $this->belongsTo(AccountDetail::class,'detail_id');
    }

    public function expenseAccount()
    {
        return $this->hasMany(Account::class,'payment_account_id');
    }

    
}
