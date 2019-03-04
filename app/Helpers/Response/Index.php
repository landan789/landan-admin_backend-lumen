<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/30
 * Time: 12:08
 */

namespace App\Helpers;

use function App\Utilities\clientIP;

class Response {
    public $data = [];
    public $message = '';
    public $jwt = '';
    public $totalCount = 0;


    public function setMessage(string $sMessage = ''): Response
    {
        $this->message = $sMessage;

        return $this;
    }

    public function setJwt(string $sJwt = ''): Response
    {
        $this->jwt = $sJwt;

        return $this;
    }

    public function setData(array $aData = []): Response
    {
        $this->data = $aData;

        return $this;
    }

    public function setTotalCount(int $iTotalCount = 0): Response
    {
        $this->totalCount = $iTotalCount;

        return $this;
    }

    public function json()
    {
        $sMessage = $this->message && isset(config('RESPONSES')[strtoupper($this->message)]) ? strtoupper($this->message) : 'IT_IS_UNKNOWN_ERROR' . ' ' . $this->message;
        $iTotalCount = $this->totalCount;
        $sJwt = $this->jwt;
        $aData = $this->data;
        $iStatus = $sMessage && isset(config('RESPONSES')[$sMessage]) ? config('RESPONSES.' . $sMessage . '.STATUS') : config('RESPONSES.' . 'IT_IS_UNKNOWN_ERROR' . '.STATUS');
        $iResult = config('RESPONSES.' . $sMessage . '.RESULT') ? config('RESPONSES.' . $sMessage . '.RESULT') : config('RESPONSES.' . 'IT_IS_UNKNOWN_ERROR' . '.RESULT');
        $iCode = $sMessage && isset(config('RESPONSES')[$sMessage]) ? config('RESPONSES.' . $sMessage . '.CODE') : config('RESPONSES.' . 'IT_IS_UNKNOWN_ERROR' . '.CODE');

        $aJson = [
            'result' => $iResult,
            'code' => $iCode,
            'message' => $sMessage,
            'jwt' => $sJwt,
            'total_count' => $iTotalCount,
            'data' => (object)$aData
        ];
        return response()->json($aJson, $iStatus, ['Content-Type' => 'application/json;charset=utf8'], JSON_UNESCAPED_UNICODE);
    }
}