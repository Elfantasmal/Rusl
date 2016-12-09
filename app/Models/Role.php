<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Klaravel\Ntrust\Traits\NtrustRoleTrait;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model
{
    use NtrustRoleTrait;
    use LogsActivity;

    /*
     * Role profile to get value from ntrust config file.
     */
    protected static $roleProfile = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    /**
     * The attributes that will log change.
     *
     * @var array
     */
    protected static $logAttributes = [
        'name',
        'display_name',
        'description',
    ];
}