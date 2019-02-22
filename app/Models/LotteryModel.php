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
    protected $primaryKey = 'id';
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
        'valid_nums',
        'buy_length',
        'wn_length',
        'identifier',
        'days',
        'issue_over_midnight',
        'issue_format',
        'bet_template',
        'begin_time',
        'end_time',
        'sequence',
        'status',
        'need_draw',
        'daily_issue_count',
        'trace_issue_count',
        'max_bet_group',
        'serious_ways',
        'created_at',
        'updated_at',
        'plat_id',
        'plat_name'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public function show (mixed $id = null):array {

        if (is_integer($id)) {
            $this->where('id', $id);
        }


        $aLotteries = $this->get()->toArray();

        return $aLotteries;

    }
}
