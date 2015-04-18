<?php

namespace frontend\controllers;

use common\models\business\CategoryBusiness;
use common\models\business\ImageBusiness;
use common\models\business\CityBusiness;
use common\models\enu\ImageType;
use common\models\input\TourSearch;
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
    
    public function actionDetail() {
        $alias = Yii::$app->request->get('alias');
        $id = Yii:: $app->request->get('id');
        //
        $category = CategoryBusiness::get($id);
        $category->images = $this->getCategoryImages($category);
        //
        $search = new TourSearch();
        $search->tourType = $category->id;
        $search->pageSize = 6;
        $listTours = $search->search(true);
        //
        $cities = CityBusiness::getAll();
        return $this->render('detail', [
                    'category' => $category,
                    'listTours' => $listTours,
                    'cities'=>$cities,
        ]);
    }

    public function getCategoryImages($cate) {
        return ImageBusiness::getByTarget($cate->id, ImageType::CATEGORY);
    }

}
