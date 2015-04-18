<?php

namespace frontend\controllers;

use common\models\business\OrderBusiness;
use common\models\input\OrderSearch;
use Yii;

class OrderController extends BaseController {

    public function actionCheckout() {
        $userId = "1"; //Yii::user->id;
        $search = new OrderSearch();
        $search->user_id = $userId;
        $orders = $search->search(true);
        return $this->render('checkout'
                , ['orders' => $orders,
                ]
        );
    }

}
