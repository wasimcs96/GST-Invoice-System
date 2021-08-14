<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductService extends Model
{
    protected $table = "product_service";

    protected $fillable = [
        'name',
        'company_id',
    ];
    public function scopeFindByCompany($query, $company_id)
    {
        $query->where('company_id', $company_id);
    }
}
