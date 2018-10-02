<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/29
 * Time: 23:42
 */

namespace Aplusaccelinc\Helpers;

use \Firebase\JWT\JWT as FIREBASEJWTJWT;

class Jwt {
    public static function encode($userId, $customerId, $expires){
        $payload = [
            'sub' => config('API.JWT.SUBJECT'),
            'iss' => config('API.JWT.ISSUER'),
            'adu' => config('API.JWT.AUDIENCE'),
            'exp' => $expires && 0 < $expires ? $expires : time() + config('API.JWT.EXPIRES'),
            'iat' => time(),
            'uid' => $userId ? $userId : '',
            'cid' => $customerId ? $customerId : ''
        ];

        $jwt = FIREBASEJWTJWT::encode($payload,  config('API.JWT.SECRET'));

        return $jwt;
    }

    public static function decode($jwt) {
        $payload = FIREBASEJWTJWT::decode($jwt, config('API.JWT.SECRET'), array('HS256'));

        return $payload;
    }
}