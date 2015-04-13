<?php

namespace common\models\business;

use common\models\inter\InterBusiness;
use common\models\db\MoneyConvert;
use common\models\output\Response;

/**
 * Description of MoneyConvertBusiness
 *
 * @author CANH
 */
class MoneyConvertBusiness implements InterBusiness {

    //put your code here

    public static function getAll() {
        return MoneyConvert::findAll();
    }

    public static function get($id) {
        return MoneyConvert::find()->andWhere(['from_id' => $ids])->all();
    }

    public static function getFromTo($fromId, $toId) {
        return MoneyConvert::find()->andWhere(['from_id' => $fromId])->andWhere(['to_id' => $toId])->all();
    }

    public static function getFromUSDToOther($list) {
        $usdId = MoneyBusiness::getByCode("USD")[0]->id;
        return MoneyConvertBusiness::getFromToOther($usdId, $list);
    }

    public static function getFromToOther($fromId, $list) {
        $result = [];
        foreach ($list as $id) {
            if ($id == $fromId) {
                $result[$id] = 1;
            } else {
                $result[$id] = MoneyConvertBusiness::getFromTo($fromId, $id)[0]->rate;
            }
        }
        return $result;
    }

    public static function mGet($ids) {
        return MoneyConvert::find()->andWhere(['from_id' => $ids])->all();
    }

}
