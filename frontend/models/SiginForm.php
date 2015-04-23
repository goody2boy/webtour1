<?php
namespace frontend\models;

use common\models\business\UserBusiness;
use common\models\output\Response;
use Yii;
use yii\base\Model;


class SiginForm extends Model {

    public $account;
    public $password;

    public function rules() {
        return [
            [['account', 'password'], 'required'],
        ];
    }

    /**
     * Đăng nhập
     * @return Response
     */
    public function signin() {
        if (!$this->validate()) {
            return new Response(false, "Account and password cannot is blank", $this->errors);
        }
        $user = UserBusiness::getByLogin($this->account, $this->password);
        if (empty($user)) {
            return new Response(false, "Account or password incorect !", $this->errors);
        }
        Yii::$app->getSession()->set("customer", $user);
        return new Response(true, "Sign successful", $user);
    }

}
