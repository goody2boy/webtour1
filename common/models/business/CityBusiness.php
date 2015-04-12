<?php

namespace common\models\business;

use common\models\db\City;
use common\models\enu\ImageType;
use common\models\inter\InterBusiness;
use common\models\output\Response;

class CityBusiness implements InterBusiness {

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
        ImageBusiness::deleteByTarget($id);
        return new Response(true, "Xóa thành phố thành công", City::deleteAll(['id' => $id]));
    }

    /**
     * Lấy tất cả thành phố hiện hành
     */
    public static function getAll() {
        return City::find()->orderBy(['name' => SORT_ASC])->all();
    }

    public static function getCityByCountry($coutryId) {
        $cities = City::findAll(['country_id' => $coutryId]);
        $ids = [];
        foreach ($cities as $city) {
            $ids[] = $city->id;
        }
        $images = ImageBusiness::getByTarget($ids, ImageType::CITY, true, true);
        foreach ($cities as $city) {
            $city->images = isset($images[$city->id]) ? $images[$city->id] : [];
        }

        return $cities;
    }

    public static function mGet($ids) {
        return City::findAll(["id" => $ids]);
    }

    public static function getToKey($ids) {
        $cities = City::find()->andWhere(["id" => $ids])->all();
        if ($cities == null || empty($cities)) {
            return $cities;
        }
        $result = [];
        foreach ($cities as $city) {
            $result[$city->id] = $city;
        }
        return $result;
    }

}
