<?php

namespace common\models\business;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use common\models\db\Tour;
use common\models\inter\InterBusiness;
use common\models\output\Response;

/**
 * Description of TourBusiness
 *
 * @author CANH
 */
class TourBusiness implements InterBusiness {

    //put your code here
    public static function get($id) {
        return Tour::findOne($id);
    }

    public static function mGet($ids) {
        return Tour::find()->andWhere(["id" => $ids]);
    }

    public static function changeActive($id) {
        $tour = self::get($id);
        // check xem co tour nao dung loai tien nay khong
        if ($tour == null) {
            return new Response(false, "Tour này không tồn tại trên hệ thống");
        }
        $tour->status = $tour->status == 1 ? 0 : 1;
        $tour->save(false);
        return new Response(true, "Tour " . $tour->title . $tour->status ? "đã mở khóa" : "đã khóa", $tour);
    }

    public static function remove($id) {
        $tour = self::get($id);
        // check xem co tour nao dung loai tien nay khong
        Tour::deleteAll(['id' => $tour->id]);
        return new Response(true, "Xóa thành công Tour : </br>" . $tour->title);
    }

}
