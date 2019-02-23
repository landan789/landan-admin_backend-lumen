<?php
/**
 * Created by PhpStorm.
 * User: LANDAN
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
     * @param $iId, 12
     * @param $aQueries, [['status', '==', '2'], ...]
     * @param $aOptions, ['offset' => 1, 'limit' => 100]
     */

    public function show (int $iId = null, array $aQueries = null, array $aOptions = null): array {

        $oLotteries = $this;

        if (is_integer($iId)) {
            $oLotteries = $oLotteries->where($this->primaryKey, $iId);
        }
//
//        if ('array' === gettype($aQueries)) {
//            foreach ($aQueries as $iIndex => $aQuery){
//                if (1 === count($aQuery)) {
//                    continue;
//                }
//                $oLotteries = (3 <= count($aQuery)) ? $oLotteries->where($aQuery[0], $aQuery[1], $aQuery[2]) : $oLotteries->where($aQuery[0], $aQuery[1]);
//            }
//        }

        if ('array' === gettype($aOptions) && isset($aOptions['offset'])) {
            $iOffset = (int)$aOptions['offset'];
            $oLotteries = $oLotteries->offset($iOffset);
        }

        if ('array' === gettype($aOptions) && isset($aOptions['limit'])) {
            $iLimit = (int)$aOptions['limit'];
            $oLotteries = $oLotteries->limit($iLimit);
        }

        $aLotteries = $oLotteries->get()->toArray();

        return $aLotteries;

    }
}
