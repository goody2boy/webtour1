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

}
