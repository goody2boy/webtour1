<?php

namespace frontend\controllers;

use common\models\business\BannerBusiness;
use common\models\business\TourBusiness;
use common\models\business\OptionBusiness;
use common\models\input\TourSearch;
use common\models\enu\BannerType;
use Yii;

/**
 * Description of CityController
 *
 * @author CANH
 */
class CityController extends BaseController {

    public function actionIndex() {
//        $heart = BannerBusiness::getByType(BannerType::HEART, 1);
//        $this->var['menuactive'] = Yii::$app->request->absoluteUrl;
//        $tourFeature = $this->getTourFeature();
//        $tourFeatureBoxs = $this->getTourFeatureBox();
//        $featureImage = $this->getImageFetureTour();
        return $this->render('index'
//                ,[
//                    'heart' => $heart,
//                    'tourFeature' => $tourFeature,
//                    'featureImage' => $featureImage,
//                    'tourFeatureBoxs' => $tourFeatureBoxs,
//        ]
                );
    }

}
