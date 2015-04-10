<?php

namespace frontend\controllers;

class IndexController extends BaseController {

    /**
     * Trang chủ backend
     * @return type
     */
    public function actionIndex() {
       
        return $this->render('index', [
        ]);
    }

    public function actionPhp() {
        phpinfo();
    }

}
