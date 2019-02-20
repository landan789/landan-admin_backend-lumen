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
            'status' => config('RESPONSES.' . $message . '.STATUS') ?  config('RESPONSES.' . $message . '.STATUS') : 1,
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
            'status' => config('RESPONSES.' . $message . '.STATUS') ?  config('RESPONSES.' . $message . '.STATUS') : -1,
            'code' =>  config('RESPONSES.' . $message . '.CODE') ?  config('RESPONSES.' . $message . '.CODE') : -0.00,
            'message' => config('RESPONSES.' . $message . '.MESSAGE') ? config('RESPONSES.' . $message . '.MESSAGE') : "not define the message of " . $message . " in RESPONSES.php",
            'data' => [],
            'total_count' => 0,
            'jwt' => $jwt ? $jwt : ''
        ];
        return response()->json($json, $status);
    }
}