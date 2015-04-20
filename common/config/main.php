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
//            'dsn' => 'mysql:host=mysql.hostinger.vn;dbname=u240183961_loz',
//            'username' => 'u240183961_loz',
//            'password' => 'pa880413',
            'charset' => 'utf8',
        ],
         'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'noreply.hoalua@gmail.com',
                'password' => 'hoalua.com',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ]
    ],
];
