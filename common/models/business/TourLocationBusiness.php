<?php

namespace common\models\business;

use common\models\db\TourLocation;
use common\models\inter\InterBusiness;
use common\models\output\Response;


/**
 * Description of TourLocationBusiness
 *
 * @author CANH
 */
class TourLocationBusiness implements InterBusiness {

    public static function get($id) {
        return TourLocation::findOne($id);
    }

    public static function mGet($ids) {
        return TourLocation::find()->andWhere(["id" => $ids])->all();
    }

    public static function getByTour($tourId) {
        return TourLocation::find()->andWhere(["tour_id" => $tourId])->orderBy("position ASC")->all();
    }
    
    public static function getByTours($tourIds) {
        return TourLocation::find()->andWhere(["tour_id" => $tourIds])->orderBy("position ASC")->all();
    }

    public static function removeByTour($tourId) {
        TourLocation::deleteAll(['tour_id' => $tourId]);
        return new Response(true, "Xóa thành công Địa điểm");
    }
    
    public static function remove($id){
        TourLocation::deleteAll(['id' => $id]);
        return new Response(true, "Xóa thành công Địa điểm");
    }
}
