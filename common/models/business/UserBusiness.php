<?php

namespace common\models\business;

use common\models\db\User;
use common\models\output\Response;

class UserBusiness {

    /**
     * Chi tiết 1 banner
     * @param type $id
     */
    public static function get($id, $flag = false) {
        $user = User::findOne($id);
        if ($flag) {
            $city = CityBusiness::get($user->cityId);
            $country = CountryBusiness::get($user->countryId);
            $user->cityName = $city->name;
            $user->countryName = $country->name;
        }
        return $user;
    }

    public static function getByUsername($username) {
        $username = trim($username);
        return User::find()->andWhere(['=', 'username', $username])->one();
    }

    public static function getByEmail($email) {
        $email = trim($email);
        return User::find()->andWhere(['=', 'email', $email])->one();
    }

    /**
     * Thay đổi trạng thái banner
     * @param type $id
     */
    public static function changeActive($id) {
        $user = self::get($id);
        if ($user == null) {
            return new Response(false, "Người dùng không tồn tại trên hệ thống");
        }
        $user->active = $user->active == 1 ? 0 : 1;
        $user->save(false);
        return new Response(true, "Người dùng " . $user->active ? "đã mở khóa" : "đã khóa", $user);
    }

}
