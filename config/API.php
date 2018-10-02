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
    'JWT' => [
        'EXPIRES'  => 60 * 60 * 1000, // 1 hour
        'SUBJECT'  => 'support@jinku.com',
        'ISSUER'   => 'support@jinku.com',
        'AUDIENCE' => 'jinku.com',
        'SECRET'   => 'f0f91cfe0527aca17aa53df53d5d7dba2d92eec6e774c989bceae0f62a15f2b7b5510bc7d9427229a9acd8df27c685750660ecb1b4322b9003f00145b00bfd40a96704bd3fe0e5173f59279f6203c04a'
    ]
];