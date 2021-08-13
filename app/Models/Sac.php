<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sac extends Model
{
    protected $table = "sac_codes";

    protected $fillable = [
        'name',
        'company_id',
    ];
    public function scopeFindByCompany($query, $company_id)
    {
        $query->where('company_id', $company_id);
    }
}
