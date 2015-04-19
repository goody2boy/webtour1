<?php

namespace frontend\controllers;

use common\models\business\CityBusiness;
use common\models\business\CountryBusiness;
use common\models\business\OrderBusiness;
use Yii;

class UserController extends BaseController {

    public function actionRegister() {
        $countries = CountryBusiness::getAll();
        $cities = CityBusiness::getAll();
        $ct = array();
        foreach ($cities as $c) {
            $ct[] = $c->getAttributes();
        }
        $this->var['breadcrumb'] = [['name' => 'Register', 'link' => '']];
        $this->staticClient = "var cities=" . json_encode($ct) . "; user.init()";
        return $this->render("register", [
                    'countries' => $countries
        ]);
    }

    public function actionLogin() {
        if (!empty(Yii::$app->getSession()->get("customer"))) {
            return $this->redirect($this->baseUrl);
        }
        $this->var['breadcrumb'] = [['name' => 'Login', 'link' => '']];
        return $this->render("login", [
        ]);
    }

    public function actionProfile() {
        $account = Yii::$app->getSession()->get("customer");
        if (empty($account)) {
            return $this->render(
                            '//error/message', [
                        'message' => "Vui lòng đăng nhập để truy cập vào trang này",
                        'title' => "Người dùng chưa đăng nhập"
            ]);
        }
        $countries = CountryBusiness::getAll();
        $cities = CityBusiness::getAll();
        $ct = array();
        foreach ($cities as $c) {
            $ct[] = $c->getAttributes();
        }
        $this->var['breadcrumb'] = [['name' => $account->firstName . " " . $account->lastName, 'link' => ''], ['name' => "Profile", 'link' => '']];
        $this->staticClient = "var cities=" . json_encode($ct) . ";var cityId=" . $account->cityId . "; user.init()";
        return $this->render("profile", [
                    'user' => $account,
                    'countries' => $countries
        ]);
    }

    public function actionChangepassword() {
        $account = Yii::$app->getSession()->get("customer");
        if (empty($account)) {
            return $this->render(
                            '//error/message', [
                        'message' => "Vui lòng đăng nhập để truy cập vào trang này",
                        'title' => "Người dùng chưa đăng nhập"
            ]);
        }
        $this->var['breadcrumb'] = [['name' => $account->firstName . " " . $account->lastName, 'link' => ''], ['name' => "Change password", 'link' => '']];
        return $this->render("changepassword", [
        ]);
    }

    public function actionBooking() {
        $account = Yii::$app->getSession()->get("customer");
        if (empty($account)) {
            return $this->render(
                            '//error/message', [
                        'message' => "Vui lòng đăng nhập để truy cập vào trang này",
                        'title' => "Người dùng chưa đăng nhập"
            ]);
        }
        $order = OrderBusiness::getOrderByUser($account->id);
        $this->var['breadcrumb'] = [['name' => $account->firstName . " " . $account->lastName, 'link' => ''], ['name' => "My booking", 'link' => '']];
        return $this->render("booking", [
                    'order' => $order
        ]);
    }

    public function actionLogout() {
        Yii::$app->getSession()->set("customer", null);
        return $this->redirect($this->baseUrl);
    }

    public function actionForgot() {
        $this->var['breadcrumb'] = [['name' => 'Forgot Password', 'link' => '']];
        return $this->render("forgot", [
        ]);
    }

}
