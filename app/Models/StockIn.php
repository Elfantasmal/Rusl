<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class StockIn extends Model
{
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'commodity_id',
        'in_quantity',
        'in_type',
        'in_at'
    ];
    /**
     * The attributes that will log change.
     *
     * @var array
     */
    protected static $logAttributes = [
        'commodity_id',
        'in_quantity',
        'in_type',
        'in_at'
    ];

    public function commodity()
    {
        return $this->belongsTo('App\Models\Commodity');
    }
}
