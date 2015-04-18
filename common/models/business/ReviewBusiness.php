<?php

namespace common\models\business;

use common\models\db\Review;
use common\models\enu\ImageType;
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
    
    public static function getAll() {
        return Review::find()->orderBy(['rate' => SORT_ASC])->all();
    }

}
