<?php

namespace common\models\business;


use common\models\db\Price;
use common\models\inter\InterBusiness;
use common\models\output\Response;

/**
 * Description of PriceBusiness
 *
 * @author CANH
 */
class PriceBusiness implements InterBusiness {
    
    
    public static function get($id) {
        return Price::findOne($id);
    }

    public static function mGet($ids) {
        return Price::find()->andWhere(["id" => $ids]);
    }
    
    public statuc function getByTour($tourId){
        $query ->
    }
}
