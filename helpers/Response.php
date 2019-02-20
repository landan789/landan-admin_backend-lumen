<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/29
 * Time: 23:42
 */

namespace Aplusaccelinc\Helpers;

class Response {

    public $successStatus = 200;
    public $failStatus = 500;
    public $json = [
        'status' => 0,
        'code' => NULL,
        'data' => [],
        'total_count' => 0,
        'jwt' => ''
    ];

    public static function jsonSuccess($message, $jwt, $data = [], $totalCount){
        $message = strtoupper($message);
        $json = [
            'status' => 1,
            'code' => $message ?  config('RESPONSES.' . $message . '.CODE') : '',
            'message' => $message ? config('RESPONSES.' . $message . '.MESSAGE') : '',
            'data' => $data ? $data : [],
            'total_count' => $totalCount,
            'jwt' => $jwt ? $jwt : ''
        ];
        return response()->json($json, 200);
    }

    public static function jsonFail($message = '', $jwt = '', $status = 500) {
        $message = strtoupper($message);
        $json = [
            'status' => 0,
            'code' =>  config('RESPONSES.' . $message . '.CODE') ?  config('RESPONSES.' . $message . '.CODE') : 9999,
            'message' => config('RESPONSES.' . $message . '.MESSAGE') ? config('RESPONSES.' . $message . '.MESSAGE') : $message,
            'data' => [],
            'total_count' => 0,
            'jwt' => $jwt ? $jwt : ''
        ];
        return response()->json($json, $status);
    }
}