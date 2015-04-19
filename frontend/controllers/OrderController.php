<?php

namespace frontend\controllers;

use common\models\business\OrderBusiness;
use common\models\input\OrderSearch;
use Yii;

class OrderController extends BaseController {

    public function actionCheckout() {
        $user = Yii::$app->getSession()->get("customer");
        if ($user == null) {
            return $this->render('checkoutnologin'
                            , ['orders' => $orders,
                            ]
            );
        }
        $userId = $user->id;
        $search = new OrderSearch();
        $search->user_id = $userId;
        $orders = $search->search(true);
        return $this->render('checkout'
                        , ['orders' => $orders,
                        ]
        );
    }

}
