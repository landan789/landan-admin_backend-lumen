<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/30
 * Time: 12:08
 */

namespace helpers;

use Log as _Log;
use function Aplusaccelinc\Functions\clientIP;

class Log {
    public static $oRequestAll = null;
    public static $oRequestServer = null;

    public static $channel = 'BACKEND';
    public static function start ($oRequest, $sJwt) {

        self::$oRequstAll = $oRequest->all();
        self::$oRequstServer = $oRequest->server();
        _Log::channel(self::$channel)
             ->info(clientIP() . ' ' . $oRequest->method() . ' ' . json_encode(self::$oRequestServer) . ' ' . $sJwt .' ' . json_encode(self::$oRequestAll));
    }

    public static function succeed ($oRequest, $sJwt) {
        _Log::channel(self::$channel)
            ->critical(clientIP() . ' ' . $oRequest->method() . ' ' . json_encode(self::$oRequestServer) . ' ' . $sJwt .' ' . json_encode(self::$oRequestAll));

    }

    public static function  fail ($oRequest, $sJwt) {
         _Log::channel(self::$channel)
             ->error(clientIP() . ' ' . $oRequest->method() . ' ' . json_encode(self::$oRequestServer) . ' ' . $sJwt .' ' . json_encode(self::$oRequestAll));
    }
}