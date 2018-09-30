<?php

namespace Aplusaccelinc\Functions;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/30
 * Time: 11:17
 */
function clientIP () {
    $clientIP ='';
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $clientIP = $_SERVER['HTTP_CLIENT_IP'];

    } else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $clientIP = $_SERVER['HTTP_X_FORWARDED_FOR'];

    } else if(!empty($_SERVER['HTTP_X_FORWARDED'])) {
        $clientIP = $_SERVER['HTTP_X_FORWARDED'];

    } else if(!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
        $clientIP = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];

    } else if(!empty($_SERVER['HTTP_FORWARDED_FOR'])) {
        $clientIP = $_SERVER['HTTP_FORWARDED_FOR'];

    } else if(!empty($_SERVER['HTTP_FORWARDED'])) {
        $clientIP = $_SERVER['HTTP_FORWARDED'];

    }else if(!empty($_SERVER['REMOTE_ADDR'])) {
        $clientIP = $_SERVER['REMOTE_ADDR'];

    }else if(!empty($_SERVER['HTTP_VIA'])) {
        $clientIP = $_SERVER['HTTP_VIA'];

    }
    return $clientIP;
}