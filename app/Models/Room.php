<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Room
 * @package App\Models
 * @version October 21, 2016, 6:35 am UTC
 */
class Room extends Model
{
    use SoftDeletes;

    public $table = 'rooms';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'roomName',
        'roomTypeId',
        'max',
        'roomStatus'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'roomName' => 'string',
        'roomTypeId' => 'integer',
        'max' => 'integer',
        'roomStatus' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'roomName' => 'required',
        'roomTypeId' => 'required',
        'max' => 'numeric|required',
        'roomStatus' => 'required'
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function roomType()
    {
        return $this->belongsTo(\App\Models\RoomType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reservations()
    {
        return $this->hasMany(\App\Models\Reservation::class);
    }

}
