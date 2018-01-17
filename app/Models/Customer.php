<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 * @package App\Models
 * @version October 21, 2016, 6:26 am UTC
 */
class Customer extends Model
{
    use SoftDeletes;
    public $table = 'customers';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];


    public $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'from',
        'company'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'firstName' => 'string',
        'lastName' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'from' => 'string',
        'company' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'firstName' => 'required',
        'lastName' => 'required',
        'email' => 'email|required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reservations()
    {
        return $this->hasMany(\App\Models\Reservation::class);
    }
}
