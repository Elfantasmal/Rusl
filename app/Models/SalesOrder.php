<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SalesOrder extends Model
{
    use LogsActivity;

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
     * The attributes that will log change.
     *
     * @var array
     */
    protected static $logAttributes = [
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
