<?php

namespace frontend\controllers;

use common\models\business\HightLightBusiness;
use common\models\business\ImageBusiness;
use common\models\business\CityBusiness;
use common\models\input\TourSearch;
use common\models\enu\ImageType;
use common\models\enu\BannerType;
use yii\data\Pagination;
use Yii;

/**
 * Description of HightLightController
 *
 * @author CANH
 */
class HightLightController extends BaseController {

    public function actionIndex() {
        $hightlights = HightLightBusiness::getAll();
        $mapTours = [];
        foreach ($hightlights as $hilight) {
            $hilight->images = $this->getHightLightImages($hilight);
            $search = new TourSearch();
            $search->hightlight = $hilight->id;
            $search->pageSize = 3;
            $mapTours[$hilight->id] = $search->search(true);
        }
        return $this->render('index', [
                    'hightlights' => $hightlights,
                    'maptours' => $mapTours,
        ]);
    }

    public function actionDetail() {
        $alias = Yii::$app->request->get('alias');
        $id = Yii:: $app->request->get('id');
        //
        $page = Yii::$app->request->get('page');
        $pageSize = Yii::$app->request->get('per-page');
        //
        $hilight = HightLightBusiness::get($id);
        $hilight->images = $this->getHightLightImages($hilight);
        //
        $search = new TourSearch();
        $search->hightlight = $hilight->id;
        if ($page > 0) {
            $search->page = $page;
        }
        if ($pageSize > 0) {
            $search->pageSize = $pageSize;
        } else {
            $search->pageSize = 6;
        }
        $listTours = $search->search(true);
        //
        $cities = CityBusiness::getAll();
        return $this->render('detail', [
                    'hilight' => $hilight,
                    'listTours' => $listTours,
                    'cities'=>$cities,
        ]);
    }

    public function getHightLightImages($hilight) {
        return ImageBusiness::getByTarget($hilight->id, ImageType::HIGHTLIGHT);
    }

}
