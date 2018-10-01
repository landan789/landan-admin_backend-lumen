<?php
/**
 * Created by PhpStorm.
 * User: Landan
 * Date: 2018/9/28
 * Time: 14:11
 *
 * Don't design this structure [OVER 2 NESTED] because it will be very mess and hard to maintain
 * 请不要设计这个结构 [超过两层]，不移维护
 *
 */return [
     'DATA_SUCCED_TO_FIND' => [
         'CODE' => 0,
         'MESSAGE' => 'data succed to find'
     ],
     'DATA_SUCCED_TO_INSERT' => [
        'CODE' => 0,
        'MESSAGE' => 'data succed to insert'
     ],
     'DATA_SUCCED_TO_UPDATE' => [
        'CODE' => 0,
        'MESSAGE' => 'data succed to update'
     ],
     'DATA_SUCCED_TO_REMOVE' => [
        'CODE' => 0,
        'MESSAGE' => 'data succed to remove'
     ],

    'USER_SUCCEDS_TO_SIGNIN' => [
        'CODE' => 0,
        'MESSAGE' => 'user succeds to signin'
    ],


     'UNKNOWN_ERROR' => [
         'CODE' => -999,
         'MESSAGE' => 'unknown error'
     ],


    'JWT_IS_NOT_PERMITTED' => [
        'CODE' => -3,
        'MESSAGE' => 'jwt is not permitted'
    ],
    'JWT_HAS_EXPIRED' => [
        'CODE' => -2,
        'MESSAGE' => 'jwt has expired'
    ],
    'JWT_IS_NOT_AUTHORIZED' => [
        'CODE' => -1,
        'MESSAGE' => 'jwt is not authorized'
    ],


    'USER_USERID_IS_EMPTY' => [
        'CODE' => 1.1,
        'MESSAGE' => 'user userid is empty'
    ],
    'USER_NAME_IS_EMPTY' => [
        'CODE' => 1.2,
        'MESSAGE' => 'user name is empty'
    ],
    'USER_PASSOWRD_DOESNT_MATCH' => [
        'CODE' => 1.3,
        'MESSAGE' => 'user password doesnt match'
    ],

    'CUSTOMER_CUSTOMERID_IS_EMPTY' => [
        'CODE' => 2.1,
        'MESSAGE' => 'customer customerid is empty'
    ],
];