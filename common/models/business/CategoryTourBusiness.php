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
    
    public static function getByTour($tourIds){
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
    
    public static function getByCate($cateId){
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

//put your code here
}
