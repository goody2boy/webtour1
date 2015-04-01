<?php

namespace frontend\controllers\service;

use common\models\business\OrderBusiness;
use common\models\output\Response;
use frontend\models\OrderForm;
use stdClass;
use Yii;

class OrderController extends ServiceController {

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

}
