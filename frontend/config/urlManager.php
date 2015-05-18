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
        'register.html' => 'user/register',
        'login.html' => 'user/login',
        'logout.html' => 'user/logout',
        'profile.html' => 'user/profile',
        'forgot.html' => 'user/forgot',
        'changepassword.html' => 'user/changepassword',
        'my-booking.html' => 'user/booking',
        //reviews
        'GET y-kien-khach-hang.html' => 'reviews/index',
        //lien he
        'GET lien-he.html' => 'contact/index',
        //---News
        'GET other-service.html' => 'news/index',
//        'GET other-service/<alias:[0-9a-z_-]+>' => 'news/browse',
        'GET other-service/<alias:[0-9a-z_-]+>.html' => 'news/detail',
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
        //---tour
        'GET san-pham.html' => 'item/index',
        'our-cities.html' => 'city/index',
        'city-type/<alias:[0-9a-z_-]+>-<id:\d+>.html' => 'city/types',
        'city-tours/<type:[0-9a-z_-]+>-<typeid:\d+>/<alias:[0-9a-z_-]+>-<id:\d+>.html' => 'city/tours',
        'city-highlight.html' => 'hight-light/index',
        'hightlight/<alias:[0-9a-z_-]+>-<id:\d+>.html' => 'hight-light/detail',
        'tour/<alias:[0-9a-z_-]+>-<id:\d+>.html' => 'tour/detail',
        'tour-type/<alias:[0-9a-z_-]+>-<id:\d+>.html' => 'category/detail',
        'checkout-<id:\d+>.html' => 'order/checkout',
        'tour-request.html' => 'tour/request',
        'diary.html' => 'diary/index',
        'comments.html' => 'diary/comments',
        'vietnam-discovery.html' => 'tag/discover',
        'travel-journal.html' => 'tag/travel',
        'culture-story.html' => 'tag/culture',
    ],
];
