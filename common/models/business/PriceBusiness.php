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
        return Price::find()->andWhere(["id" => $ids])->all();
    }

    public static function getByTour($tourId) {
        return Price::find()->andWhere(["tour_id" => $tourId])->orderBy("position ASC")->all();
    }
    
    public static function getByTours($tourIds) {
        return Price::find()->andWhere(["tour_id" => $tourIds])->orderBy("position ASC")->all();
    }

//    public statuc function getByTour($tourId){
//        $query ->
//    }
}
