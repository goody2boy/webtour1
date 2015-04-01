<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use \common\models\db\Money;
/**
 * Description of MoneyBusiness
 *
 * @author CANH
 */
class MoneyBusiness {

    //put your code here

    public static function getAll() {
        return Money::findAll();
    }
    
    public static function search(){
        
    }

}
