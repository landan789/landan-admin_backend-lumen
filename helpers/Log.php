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
    public static $oRequstAll = '';
    public static $channel = 'BACKEND';
    public static function start ($oRequest, $sJwt) {

        self::$oRequstAll = $oRequest->all();
         _Log::channel(self::$channel)
             ->info(clientIP() . ' ' . $oRequest->method() . ' ' . $oRequest->fullUrl() . ' ' . $sJwt .' ' . json_encode(self::$oRequstAll));
    }

    public static function succeed ($oRequest, $sJwt) {
        _Log::channel(self::$channel)
            ->critical(clientIP() . ' ' . $oRequest->method() . ' ' . $oRequest->fullUrl() . ' ' . $sJwt .' ' . json_encode(self::$oRequstAll));

    }

    public static function  fail ($oRequest, $sJwt) {
         _Log::channel(self::$channel)
             ->error(clientIP() . ' ' . $oRequest->method() . ' ' . $oRequest->fullUrl() . ' ' . $sJwt .' ' . json_encode(self::$oRequstAll));
    }
}