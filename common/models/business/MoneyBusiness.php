<?php

namespace common\models\business;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use common\models\db\Money;
use common\models\inter\InterBusiness;
use common\models\output\Response;

/**
 * Description of MoneyBusiness
 *
 * @author CANH
 */
class MoneyBusiness implements InterBusiness {

    //put your code here

    public static function getAll() {
        return Money::findAll();
    }

    public static function remove($id) {
        $money = self::get($id);
        // check xem co tour nao dung loai tien nay khong
        Money::deleteAll(['id' => $money->id]);
        return new Response(true, "Xóa thành công money");
    }

    public static function changeActive($id) {
        $money = self::get($id);
        // check xem co tour nao dung loai tien nay khong
        if ($money == null) {
            return new Response(false, "Loại tiền này không tồn tại trên hệ thống");
        }
        $money->active = $money->active == 1 ? 0 : 1;
        $money->save(false);
        return new Response(true, "Loại tiền " . $money->name . $money->active ? "đã mở khóa" : "đã khóa", $money);
    }

    public static function get($id) {
        $money = Money::findOne($id);
        return $money;
    }

    public static function mGet($ids) {
        return Money::find()->andWhere(['id' => $ids])->all();
    }

}
