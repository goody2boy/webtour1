<?php

namespace common\models\business;

use common\models\db\Order;
use common\models\db\Tour;
use common\models\inter\InterBusiness;

class OrderBusiness implements InterBusiness {

    /**
     * Menu
     * @param type $id
     * @return type
     */
public static function isJson($string)
{
    // make sure provided input is of type string
    if (!is_string($string)) {
        return false;
    }
 
    // trim white spaces
    $string = trim($string);
 
    // get first character
    $firstChar = substr($string, 0, 1);
 
    // get last character
    $lastChar = substr($string, -1);
 
    // check if there is a first and last character
    if (!$firstChar || !$lastChar) {
        return false;
    }
 
    // make sure first character is either { or [
    if ($firstChar !== '{' && $firstChar !== '[') {
        return false;
    }
 
    // make sure last character is either } or ]
    if ($lastChar !== '}' && $lastChar !== ']') {
        return false;
    }
 
    // let's leave the rest to PHP.
    // try to decode string
    json_decode($string);
 
    // check if error occurred
    $isValid = json_last_error() === JSON_ERROR_NONE;
 
    return $isValid;
}

    public static function mGet($ids, $limit = 0) {
        if ($limit > 0) {
            return Order::find()->andWhere(["id" => $ids])->limit($limit)->all();
        } else {
            return Order::find()->andWhere(["id" => $ids])->all();
        }
    }

    public static function get($id) {
        return Order::findOne($id);
    }
    
    public static function getOrderByUser($userId){
        return Order::find()->andWhere(["user_id" => $userId])->orderBy("date_departure ASC")->all();
    }

}