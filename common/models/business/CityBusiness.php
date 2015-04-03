<?php

namespace common\models\business;

use common\models\db\City;
use common\models\db\District;
use common\models\output\Response;

class CityBusiness {

    /**
     * Chi tiết thành phố hiện hành
     * @param type $id
     */
    public static function get($id) {
        return City::findOne($id);
    }

    /**
     * Xóa thành phố theo id
     * @param type $id
     */
    public static function remove($id) {
        return new Response(true, "Xóa thành phố thành công", City::deleteAll(['id' => $id]));
    }

    /**
     * Lấy tất cả thành phố hiện hành
     */
    public static function getAll() {
        return City::find()->orderBy(['name' => SORT_ASC])->all();
    }

   public static function getCityByCountry($coutryId){
       return City::findAll(['country_id'=>$coutryId]);
   }

}
