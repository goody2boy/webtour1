<?php

namespace common\models\business;

use common\models\db\CategoryTour;
use common\models\inter\InterBusiness;
use common\models\output\Response;

/**
 * Description of CategoryTourBusiness
 *
 * @author CANH
 */
class CategoryTourBusiness implements InterBusiness {

    public static function get($id) {
        $item = CategoryTour::findOne($id);
        return $item;
    }

    public static function mGet($ids) {
        return CategoryTour::find()->andWhere(["id" => $ids])->all();
    }

    public static function getByTour($tourIds) {
        $cateTours = CategoryTour::find()->andWhere(["tour_id" => $tourIds])->all();
        if ($cateTours == null || empty($cateTours)) {
            return $cateTours;
        }
        $result = [];
        foreach ($cateTours as $cateT) {
            if (!isset($result[$cateT->tour_id]) || $result[$cateT->tour_id] == null) {
                $result[$cateT->tour_id] = [];
            }
            $result[$cateT->tour_id][] = $cateT->cate_id;
        }
        return $result;
    }

    public static function getByCate($cateId) {
        $cateTours = CategoryTour::find()->andWhere(["cate_id" => $cateId])->all();
        if ($cateTours == null || empty($cateTours)) {
            return $cateTours;
        }
        $result = [];
        foreach ($cateTours as $cateT) {
            if (!isset($result[$cateT->cate_id]) || $result[$cateT->cate_id] == null) {
                $result[$cateT->cate_id] = [];
            }
            $result[$cateT->cate_id][] = $cateT->tour_id;
        }
        return $result;
    }

    public static function removeByTour($tourId) {
        CategoryTour::deleteAll(['tour_id' => $tourId]);
        return new Response(true, "Xóa thành công Category Tour");
    }

    public static function addCateTour($tourId, $cateIds) {
//        CategoryTour::find()->andWhere(["tour_id" => $tourId])->all();
        self::removeByTour($tourId);
        foreach ($cateIds as $cateId) {
            $cateTour = new CategoryTour();
            $cateTour->tour_id = $tourId;
            $cateTour->cate_id = $cateId;
            if (!$cateTour->save(false)) {
                return new Response(false, "Thêm Tour-Category thất bại.", $cateTour->errors);
            }
        }
        return new Response(true, "Thêm Tour-Category thành công.", $cateTour);
    }

}
