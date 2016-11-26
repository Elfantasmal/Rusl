<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
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
}