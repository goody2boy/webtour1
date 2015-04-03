<?php

namespace common\models\business;

use common\models\db\City;
use common\models\db\Country;
use common\models\output\Response;

class CountryBusiness {

    /**
     * Chi tiết thành phố hiện hành
     * @param type $id
     */
    public static function get($id) {
        return Country::findOne($id);
    }

    /**
     * Xóa thành phố theo id
     * @param type $id
     */
    public static function remove($id) {
        if (City::findAll(['country_id' => $id]) != null) {
            return new Response(false, "Vui lòng xóa thành phố trước khi thực hiện xóa quốc gia , xin cảm ơn");
        }
        return new Response(true, "Xóa quốc gia thành công", Country::deleteAll(['id' => $id]));
    }

    /**
     * Lấy tất cả thành phố hiện hành
     */
    public static function getAll() {
        return Country::find()->orderBy(['name' => SORT_ASC])->all();
    }

}
