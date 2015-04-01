<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=123.30.129.231:3306;dbname=cafeitvn_webtourdb',
            'username' => 'cafeitvn_webtour',
            'password' => 'webtour',
            'charset' => 'utf8',
        ],
    ],
];
