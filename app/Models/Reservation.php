<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Reservation
 * @package App\Models
 * @version October 21, 2016, 6:35 am UTC
 */
class Reservation extends Model
{
    use SoftDeletes;
    public $table = 'reservations';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'roomId',
        'customerId',
        'paid',
        'status',
        'startDate',
        'endDate',
        'needCarPark',
        'payWay',
        'sum',
        'bookWay',
        'commend'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'roomId' => 'integer',
        'customerId' => 'integer',
        'paid' => 'float',
        'status' => 'string',
        'needCarPark' => 'integer',
        'payWay' => 'string',
        'sum' => 'float',
        'bookWay' => 'string',
        'commend' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'roomId' => 'required',
        'customerId'=>'required',
        'paid' => 'numeric',

        'startDate' => 'required|date',
        'endDate' => 'required|date|after:startDate',

        'sum'=>'required',
        'bookWay' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function room()
    {
        return $this->belongsTo(\App\Models\Room::class);
    }
}
