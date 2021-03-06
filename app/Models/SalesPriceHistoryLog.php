<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SalesPriceHistoryLog extends Model
{
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'commodity_id',
        'sales_price',
        'changed_at',
    ];

    public function commodity()
    {
        return $this->belongsTo('App\Models\Commodity');
    }
}
