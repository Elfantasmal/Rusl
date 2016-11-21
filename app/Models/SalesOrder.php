<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'address',
        'delivered_at',
        'total'
    ];

    /**
     * Get all of the sales order's details.
     */
    public function orderDetails()
    {
        return $this->morphMany('App\Models\OrderDetail', 'order');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
