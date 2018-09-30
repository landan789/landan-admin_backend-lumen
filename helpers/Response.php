<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/29
 * Time: 23:42
 */

namespace Aplusaccelinc\Helpers;

class Response
{
    public static function jsonSuccess($message, $jwt, $data = [])
    {
        $message = strtoupper($message);
        $json = [
            'status' => 1,
            'code' => $message ?  config('MESSAGES.' . $message . '.CODE') : '',
            'message' => $message ? config('MESSAGES.' . $message . '.MESSAGE') : '',
            'data' => $data ? $data : [],
            'jwt' => $jwt ? $jwt : ''
        ];
        return response()->json($json, 200);
    }

    public static function jsonFail($message = '', $jwt = '')
    {
        $message = strtoupper($message);
        $json = [
            'status' => 0,
            'code' => $message ?  config('MESSAGES.' . $message . '.CODE') : '',
            'message' => $message ? config('MESSAGES.' . $message . '.MESSAGE') : '',
            'jwt' => $jwt ? $jwt : ''
        ];
        return response()->json($json, 500);
    }
}