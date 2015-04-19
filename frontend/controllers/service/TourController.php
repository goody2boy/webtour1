<?php

namespace frontend\controllers\service;

use common\models\input\TourSearch;
use common\models\output\Response;
use Yii;

/**
 * Description of TourController
 *
 * @author CANH
 */
class TourController extends ServiceController {

    public function actionGetTourImg() {
        $post = Yii::$app->request->post();
        $id = $post['id'];
        $search = new TourSearch();
        $search->id = $id;
        $search->status = 1;
        $result = $search->search(true)->data;
        if ($result == null) {
            return $this->response(new Response(false, "Tour không tồn tại", $tourId));
        }
        $tour = $result[0];
        return $this->response(new Response(true, "Get thành công thông tin Tour", $tour));
    }

}
