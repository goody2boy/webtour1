<?php

namespace frontend\controllers;

use common\models\business\OrderBusiness;
use common\models\input\ItemSearch;
use Yii;

class OrderController extends BaseController {

    public function actions() {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
            ],
        ];
    }

    /**
     * Trang chủ backend
     * @return type
     */
    public function actionCheckout() {
        $id = Yii::$app->request->get('id');
        if (OrderBusiness::isJson($id)) {
            $arr = \GuzzleHttp\json_decode($id)->id;
            $search = new ItemSearch();
            $search->ids = $arr;
            $data = $search->search(true);
        } else {
            $data = null;
        }
        $items = new ItemSearch();
        return $this->render('checkout', [
                    'items' => $items->search(false)->all(),
                    'data' => $data
        ]);
    }

}
