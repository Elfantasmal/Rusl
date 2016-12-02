<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Commodity extends Model
{
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'sales_price',
        'purchase_price',
        'unit',
        'supplier_id'
    ];

    /**
     * The attributes that will log change.
     *
     * @var array
     */
    protected static $logAttributes = [
        'name',
        'sales_price',
        'purchase_price',
        'unit',
        'supplier_id'
    ];

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier');
    }

    public function stocks()
    {
        return $this->hasMany('App\Models\Stock');
    }

    public function stockIns()
    {
        return $this->hasMany('App\Models\StockIn');
    }

    public function stockOuts()
    {
        return $this->hasMany('App\Models\StockOut');
    }

    public function salesPriceHistoryLog()
    {
        return $this->hasMany('App\Models\SalesPriceHistoryLog');
    }

    public function purchasePriceHistoryLog()
    {
        return $this->hasMany('App\Models\PurchasePriceHistoryLog');
    }
}