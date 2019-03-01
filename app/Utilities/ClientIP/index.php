<?php

namespace App\Utilities;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/30
 * Time: 11:17
 */
function clientIP ($oRequest) {
    $aServer = $oRequest->server();
    $sClientIP = $aServer['HTTP_CLIENT_IP'] ??
        $aServer['HTTP_X_FORWARDED_FOR'] ??
        $aServer['HTTP_X_FORWARDED'] ??
        $aServer['HTTP_X_CLUSTER_CLIENT_IP'] ??
        $aServer['HTTP_FORWARDED_FOR'] ??
        $aServer['HTTP_FORWARDED'] ??
        $aServer['REMOTE_ADDR'] ??
        $aServer['HTTP_VIA'] ??
        '';

    return $sClientIP;
}