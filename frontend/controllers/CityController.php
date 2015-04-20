<?php

namespace frontend\controllers;

use common\models\business\CityBusiness;
use common\models\business\CategoryBusiness;
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
        $categories = CategoryBusiness::getAll();
        return $this->render('types', [
                    'city' => $city,
                    'hightlights' => $hightlights,
                    'categories' => $categories,
        ]);
    }

    public function actionTours() {
        $cityAlias = Yii::$app->request->get('alias');
        $cityId = Yii:: $app->request->get('id');
        $hilightAlias = Yii::$app->request->get('type');
        $hilightId = Yii:: $app->request->get('typeid');
        $search1 = new CitySearch();
        $search1->id = $cityId;
        $result = $search1->search(true)->data;
        $city = $result[0];
        if (TextUtils::removeMarks($city->name) != $cityAlias) {
            return $this->render('//error/message', ['message' => "City không tồn tại", 'title' => "404 NOT FOUND"]);
        }
        $hightlight = HightLightBusiness::get($hilightId);
        if (TextUtils::removeMarks($hightlight->name) != $hilightAlias) {
            return $this->render('//error/message', ['message' => "City không tồn tại", 'title' => "404 NOT FOUND"]);
        }
        $categories = CategoryBusiness::getAll();
        //
        $page = Yii::$app->request->get('page');
        $pageSize = Yii::$app->request->get('per-page');
        $search2 = new TourSearch();
        if ($page > 0) {
            $search2->page = $page;
        }
        if ($pageSize > 0) {
            $search2->pageSize = $pageSize;
        } else {
            $search2->pageSize = 6;
        }
        $search2->city = $cityId;
        $search2->hightlight = $hilightId;
        $listTours = $search2->search(true);
        return $this->render('tours', [
                    'city' => $city,
                    'hightlights' => $hightlight,
                    'categories' => $categories,
                    'listTours' => $listTours,
        ]);
    }

    public function getCityImages($city) {
        return ImageBusiness::getByTarget($city->id, ImageType::CITY);
    }

}
