<?php

namespace frontend\controllers\service;

use common\models\business\OrderBusiness;
use common\models\input\TourSearch;
use common\models\output\Response;
use frontend\models\OrderForm;
use stdClass;
use Yii;

class OrderController extends ServiceController {

    public function actionSubmitorder($tourId, $numAdult, $numChild, $numNoChild, $date) {
        // check user login
        $userId = Yii::$app->user->getId();
//        if ($userId == null || $userId == "") {
//            return $this->redirect('/user/login', 302);
//        }
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
        $order->date_departure = $date;
        $order->price_id = $price_id;
        $order->total_price = ($order->number_adult + $order->number_child * 70 / 100) * $price_unit;
        return $this->response($order->save());

        // save tour order
    }

    public function actionAdditem() {
        $id = urldecode(Yii::$app->request->get('id'));
        $itemId = Yii::$app->request->get('itemId');
        if (OrderBusiness::isJson($id)) {
            $newid = \GuzzleHttp\json_decode($id)->id;
            if (is_numeric($itemId)) {
                if (!in_array($itemId, $newid)) {
                    array_push($newid, $itemId);
                }
                $std = new stdClass();
                $std->id = $newid;
                $id = json_encode($std);
            }
        } else {
            if (is_numeric($itemId)) {
                $std = new stdClass();
                $std->id = [$itemId];
                $id = json_encode($std);
            }
        }
        return $this->response(new Response(true, "ok", $id));
    }

    public function actionDeleteitem() {
        $id = urldecode(Yii::$app->request->get('id'));
        $itemId = Yii::$app->request->get('itemId');
        if (OrderBusiness::isJson($id)) {
            $newid = \GuzzleHttp\json_decode($id)->id;
            if (is_numeric($itemId)) {
                if (($key = array_search($itemId, $newid)) !== false) {
                    array_splice($newid, $key, 1);
                }
                if (!empty($newid)) {
                    $std = new stdClass();
                    $std->id = $newid;
                    $id = json_encode($std);
                } else {
                    $id = '';
                }
            }
        } else {
            $id = '';
        }
        return $this->response(new Response(true, "ok", $id));
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

}
