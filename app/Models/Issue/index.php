<?php
/**
 * Created by PhpStorm.
 * User: LANDAN
 * Date: 2018/9/28
 * Time: 13:13
 */

namespace App\Models;

use core\model\CoreModel;

class IssueModel extends CoreModel {
    protected $table = 'issues';
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
        'lottery_id',
        'issue',
        'issue_rule_id',
        'begin_time',
        'end_time',
        'end_time2',
        'offical_time',
        'cycle',
        'wn_number',
        'allow_encode_time',
        'encoder_id',
        'status',
        'status_count',
        'status_prize',
        'status_commission',
        'status_trace_prj',
        'status_withdrawlable_set',
        'locker',
        'locker_fund',
        'tag',
        'calculated_at',
        'prize_sent_at',
        'commission_sent_at',
        'prj_created_at',
        'created_at',
        'updated_at',
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

        $oIssues = new self();

        if (is_integer($iId)) {
            $oIssues = $oIssues->where($this->primaryKey, $iId);
        }

        foreach ($aQueries as $sField => $mQuery){
            if ('started_at' === $sField) {
                continue;
            }

            if ('ended_at' === $sField) {
                continue;

            }
            if ('integer' === gettype($mQuery) || 'string' === gettype($mQuery) || 'boolean' === gettype($mQuery)) {
                $oIssues = $oIssues->where($sField, $mQuery);
                continue;
            }

            if (1 === count($mQuery)) {
                $oIssues = $oIssues->where($sField, $mQuery[0]);
                continue;
            }

            if (2 <= count($mQuery)) {
                $oIssues = $oIssues->where($sField, $mQuery[0], $mQuery[1]);
                continue;
            }
        }


        if ('array' === gettype($aOptions) && isset($aOptions['offset'])) {
            $iOffset = (int)$aOptions['offset'];
            $oIssues = $oIssues->offset($iOffset);
        }

        if ('array' === gettype($aOptions) && isset($aOptions['limit'])) {
            $iLimit = (int)$aOptions['limit'];
            $oIssues = $oIssues->limit($iLimit);
        }

        $oIssues = $oIssues->get()->toArray();

        return $oIssues;

    }

    /*
 * 不使用 count 关键字，避免与 lumen model 框架搞混
 * 不使用 COUNT 关键字，避免与 SQL 搞混
 * */
    public function num (int $iId = null, array $aQueries = null): int {

        $oIssues = new self();

        if (is_integer($iId)) {
            $oIssues = $oIssues->where($this->primaryKey, $iId);
        }

        foreach ($aQueries as $sField => $mQuery){
            if ('integer' === gettype($mQuery) || 'string' === gettype($mQuery) || 'boolean' === gettype($mQuery)) {
                $oIssues = $oIssues->where($sField, $mQuery);
                continue;
            }

            if (1 === count($mQuery)) {
                $oIssues = $oIssues->where($sField, $mQuery[0]);
                continue;
            }

            if (2 <= count($mQuery)) {
                $oIssues = $oIssues->where($sField, $mQuery[0], $mQuery[1]);
                continue;
            }
        }

        $oIssues->select($this->primaryKey);

        $iCount = $oIssues->count();

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
