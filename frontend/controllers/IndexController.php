<?php

namespace frontend\controllers;

use common\models\business\BannerBusiness;
use common\models\business\TourBusiness;
use common\models\input\TourSearch;
use common\models\enu\BannerType;

class IndexController extends BaseController {

    /**
     * Trang chủ backend
     * @return type
     */
    public function actionIndex() {
        $heart = BannerBusiness::getByType(BannerType::HEART, 1);
//        $tourFeatures = TourBusiness::mGet(["1", "2", "3", "4"]);
        $search = new TourSearch();
        $search->id = "1";
        // 
        $tour1= $search->search(true)->data;
        $search->id = "2";
        $tour2= $search->search(true)->data;
        $search->id = "3";
        $tour3= $search->search(true)->data;
        $search->id = "4";
        $tour4= $search->search(true)->data;
        $tourFeatures[] =  $tour1;
        $tourFeatures[] =  $tour2;
        $tourFeatures[] =  $tour3;
        $tourFeatures[] =  $tour4;
        return $this->render('index', [
        'heart' => $heart,
        'tourFeatures' => $tourFeatures,
        ]);
    }

    public function actionPhp() {
        phpinfo();
    }

}
