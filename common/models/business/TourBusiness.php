<?php
namespace common\models\business;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use common\models\db\Tour;
/**
 * Description of TourBusiness
 *
 * @author CANH
 */
class TourBusiness {
    //put your code here
    public static function get($id){
        return Tour::findOne($id);
    }
}
