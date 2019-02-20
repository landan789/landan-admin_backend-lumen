<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2018/9/30
 * Time: 13:11
 */

return [
    'channels' => [
        'API' => [
            'driver' => 'single',
            'level' => 'info',
            'path' => storage_path('logs/backend.log'),
        ]
    ]
];