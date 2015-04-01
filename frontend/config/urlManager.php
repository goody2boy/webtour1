<?php

return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        //---default index
        '' => 'index/index',
        'index.php' => 'index/index',
        'index.html' => 'index/index',
        //reviews
        'GET y-kien-khach-hang.html' => 'reviews/index',
        //lien he
        'GET lien-he.html' => 'contact/index',
        //---News
        'GET tin-tuc.html' => 'news/index',
        'GET tin-tuc/<alias:[0-9a-z_-]+>' => 'news/browse',
        'GET tin-tuc/<alias:[0-9a-z_-]+>.html' => 'news/detail',
        //---video
        'GET video.html' => 'video/index',
//        'GET video/<alias:[0-9a-z_-]+>' => 'video/browse',
        'GET video/<alias:[0-9a-z_-]+>-<id:[0-9a-zA-Z_-]+>.html' => 'video/detail',
        //dat hang
        'GET dat-hang.html' => 'order/checkout',
        //---image
        'GET hinh-anh.html' => 'album/index',
        'GET hinh-anh/<alias:[0-9a-z_-]+>-<id:\d+>.html' => 'album/index',
        //---contact
        'GET lien-he.html' => 'contact/index',
        //---item
        'GET p/<alias:[0-9a-z_-]+>-<id:\d+>.html' => 'item/detail',
        'GET san-pham.html' => 'item/index',
    ],
];
