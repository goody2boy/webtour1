<?php

namespace common\models\business;

use common\models\db\Category;
use common\models\enu\ImageType;
use common\models\inter\InterBusiness;
use common\models\output\Response;

/**
 * Description of CategoryBusiness
 *
 * @author CANH
 */
class CategoryBusiness implements InterBusiness {

    public static function get($id) {
        $item = Category::findOne($id);
        return $item;
    }
    
    public static function getAll(){
        return Category::find()->orderBy(['name' => SORT_ASC])->all();
    }

    public static function mGet($ids) {
        return Category::find()->andWhere(["id" => $ids])->all();
    }
    
    public static function getToKey($ids) {
        $categories = Category::find()->andWhere(["id" => $ids])->all();
        if ($categories == null || empty($categories)) {
            return $categories;
        }
        $result = [];
        foreach ($categories as $category) {
            $result[$category->id] = $category;
        }
        return $result;
    }

//put your code here
}
