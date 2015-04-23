<?php

namespace frontend\models;

use common\models\business\EmailBusiness;
use common\models\business\UserBusiness;
use common\models\output\Response;
use Yii;
use yii\base\Model;

class ForgotForm extends Model {

    public $email;

    public function rules() {
        return [
            ['email', 'required'],
            ['email', 'email'],
        ];
    }

    /**
     * Đăng nhập
     * @return Response
     */
    public function forgot() {
        if (!$this->validate()) {
            return new Response(false, "Incorrect data", $this->errors);
        }
        $user = UserBusiness::getByEmail($this->email);
        if (empty($user)) {
            return new Response(false, "Email not exists", $user);
        }
        $newpass = Yii::$app->security->generateRandomString(8);
        $user->password = md5($newpass);
        if (!$user->save(false)) {
            return new Response(false, "Cannot reset password", $user->errors);
        }
        EmailBusiness::send($this->email, "[ ] Reset mật khẩu", "forgot", ['password' => $newpass, 'user' => $user]);
        return new Response(true, "Reset password success, please check your email", $user);
    }

}
