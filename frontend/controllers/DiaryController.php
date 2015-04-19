<?php

namespace frontend\controllers;

use common\models\business\ImageBusiness;
use common\models\business\TourBusiness;
use common\models\business\ReviewBusiness;
use common\models\business\MoneyBusiness;
use common\models\business\MoneyConvertBusiness;
use common\models\input\TourSearch;
use common\models\enu\ImageType;
use common\util\TextUtils;
use Yii;

/**
 * Description of diary
 *
 * @author CANH
 */
class DiaryController extends BaseController {

    /**
     * Trang chủ backend
     * @return type
     */
    public function actionIndex() {
        $photos = ImageBusiness::getByType(ImageType::TOUR, false, false, 8);
        $tourIds = [];
        foreach ($photos as $img) {
            $tourIds[] = $img->targetId;
        }
        $search = new TourSearch();
        $search->status = 1;
        foreach ($photos as $img) {
            $search->id = $img->targetId;
            $tour = $search->search(true)->data[0];
            $img->target = $tour;
        }
        $reviews = ReviewBusiness::getAll(6);
        return $this->render('index', [
                    'photos' => $photos,
                    'reviews' => $reviews,
        ]);
    }

}
