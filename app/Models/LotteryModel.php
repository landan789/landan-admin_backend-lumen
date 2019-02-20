<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/28
 * Time: 13:13
 */

namespace App\Models;

use core\model\CoreModel;

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
        'id',
        'game_type',
        'series_id',
        'name',
        'type',
        'lotto_type',
        'is_self',
        'is_instant',
        'high_frequency',
        'sort_winning_number',

    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public static function show ($id) {

        $query = self::where('id', 1);

//        if (!empty($name)) {
//            $query = $query->where('name', 'LIKE', '%' . $name. '%');
//        }
//
//        if (!empty($email)) {
//            $query = $query->where('email', 'LIKE', '%' . $email. '%');
//        }

//        if (0 < $offset) {
//            $query = $query->offset($offset);
//        }
//
//        if (0 < $limit) {
//            $query = $query->limit($limit);
//        }

        $aLotteries = $query->get()->toArray();

        return $aLotteries;

    }
}
