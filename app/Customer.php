<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/28
 * Time: 13:13
 */

namespace App;

use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Customer extends Model {
    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'update_time';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
