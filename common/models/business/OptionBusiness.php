<?php

namespace common\models\business;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use common\models\db\Option;
use common\models\output\Response;

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
    public static function getByKey($key) {
        $key = strtoupper($key);
        return Option::find()->andWhere(['=','key',$key])->one();
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
                if ($key == $row["key"]) {
                    $result[$count] = $row;
                    break;
                }
            }
            $count++;
        }
        return $result;
    }

    public static function changeActive($id) {
        $option = self::get($id);
        if ($option == null) {
            return new Response(false, "Option không tồn tại trên hệ thống");
        }
        $option->auto_load = $option->auto_load == 1 ? 0 : 1;
        $option->save(false);
        return new Response(true, "Ok", $option);
    }

    public static function remove($id) {
        $option = self::get($id);
        if ($option == null) {
            return new Response(false, "Option không tồn tại trên hệ thống");
        }
        $option->delete();
        return new Response(true, "Xóa option thành công");
    }

}
