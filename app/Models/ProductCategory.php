<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = "product_category";

    protected $fillable = [
        'name',
        'company_id',
    ];
    
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Define Relation with Company Model
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
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
     * Set amount attribute to get total expense amount
     * for current expense category
     *
     * @return int
     */
    public function getAmountAttribute()
    {
        return $this->expenses()->sum('amount');
    }

    /**
     * List Expense Categories for Select2 Javascript Library
     *  
     * @return collect
     */
    public static function getSelect2Array($company_id) {
        // return
        return self::findByCompany($company_id)
            ->select('id', 'name AS text')
            ->get();
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
}
