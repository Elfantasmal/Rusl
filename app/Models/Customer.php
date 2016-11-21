<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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

    public function salesOrders()
    {
        return $this->hasMany('App\Models\SalesOrder');
    }
}