<?php

namespace frontend\controllers;

use common\models\business\BannerBusiness;
use common\models\business\ReviewBusiness;
use common\models\business\OptionBusiness;
use common\models\input\TourSearch;
use common\models\enu\BannerType;
use Yii;

class IndexController extends BaseController {

    /**
     * Trang chủ backend
     * @return type
     */
    public function actionIndex() {
        $heart = BannerBusiness::getByType(BannerType::HEART, 1);
        $this->var['menuactive'] = Yii::$app->request->absoluteUrl;
        $tourFeature = $this->getTourFeature();
        $tourFeatureBoxs = $this->getTourFeatureBox();
        $featureImage = $this->getImageFetureTour();
        $reviewList = ReviewBusiness::getAll(6);
        return $this->render('index', [
                    'heart' => $heart,
                    'tourFeature' => $tourFeature,
                    'featureImage' => $featureImage,
                    'tourFeatureBoxs' => $tourFeatureBoxs,
                    'reviewLists' => $reviewList,
        ]);
    }

    public function getTourFeatureBox() {
        $tourFeatures = [];
        $search = new TourSearch();
        $nameArr = ['HOMEBOX'];
        $listTourIds = preg_split("/,/", OptionBusiness::getConfig($nameArr, 1)[0]->value);
        foreach ($listTourIds as $tourId) {
            $search->id = $tourId;
            $tourFeatures[] = $search->search(true)->data[0];
        }
        return $tourFeatures;
    }

    public function getTourFeature() {
        $search = new TourSearch();
        $nameArr = ['FEATURETUOUR'];
        $tourId = OptionBusiness::getConfig($nameArr, 1)[0]->value;
        $search->id = $tourId;
        $tourFeature = $search->search(true)->data[0];
        return $tourFeature;
    }

    public function getImageFetureTour() {
        $nameArr = ['FEATURETUREIMAGE'];
        $imageLink = OptionBusiness::getConfig($nameArr, 1)[0]->value;
        return $imageLink;
    }

    public function actionPhp() {
        phpinfo();
    }

}
