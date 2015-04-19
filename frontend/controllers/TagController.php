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
class TagController extends BaseController {

    public function actionIndex() {
//        $post = Yii::$app->request->post();
//        $id = $post['id'];
        //
        $page = Yii::$app->request->get('page');
        $pageSize = Yii::$app->request->get('per-page');
        //
        $search = new TourSearch();
        $search->tag = 1;
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
        return $this->render('index', [
                    'tag' => 'Vietnam Discovery',
                    'listTours' => $listTours,
                    'cities' => $cities,
        ]);
    }

}
