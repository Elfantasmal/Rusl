<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class PurchaseOrder extends Model
{
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supplier_id',
        'delivered_at',
        'total'
    ];

    /**
     * The attributes that will log change.
     *
     * @var array
     */
    protected static $logAttributes = [
        'supplier_id',
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

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier');
    }
}
