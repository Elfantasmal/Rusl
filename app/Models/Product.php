<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
}