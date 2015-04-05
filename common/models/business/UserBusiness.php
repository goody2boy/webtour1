<?php

namespace common\models\business;

use common\models\db\User;
use common\models\inter\InterBusiness;
use common\models\output\Response;

/**
 * Description of UserBusiness
 *
 * @author CANH
 */
class UserBusiness implements InterBusiness {
    public static function get($id) {
         $item = User::findOne($id);
        return $item;
    }

    public static function mGet($ids) {
        return User::find()->andWhere(["id" => $ids])->all();
    }
    
    public static function getToKey($ids){
        $users = User::find()->andWhere(["id" => $ids])->all();
        if ($users == null || empty($users)) {
            return $users;
        }
        $result = [];
        foreach($users as $user){
            $result[$user->id] = $user;
        }
        return $result;
    }

//put your code here
}
