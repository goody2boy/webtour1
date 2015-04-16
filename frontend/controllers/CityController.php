<?php

namespace frontend\controllers;

use common\models\business\CityBusiness;
use common\models\business\ImageBusiness;
use common\models\business\HightLightBusiness;
use common\models\enu\ImageType;
use common\models\input\TourSearch;
use common\models\input\CitySearch;
use common\util\TextUtils;
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

    public function actionTypes() {
        $alias = Yii::$app->request->get('alias');
        $id = Yii:: $app->request->get('id');
        $search = new CitySearch();
        $search->id = $id;
        $result = $search->search(true)->data;
        $city = $result[0];
        if (TextUtils::removeMarks($city->name) != $alias) {
            return $this->render('//error/message', ['message' => "City không tồn tại", 'title' => "404 NOT FOUND"]);
        }
        $hightlights = HightLightBusiness::getAll();
        return $this->render('types', [
                    'city' => $city,
                    'hightlights' => $hightlights,
        ]);
    }

    public function getCityImages($city) {
        return ImageBusiness::getByTarget($city->id, ImageType::CITY);
    }

}
