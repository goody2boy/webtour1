<?php

namespace common\models\business;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use common\models\db\Promotion;
use common\models\inter\InterBusiness;
use common\models\output\Response;

/**
 * Description of PromotionBusiness
 *
 * @author CANH
 */
class PromotionBusiness implements InterBusiness {

    //put your code here
    public static function get($id) {
        return Promotion::findOne($id);
    }

    public static function mGet($ids, $limit = 0) {
        if ($limit > 0) {
            return Promotion::find()->andWhere(["id" => $ids])->limit($limit)->all();
        } else {
            return Promotion::find()->andWhere(["id" => $ids])->all();
        }
    }
    
    public static function getBycode($code){
        return Promotion::find()->andWhere(["code" => $code])->all();
    }

}
