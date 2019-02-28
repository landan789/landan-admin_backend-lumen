<?php
/**
 * Created by PhpStorm.
 * User: Landan
 * Date: 2018/9/28
 * Time: 14:11
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 * 
 * 命名规则 ！！
 * 单数主词 + 动词(s)
 * 考虑可读性 请务必统一这个规范！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！
 *
 * 命名规则 ！！
 * 单数主词 + 动词(s)
 * 考虑可读性 请务必统一这个规范！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 * 命名规则 ！！
 * 单数主词 + 动词(s)
 * 考虑可读性 请务必统一这个规范！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！
 *
 * 命名规则 ！！
 * 单数主词 + 动词(s)
 * 考虑可读性 请务必统一这个规范！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！
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

    'IT_REQUESTS_NOT_ALLOWED_METHOD' => [
        'STATUS' => 405,
        'RESULT' => -1,
        'CODE' => -0.02,
        'MESSAGE' => 'it requests not allowed method'
    ],

    'IT_REQUESTS_NONEXISTENT_URI' => [
        'STATUS' => 501,
        'RESULT' => -1,
        'CODE' => -0.03,
        'MESSAGE' => 'it requests nonexistent URI'
    ],

    'IT_FAILS_TO_SHOW_LOTTERY' => [
        'STATUS' => 500,
        'RESULT' => -1,
        'CODE' => -1.01,
        'MESSAGE' => 'it fails to show lottery'
    ],


    'IT_IS_FORBIDDEN' => [
        'STATUS' => 403,
        'RESULT' => -1,
        'CODE' => -0.01,
        'MESSAGE' => 'it is forbidden'
    ],
    'IT_IS_EXPIRED' => [
        'STATUS' => 403,
        'RESULT' => -1,
        'CODE' => -3,
        'MESSAGE' => 'it is expired'
    ],

    'IT_IS_UNAUTHORIZED' => [
        'STATUS' => 401,
        'RESULT' => -1,
        'CODE' => -0.02,
        'MESSAGE' => 'it is unauthorized'
    ],
    'JWT_IS_EMPTY' => [
        'STATUS' => 401,
        'RESULT' => -1,
        'CODE' => -1,
        'MESSAGE' => 'jwt is empty'
    ],

];