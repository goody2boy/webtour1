<?php

namespace common\models\business;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use common\models\db\Option;

/**
 * Description of HomeBussiness
 *
 * @author CANH
 */
class OptionBusiness {

    //put your code here
    public static function get($id) {
        return Option::findOne($id);
    }

    public static function getConfig($nameArr = [], $active = 0) {
        $find = Option::find();
        $find->andWhere(["key" => $nameArr]);
        if ($active > 0) {
            $find->andWhere(["auto_load" => $active == 1 ? 1 : 0]);
        }
        $resultQuery = $find->all();
        $result = array();
        $count = 0;
        foreach ($nameArr as $key) {
            foreach ($resultQuery as $row) {
                if($key == $row["key"]){
                    $result[$count] = $row;
                    break;
                }
            }
            $count++;
        }
        return $result;
    }

}
