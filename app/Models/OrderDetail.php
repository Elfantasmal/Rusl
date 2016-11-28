<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class OrderDetail extends Model
{
    use LogsActivity;

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
     * The attributes that will log change.
     *
     * @var array
     */
    protected static $logAttributes = [
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
