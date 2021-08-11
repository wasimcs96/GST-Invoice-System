<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Account;
class AccountDetail extends Model
{
    protected $table = "account_detail";

    protected $fillable = [
        'name',
        'company_id',
        'account_id',
        
    ];

    public function scopeFindByCompany($query, $company_id)
    {
        $query->where('company_id', $company_id);
    }
    public function account()
    {
        return $this->hasMany(Account::class,'id');
    }

}
