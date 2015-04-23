<?php

namespace frontend\controllers\service;

use frontend\models\ChangePassForm;
use frontend\models\ForgotForm;
use frontend\models\ProfileForm;
use frontend\models\RegisterForm;
use frontend\models\SiginForm;
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
        $form = new SiginForm();
        $form->setAttributes(\Yii::$app->request->getBodyParams());
        return $this->response($form->signin());
    }
    public function actionForgot() {
        $form = new ForgotForm();
        $form->setAttributes(\Yii::$app->request->getBodyParams());
        return $this->response($form->forgot());
    }

}
