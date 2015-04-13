<?php

namespace common\models\business;

use common\models\db\Hightlight;
use common\models\enu\ImageType;
use common\models\inter\InterBusiness;
use common\models\output\Response;
/**
 * Description of HightLightBusiness
 *
 * @author CANH
 */
class HightLightBusiness implements InterBusiness {

    /**
     * Chi tiết thành phố hiện hành
     * @param type $id
     */
    public static function get($id) {
        return Hightlight::findOne($id);
    }

    /**
     * Lấy tất cả thành phố hiện hành
     */
    public static function getAll() {
        return Hightlight::find()->orderBy(['name' => SORT_ASC])->all();
    }

  

    public static function mGet($ids) {
        return Hightlight::findAll(["id" => $ids]);
    }

    public static function getToKey($ids) {
        $hightlights = Hightlight::find()->andWhere(["id" => $ids])->all();
        if ($hightlights == null || empty($hightlights)) {
            return $hightlights;
        }
        $result = [];
        foreach ($hightlights as $hilight) {
            $result[$hilight->id] = $hilight;
        }
        return $result;
    }

}
