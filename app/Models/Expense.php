<?php

namespace App\Models;
use App\Traits\HasTax;
use App\Traits\HasCustomFields;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Expense extends Model
{
    use HasCustomFields;
    use HasTax;
    
    /** 
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'expense_category_id',
        'amount',
        'company_id',
        'vendor_id',
        'payment_date',
        'supplier_id',
        'payment_account_id',
        'payment_type_id',
        'reference_number',
        'tax_id',
        'sub_total',
        'total',
        'attachment'
    ];

    /**
     * Automatically cast date attributes to Carbon
     * 
     * @var array
     */
    protected $dates = [
        'expense_date',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['fields'];

    /**
     * Define Relation with ExpenseCategory Model
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function category()
    // {
    //     return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    // }

    public function items()
    {
        return $this->hasMany(ExpenseItem::class,'expense_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Set currency_code attribute from customer
     *
     * @return string
     */
    public function getCurrencyCodeAttribute($value)
    {
        return $this->company->currency->code;
    }

    /**
     * Set formatted_expense_date attribute by custom date format
     * from Company Settings
     *
     * @return string
     */
    public function getFormattedExpenseDateAttribute($value)
    {
        $dateFormat = CompanySetting::getSetting('date_format', $this->company_id);
        return Carbon::parse($this->expense_date)->format($dateFormat);
    }
 
    /**
     * Set formatted_created_at attribute by custom date format
     * from Company Settings
     *
     * @return string
     */
    public function getFormattedCreatedAtAttribute($value)
    {
        $dateFormat = CompanySetting::getSetting('date_format', $this->company_id);
        return Carbon::parse($this->created_at)->format($dateFormat);
    }

    /**
     * Scope a query to only include Customers of a given company.
     *
     * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param int $company_id
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFindByCompany($query, $company_id)
    {
        $query->where('company_id', $company_id);
    }

    /**
     * Scope a query to only return Expenses which has expense_date
     * greater or equal then given date
     *
     * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param Date $from
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFrom($query, $from)
    {
        $query->where('expense_date', '>=', $from);
    }

    /**
     * Scope a query to only return Expenses which has expense_date
     * less or equal then given date
     *
     * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param Date $to
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTo($query, $to)
    {
        $query->where('expense_date', '<=', $to);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function paymentmethod()
    {
        return $this->belongsTo(PaymentMethod::class,'payment_type_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class,'payment_account_id');
    }
}
