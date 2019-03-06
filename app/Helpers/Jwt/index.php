<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/29
 * Time: 23:42
 */

namespace App\Helpers;

use \Firebase\JWT\JWT as FIREBASE_JWT_JWT;

class Jwt {
    public static function encode(int $iUserId, int $tExpires): string {

        // uid is very easy to be intruded, so we do a extra encoding for it.
        // cid is very easy to be intruded, so we do a extra encoding for it

        $aPayload = [
            'sub' => config('JWT.SUBJECT'),
            'iss' => config('JWT.ISSUER'),
            'adu' => config('JWT.AUDIENCE'),
            'exp' => $tExpires && 0 < $tExpires ? $tExpires : time() + config('JWT.EXPIRES'),
            'iat' => time(),
            'uid' => $iUserId ?? ''
        ];


        $sJwt = FIREBASE_JWT_JWT::encode($aPayload,  config('JWT.SECRET'));

        return $sJwt;
    }

    public static function decode(string $sJwt): array {
        $aPayload = FIREBASE_JWT_JWT::decode($sJwt, config('JWT.SECRET'), array(config('JWT.ALGORITHM')));

        return $aPayload;
    }
}