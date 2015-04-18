<?php

namespace common\models\business;

use common\models\db\Review;
use common\models\enu\ImageType;
use common\models\inter\InterBusiness;
use common\models\output\Response;
use common\util\ImageClient;
use common\util\TextUtils;
use Exception;
use Yii;

class ReviewBusiness implements InterBusiness {

    public static function get($id) {
        return Tour::findOne($id);
    }

    public static function mGet($ids) {
        return Tour::find()->andWhere(["id" => $ids])->all();
    }

    public static function getAll($limit = 0) {
        
        if ($limit > 0) {
            $reviewList = Review::find()->orderBy(['rate' => SORT_ASC])->limit($limit)->all();
        } else {
            $reviewList = Review::find()->orderBy(['rate' => SORT_ASC])->all();
        }
        foreach($reviewList as $review){
            $tour = TourBusiness::get($review->tour_id);
            $tour->images = ImageBusiness::getByTarget($review->tour_id, "tour");
            $review->tour = $tour;
        }
        return $reviewList;
    }

    public static function getByTour($tourId) {
        return Review::find()->andWhere(['tour_id' => $tourId])->orderBy(['rate' => SORT_ASC])->all();
    }

}
