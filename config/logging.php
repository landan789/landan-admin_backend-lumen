<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/30
 * Time: 13:11
 */

return [
    'channels' => [
        'lottery' => [
            'driver' => 'single',
            'level' => 'info',
            'path' => storage_path('logs/lottery.log'),
        ],
        'issue' => [
            'driver' => 'single',
            'level' => 'info',
            'path' => storage_path('logs/issue.log'),
        ],
        'any' => [
            'driver' => 'single',
            'level' => 'info',
            'path' => storage_path('logs/any.log'),
        ],
    ]
];