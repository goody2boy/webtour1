<?php

namespace frontend\controllers;

use common\models\input\NewsSearch;

class ErrorController extends BaseController {

    public function actions() {
        return [
            'action' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function action404() {
        echo "404";
    }

    public function actionTest() {
        $search = new NewsSearch();
        $search->categoryIds = [36,39];
        print_r($search->search(true));
    }

}
