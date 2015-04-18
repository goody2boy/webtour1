<?php

namespace frontend\controllers;

use common\models\business\CategoryBusiness;
use common\models\business\ImageBusiness;
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
class CategoryController extends BaseController {

    public function actionIndex() {
        $categries = CategoryBusiness::getAll();
        $mapTours = [];
        foreach ($categries as $city) {
            $city->images = $this->getCityImages($city);
            $search = new TourSearch();
            $search->city = $city->id;
            $search->pageSize = 3;
            $mapTours[$city->id] = $search->search(true);
        }
        return $this->render('index', [
                    'cities' => $categries,
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
