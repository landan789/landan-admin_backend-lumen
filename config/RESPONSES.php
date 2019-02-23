<?php
/**
 * Created by PhpStorm.
 * User: Landan
 * Date: 2018/9/28
 * Time: 14:11
 *
 */return [
    'IT_SUCCEEDS_TO_SHOW_LOTTERY' => [
        'STATUS' => 200,
        'RESULT' => 1,
        'CODE' => 0,
        'MESSAGE' => 'it succeeds to show lottery'
    ],
    'IT_SUCCEEDS_TO_SHOW_ISSUE' => [
        'STATUS' => 200,
        'RESULT' => 1,
        'CODE' => 0,
        'MESSAGE' => 'it succeeds to show issue'
    ],

    'IT_IS_UNKNOWN_ERROR' => [
        'STATUS' => 500,
        'RESULT' => -1,
        'CODE' => -0.01,
        'MESSAGE' => 'it is unknown error'
    ],

    'IT_REQUESTS_UNDEFINED_PATH' => [
        'STATUS' => 501,
        'RESULT' => -1,
        'CODE' => -0.02,
        'MESSAGE' => 'it requests undefined path'
    ],

    'FAIL_TO_SHOW_LOTTERY' => [
        'STATUS' => 500,
        'RESULT' => -1,
        'CODE' => -1.01,
        'MESSAGE' => 'fail to show lottery'
    ],


    'JWT_IS_FORBIDDEN' => [
        'STATUS' => 403,
        'RESULT' => -1,
        'CODE' => -0.01,
        'MESSAGE' => 'is forbidden'
    ],
    'JWT_IS_EXPIRED' => [
        'STATUS' => 403,
        'RESULT' => -1,
        'CODE' => -3,
        'MESSAGE' => 'is expired'
    ],

    'JWT_IS_UNAUTHORIZED' => [
        'STATUS' => 401,
        'RESULT' => -1,
        'CODE' => -0.02,
        'MESSAGE' => 'jwt is authorized'
    ],
    'JWT_IS_EMPTY' => [
        'STATUS' => 401,
        'RESULT' => -1,
        'CODE' => -1,
        'MESSAGE' => 'jwt is empty'
    ],

];