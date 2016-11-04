<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'company_phone',
        'contact_name',
        'mobile_phone',
        'email',
        'address',
        'description'
    ];

    public function products()
    {
        $this->hasMany('products');
    }
}