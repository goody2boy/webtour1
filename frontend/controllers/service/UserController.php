<?php

namespace frontend\controllers\service;

use common\models\business\UserBusiness;
use common\models\output\Response;
use frontend\models\ChangePassForm;
use frontend\models\ProfileForm;
use frontend\models\RegisterForm;
use Yii;

class UserController extends ServiceController {

    public function actionRegister() {
        $form = new RegisterForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->register());
    }

    public function actionProfile() {
        $form = new ProfileForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->change());
    }
    public function actionChangepassword() {
        $form = new ChangePassForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->change());
    }

    public function actionLogin() {
        $account = Yii::$app->request->post('account');
        $pass = Yii::$app->request->post('pass');
        $user = UserBusiness::getByLogin($account);
        if (empty($user)) {
            return $this->response(new Response(false, "Account not exists", []));
        }
        if ($user->password != md5($pass)) {
            return $this->response(new Response(false, "Password incorect", []));
        }
        Yii::$app->getSession()->set("customer", $user);
        return $this->response(new Response(true, "Login success", []));
    }

}
