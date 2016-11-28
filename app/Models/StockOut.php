<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class StockOut extends Model
{
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'commodity_id',
        'out_quantity',
        'out_type',
        'out_at'
    ];

    /**
     * The attributes that will log change.
     *
     * @var array
     */
    protected static $logAttributes = [
        'commodity_id',
        'out_quantity',
        'out_type',
        'out_at'
    ];

    public function commodity()
    {
        return $this->belongsTo('App\Models\Commodity');
    }
}
