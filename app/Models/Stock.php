<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Stock extends Model
{
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'commodity_id',
        'stock',
        'stock_alert'
    ];
    /**
     * The attributes that will log change.
     *
     * @var array
     */
    protected static $logAttributes = [
        'commodity_id',
        'stock',
        'stock_alert'
    ];

    public function commodity() {
        return $this->belongsTo('App\Models\Commodity');
    }
}
