<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version October 22, 2016, 9:31 pm UTC
 */
class User extends Model
{
    use SoftDeletes;

    public $table = 'users';


    protected $primaryKey = 'id';



    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'authority',
        'email',
        'password',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'authority' => 'string',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rulesCreate = [
        'name' => 'required',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required',
    ];


    public static $rulesUpdate = [
        'name' => 'required',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required',
    ];



    protected $hidden = [
        'password', 'remember_token',
    ];
    
}
