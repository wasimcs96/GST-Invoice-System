<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseItem extends Model
{
    protected $table = "expense_item";

    protected $fillable = [
        'expense_category_id',
        'expense_id',
        'company_id',
        'description',
        'price',
        'total'
    ];

    public function scopeFindByCompany($query, $company_id)
    {
        $query->where('company_id', $company_id);
    }

    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }
}
