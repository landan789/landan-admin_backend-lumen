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
    public static $requestAll = '';
    public static $requestQuery = '';
    public static $requestCookie = '';
    public static $requestHeader = '';
    public static $requestServer = '';

    public static $ip = '';
    public static $method = '';
    public static $jwt = '';
    public static $url = '';

    public static $channel = 'any';

    public static function start ($oRequest) {
        $sRequestUri = $oRequest->server()['REQUEST_URI'];
        $sServerName = $oRequest->server()['SERVER_NAME'];
        $sRequestScheme = $oRequest->server()['REQUEST_SCHEME'];

        $aSegments = explode('/', $sRequestUri);
        $sChannel = $aSegments['1'] ?? self::$channel;

        self::$channel = $sChannel;
        self::$url = $sRequestScheme . '://' . $sServerName . $sRequestUri;
        self::$ip = clientIP();
        self::$method = $oRequest->method();
        self::$jwt = $oRequest->Header('Authorization') ?? $oRequest->Header('authorization') ?? $oRequest->Header('AUTHORIZATION') ?? '';

        self::$requestAll = json_encode($oRequest->all());
        self::$requestQuery = json_encode($oRequest->query());
        self::$requestCookie = json_encode($oRequest->cookie());
        self::$requestHeader = json_encode($oRequest->Header());
        self::$requestServer = json_encode($oRequest->server());

        $sLog = self::$ip . ' ' .
                self::$method . ' ' .
                self::$url . ' ' .
                self::$jwt . ' ' .
                self::$requestAll . ' ' .
                self::$requestQuery . ' ' .
                self::$requestCookie . ' ' .
                self::$requestHeader . ' ' .
                self::$requestServer;

        _Log::channel(self::$channel)
            ->info($sLog);
    }

    public static function succeed ($oRequest) {
        $sLog = self::$ip . ' ' .
            self::$method . ' ' .
            self::$url . ' ' .
            self::$jwt . ' ' .
            self::$requestAll . ' ' .
            self::$requestQuery . ' ' .
            self::$requestCookie . ' ' .
            self::$requestHeader . ' ' .
            self::$requestServer;

        _Log::channel(self::$channel)
            ->critical($sLog);

    }

    public static function fail ($oRequest) {
        $sLog = self::$ip . ' ' .
            self::$method . ' ' .
            self::$url . ' ' .
            self::$jwt . ' ' .
            self::$requestAll . ' ' .
            self::$requestQuery . ' ' .
            self::$requestCookie . ' ' .
            self::$requestHeader . ' ' .
            self::$requestServer;

         _Log::channel(self::$channel)
             ->error($sLog);
    }
}