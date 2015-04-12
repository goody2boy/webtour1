<?php

namespace frontend\controllers;

use common\models\business\CityBusiness;
use common\models\business\ImageBusiness;
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
        $cities = CityBusiness::getAll();
        $mapTours = [];
        foreach ($cities as $city) {
            $city->images = $this->getCityImages($city);
            $search = new TourSearch();
            $search->city = $city->id;
            $search->pageSize = 3;
            $mapTours[$city->id] = $search->search(true);
        }
        return $this->render('index', [
                    'cities' => $cities,
                    'maptours' => $mapTours,
        ]);
    }
    
    public function actionDetail() {
        $cities = CityBusiness::getAll();
        $mapTours = [];
        foreach ($cities as $city) {
            $city->images = $this->getCityImages($city);
            $search = new TourSearch();
            $search->city = $city->id;
            $search->pageSize = 3;
            $mapTours[$city->id] = $search->search(true);
        }
        return $this->render('index', [
                    'cities' => $cities,
                    'maptours' => $mapTours,
        ]);
    }
    
    public function getCityImages($city){
        return ImageBusiness::getByTarget($city->id, "city");
    }

}
