<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'commodity_id',
        'quantity',
        'subtotal',
        'order_type',
    ];

    /**
     * Get all of the owning ordertable models.
     */
    public function order()
    {
        return $this->morphTo();
    }

    /**
     * Get all of the sales order's commodities.
     */
    public function commodity()
    {
        return $this->belongsTo('App\Models\Commodity');
    }
}
