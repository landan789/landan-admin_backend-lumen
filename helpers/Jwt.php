<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/29
 * Time: 23:42
 */

namespace Aplusaccelinc\Helpers;

use \Firebase\JWT\JWT as FIREBASE_JWT_JWT;

class Jwt {
    public static function encode($userId, $customerId, $expires){

        // uid is very easy to be intruded, so we do a extra encoding for it.
        // cid is very easy to be intruded, so we do a extra encoding for it

        $payload = [
            'sub' => config('API.JWT.SUBJECT'),
            'iss' => config('API.JWT.ISSUER'),
            'adu' => config('API.JWT.AUDIENCE'),
            'exp' => $expires && 0 < $expires ? $expires : time() + config('API.JWT.EXPIRES'),
            'iat' => time(),
            'uid' => $userId ? $userId : '',
            'cid' => $customerId ? $customerId : ''
        ];


        $jwt = FIREBASE_JWT_JWT::encode($payload,  config('API.JWT.SECRET'));

        return $jwt;
    }

    public static function decode($jwt) {
        $payload = FIREBASE_JWT_JWT::decode($jwt, config('API.JWT.SECRET'), array('HS256'));

        return $payload;
    }
}