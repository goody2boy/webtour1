<?php

namespace frontend\controllers;

use common\models\business\BannerBusiness;
use common\models\business\TourBusiness;
use common\models\enu\BannerType;

class IndexController extends BaseController {

    /**
     * Trang chủ backend
     * @return type
     */
    public function actionIndex() {
        $heart = BannerBusiness::getByType(BannerType::HEART, 1);
//        $tourFeature = 
//        $tour = TourBusiness::mGet(["1", "2", "3", "4"]);
        $tourFeatures = TourBusiness::mGet(["1", "2", "3", "4"]);
        return $this->render('index', [
        'heart' => $heart,
        'tourFeatures' => $tourFeatures,
        ]);
    }

    public function actionPhp() {
        phpinfo();
    }

}
