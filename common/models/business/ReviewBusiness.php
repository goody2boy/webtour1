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
        return Review::findOne($id);
    }

    public static function mGet($ids) {
        return Review::find()->andWhere(["id" => $ids])->all();
    }

    public static function getAll($limit = 0) {

        if ($limit > 0) {
            $reviewList = Review::find()->orderBy(['rate' => SORT_ASC])->limit($limit)->all();
        } else {
            $reviewList = Review::find()->orderBy(['rate' => SORT_ASC])->all();
        }
        foreach ($reviewList as $review) {
            $user = UserBusiness::get($review->user_id);
            $user->images = ImageBusiness::getByTarget($review->user_id, "user");
            $review->user = $user;
        }
        return $reviewList;
    }

    public static function getByIds($ids) {
        $reviewList = Review::find()->andWhere(["id" => $ids])->orderBy(['rate' => SORT_ASC])->all();
        foreach ($reviewList as $review) {
            $user = UserBusiness::get($review->user_id);
            $user->images = ImageBusiness::getByTarget($review->user_id, "user");
            $review->user = $user;
        }
        return $reviewList;
    }

    public static function getByUser($userId) {
        return Review::find()->andWhere(['user_id' => $userId])->orderBy(['rate' => SORT_ASC])->all();
    }

    public static function countAllStar() {
        return Review::find()->count("rate");
    }

    public static function averageAllStar() {
        return Review::find()->average("rate");
    }

    public static function sumAllStar() {
        return Review::find()->sum("rate");
    }

}
