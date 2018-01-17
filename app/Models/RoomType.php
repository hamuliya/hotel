<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RoomType
 * @package App\Models
 * @version October 21, 2016, 6:35 am UTC
 */
class RoomType extends Model
{
    use SoftDeletes;

    public $table = 'room_types';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'roomType',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'roomType' => 'string',
        'price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'roomType' => 'required',
        'price' => 'numeric|required'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function rooms()
    {
        return $this->hasMany(\App\Models\Room::class);
    }
}
