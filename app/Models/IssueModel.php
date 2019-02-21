<?php
/**
 * Created by PhpStorm.
 * User: User
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
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public function show ($id = null) {

        if (is_integer($id)) {
            $this->where('id', $id);
        }


        $aIssues = $this->get()->toArray();

        return $aIssues;

    }
}
