<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/28
 * Time: 13:13
 */

namespace App\Models;

use Laravel\Lumen\Auth\Authorizable;

use core\model;

class LotteryModel extends CoreModel {
    protected $table = 'lotteries';
    // protected $primaryKey = 'issue_id';
    // const CREATED_AT = 'created_time';
    // const UPDATED_AT = 'updated_time';
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
