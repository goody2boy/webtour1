<?php


namespace frontend\controllers;

use common\models\business\BannerBusiness;
use common\models\business\TourBusiness;
use common\models\business\OptionBusiness;
use common\models\input\TourSearch;
use common\models\enu\BannerType;


/**
 * Description of TourController
 *
 * @author CANH
 */
class TourController extends BaseController {

    /**
     * Trang chủ backend
     * @return type
     */
    public function actionIndex() {
        $heart = BannerBusiness::getByType(BannerType::HEART, 1);
        $tourFeatures = $this->getTourFeatureBox();
        return $this->render('index', [
                    'heart' => $heart,
                    'tourFeatures' => $tourFeatures,
        ]);
    }
    
    public function actionDetail() {
        $heart = BannerBusiness::getByType(BannerType::HEART, 1);
        $tourFeatures = $this->getTourFeatureBox();
        return $this->render('index', [
                    'heart' => $heart,
                    'tourFeatures' => $tourFeatures,
        ]);
    }
    
    public function getTourFeatureBox() {
        $tourFeatures = [];
        $search = new TourSearch();
        $nameArr = ['HOMEBOX'];
        $listTourIds = preg_split ("/,/", OptionBusiness::getConfig($nameArr, 1)[0]->value);
        foreach ($listTourIds as $tourId) {
            $search->id = $tourId;
            $tourFeatures[] = $search->search(true)->data[0];
        }
        return $tourFeatures;
    }
    
    
}
