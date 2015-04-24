<?php

namespace frontend\controllers\service;

use common\models\business\OrderBusiness;
use common\models\business\PromotionBusiness;
use common\models\input\TourSearch;
use common\models\input\OrderSearch;
use common\models\output\Response;
use frontend\models\OrderForm;
use frontend\models\CheckoutForm;
use common\models\enu\PaymentType;
use common\models\enu\StatusPayment;
use common\util\TextUtils;
use stdClass;
use Yii;

class OrderController extends ServiceController {

    public function actionCheckout($orderId, $promoCode, $method) {
        $user = Yii::$app->getSession()->get("customer");
        if ($user == null) {
            return $this->response(new Response(false, "Bạn chưa đăng nhập", 'NO_LOGIN'));
        }
        //
        $method_payment = "";
        switch ($method) {
            case 0: $method_payment = PaymentType::PAYPAL;
                break;
            case 1: $method_payment = PaymentType::MASTER_CARD;
                break;
            case 2: $method_payment = PaymentType::LATER;
                break;
            default : $method_payment = PaymentType::LATER;
                break;
        }
        //
        if ($promoCode != null && $promoCode != "") {
            $promo = PromotionBusiness::getBycode($promoCode);
            if ($promo != null && sizeof($promo) > 0) {
                if ($promo[0]->user_id != $user->id) {
                    return $this->response(new Response(false, "Mã promotion này không thuộc về bạn.", $promo));
                }
            } else {
                return $this->response(new Response(false, "Mã promotion này không hợp lệ.", $code));
            }
        }
        //
        $search = new OrderSearch();
        $search->id = $orderId;
        $search->user_id = $user->id;
        $result = $search->search(true)->data;
        $order = null;
        if (sizeof($result) > 0) {
            $order = new CheckoutForm();
            $order->id = $orderId;
            if ($promoCode != null && $promoCode != "") {
                $order->promo_code = $promoCode;
            }
            $order->status_payment = StatusPayment::DONE;
            $order->payment_method = $method_payment;
            return $this->response($order->save());
//            return $this->response(new Response(true, "Checkout thành công.", $order));
        } else {
            return $this->response(new Response(false, "Không tồn tại order này.", $orderId));
        }
    }

    public function actionSubmitorder($tourId, $numAdult, $numChild, $numNoChild, $date) {

        // get price_id by num and tour_id 
        $search = new TourSearch();
        $search->id = $tourId;
        $search->status = 1;
        $result = $search->search(true)->data;
        if ($result == null) {
            return $this->response(new Response(false, "Tour không tồn tại", $tourId));
        }
        $tour = $result[0];
        $price_id = '';
        $price_unit = '';
        if ($tour != null) {
            foreach ($tour->prices as $price) {
                if ($price->name == $numAdult) {
                    $price_id = $price->id;
                    $price_unit = $price->price;
                }
            }
        }
        //
        $order = new OrderForm();
        $order->tour_id = $tourId;
        $order->number_adult = $numAdult;
        $order->number_child = $numChild;
        $order->number_nochild = $numNoChild;
        $order->date_departure = $date * 1000;
        $order->price_id = $price_id;
        $order->total_price = ($order->number_adult + $order->number_child * 70 / 100) * $price_unit;
        // check user login
        $user = Yii::$app->getSession()->get("customer");
        if ($user == null) {
            Yii::$app->getSession()->set("order", $order);
            return $this->response(new Response(false, "Bạn chưa đăng nhập", 'NO_LOGIN'));
        } else {
            $order->user_id = $user->id;
        }
        return $this->response($order->save());

        // save tour order
    }

    public function actionSave() {
        $form = new OrderForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->save());
    }

    public function actionCalculatePrice($tourId, $numAdult) {
        $search = new TourSearch();
        $search->id = $tourId;
        $search->status = 1;
        $result = $search->search(true)->data;
        if ($result == null) {
            return $this->response(new Response(false, "Tour không tồn tại", $tourId));
        }
        $tour = $result[0];
        if ($tour != null) {
            foreach ($tour->prices as $price) {
                if ($price->name == $numAdult) {
                    return $this->response(new Response(true, "Success", $price->price));
                }
            }
        }
        return $this->response(new Response(false, "Không tính được phí do Admin chưa cấu hình!", $tourId));
    }

    public function actionGetPromotion() {
        $user = Yii::$app->getSession()->get("customer");
        $post = Yii::$app->request->post();
        $code = $post['code'];
        $orderId = $post['orderId'];
        $search = new OrderSearch();
        $search->id = $orderId;
        $search->user_id = $user->id;
        $result = $search->search(true)->data;
        if (sizeof($result) > 0) {
            $order = $result[0];
        } else {
            return $this->response(new Response(false, "Không tồn tại order này.", $orderId));
        }
        $promo = PromotionBusiness::getBycode($code);
        if ($promo != null && sizeof($promo) > 0) {
            if ($promo[0]->user_id != $user->id) {
                return $this->response(new Response(false, "Mã promotion này không thuộc về bạn.", $promo));
            }
        } else {
            return $this->response(new Response(false, "Mã promotion này không hợp lệ.", $code));
        }
        $promo_price = 0;
        if ($promo[0]->discount_price > 0) {
            $promo_price = $order->total_price - $promo[0]->discount_price;
        } else if ($promo[0]->discount_percent > 0) {
            $promo_price = $order->total_price * $promo[0]->discount_percent / 100;
        }
        return $this->response(new Response(true, "Get Promotion thanh cong", $promo_price));
    }

}
