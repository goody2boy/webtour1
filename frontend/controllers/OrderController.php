<?php

namespace frontend\controllers;

use common\models\business\OrderBusiness;
use common\models\input\OrderSearch;
use common\models\enu\StatusPayment;
use Yii;

class OrderController extends BaseController {

    public function actionCheckout() {
        $user = Yii::$app->getSession()->get("customer");
        if ($user == null) {
            return $this->redirect($this->baseUrl . 'user/login', 302);
        }
        $userId = $user->id;
        $search = new OrderSearch();
        $search->user_id = $userId;
        $search->status_payment = StatusPayment::EVER;
        $orders = $search->search(true);
        return $this->render('checkout', [
                    'orders' => $orders,
                    'user' => $user,
                        ]
        );
    }

}
