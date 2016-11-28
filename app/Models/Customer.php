<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Customer extends Model
{
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'company_phone',
        'contact_name',
        'mobile_phone',
        'email',
        'address',
        'description'
    ];

    /**
     * The attributes that will log change.
     *
     * @var array
     */
    protected static $logAttributes = [
        'company_name',
        'company_phone',
        'contact_name',
        'mobile_phone',
        'email',
        'address',
        'description'
    ];

    public function salesOrders()
    {
        return $this->hasMany('App\Models\SalesOrder');
    }
}