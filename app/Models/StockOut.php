<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
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

    public function commodity()
    {
        return $this->belongsTo('App\Models\Commodity');
    }
}
