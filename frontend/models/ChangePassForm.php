<?php

namespace frontend\models;

use common\models\business\UserBusiness;
use common\models\db\User;
use common\models\output\Response;
use yii\base\Model;

class ChangePassForm extends Model {

    public $id;
    public $password;
    public $newpassword;
    public $repassword;

    public function rules() {
        return [
            [['password', 'newpassword', 'repassword'], 'required'],
            [['id'], 'number'],
            ['repassword', 'compare', 'compareAttribute' => 'newpassword', 'message' => "Passwords don't match"],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
        ];
    }

    public function change() {
        if (!$this->validate()) {
            return new Response(false, 'Incorrect Data', $this->errors);
        }
        $user = UserBusiness::get($this->id);
        if (empty($user)) {
            return new Response(false, 'Account not found', []);
        }
        if (md5($this->password) != $user->password) {
            return new Response(false, 'Current password incorect', []);
        }
        $user->password = $this->newpassword;
        if (!$user->save(false)) {
            return new Response(false, "Sava fail", $user->errors);
        }
        return new Response(true, "Change password success", $user);
    }

}
