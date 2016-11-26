<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
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

    public function commodity() {
        return $this->belongsTo('App\Models\Commodity');
    }
}
