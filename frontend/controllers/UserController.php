<?php

namespace frontend\controllers;

use common\models\business\CityBusiness;
use common\models\business\CountryBusiness;
use Yii;

class UserController extends BaseController {

    public function actionRegister() {
        $countries = CountryBusiness::getAll();
        $cities = CityBusiness::getAll();
        $ct = array();
        foreach ($cities as $c) {
            $ct[] = $c->getAttributes();
        }
        $this->staticClient = "var cities=" . json_encode($ct) . "; user.init()";
        return $this->render("register", [
                    'countries' => $countries
        ]);
    }

    public function actionLogin() {
        if (!empty(Yii::$app->getSession()->get("customer"))) {
            return $this->redirect($this->baseUrl);
        }
        return $this->render("login", [
        ]);
    }

    public function actionForgot() {
        return $this->render("forgot", [
        ]);
    }

}
