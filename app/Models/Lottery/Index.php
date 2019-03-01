<?php
/**
 * Created by PhpStorm.
 * User: LANDAN
 * Date: 2018/9/28
 * Time: 13:13
 */

namespace App\Models;

use Core\Model\CoreModel;

class LotteryModel extends BaseLotteryModel {
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
     * 不使用 select, get 关键字，避免与 lumen model 框架搞混
     * 不使用 SELECT 关键字，避免与 SQL 搞混
     * 不使用 GET 关键字，避免与 RESTful 搞混
     *
     * @param $iId, 12
     * @param $aQueries, [['status' => ['==', '2'], ...], ...]
     * @param $aOptions, ['offset' => 1, 'limit' => 100]
     */

    public function show (int $iId = null, array $aQueries = null, array $aOptions = null): array {

        $oLotteries = new self();

        if (is_integer($iId)) {
            $oLotteries = $oLotteries->where($this->primaryKey, $iId);
        }

        foreach ($aQueries as $sField => $mQuery){
            if ('integer' === gettype($mQuery) || 'string' === gettype($mQuery) || 'boolean' === gettype($mQuery)) {
                $oLotteries = $oLotteries->where($sField, $mQuery);
                continue;
            }

            if (1 === count($mQuery)) {
                $oLotteries = $oLotteries->where($sField, $mQuery[0]);
                continue;
            }

            if (2 <= count($mQuery)) {
                $oLotteries = $oLotteries->where($sField, $mQuery[0], $mQuery[1]);
                continue;
            }
        }


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

    /*
     * 不使用 count 关键字，避免与 lumen model 框架搞混
     * 不使用 COUNT 关键字，避免与 SQL 搞混
     * */
    public function num (int $iId = null, array $aQueries = null): int {

        $oLotteries = new self();

        if (is_integer($iId)) {
            $oLotteries = $oLotteries->where($this->primaryKey, $iId);
        }

        foreach ($aQueries as $sField => $mQuery){
            if ('integer' === gettype($mQuery) || 'string' === gettype($mQuery) || 'boolean' === gettype($mQuery)) {
                $oLotteries = $oLotteries->where($sField, $mQuery);
                continue;
            }

            if (1 === count($mQuery)) {
                $oLotteries = $oLotteries->where($sField, $mQuery[0]);
                continue;
            }

            if (2 <= count($mQuery)) {
                $oLotteries = $oLotteries->where($sField, $mQuery[0], $mQuery[1]);
                continue;
            }
        }

        $oLotteries->select($this->primaryKey);

        $iCount = $oLotteries->count();

        return $iCount;

    }

    /*
     * 不使用 insert 关键字，避免与 lumen model 框架搞混
     * 不使用 INSERT 关键字， 避免与 SQL 搞混
     * 不使用 POST 关键字，避免与 RESTful 搞混
     * */
    public function add (int $iId = null, $aLottery): array {


    }

    /*
     * 不使用 update 关键字，避免与 lumen model 框架搞混
     * 不使用 UPDATE 关键字，避免与 SQL 搞混
     * 不使用 PUT 关键字，避免与 RESTful 搞混
     * */
    public function edit (int $iId = null, $aLottery): array {


    }

    /*
     * 不使用 delete 关键字，避免与 lumen model 框架搞混
     * 不使用 DELETE 关键字，避免与 SQL 搞混
     * 不使用 DELETE 关键字，避免与 RESTful 搞混
     * */
    public function remove (int $iId = null): array {


    }
}
