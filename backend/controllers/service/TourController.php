<?php

namespace backend\controllers\service;

use backend\models\TourForm;
use common\models\business\TourBusiness;
use common\models\db\Tour;
use common\models\input\TourSearch;
use common\models\output\Response;
use Yii;

/**
 * Description of TourController
 *
 * @author CANH
 */
class TourController extends ServiceController {

    //put your code here
    public function init() {
        parent::init();
        $this->controller = Tour::getTableSchema()->name;
    }

    /**
     * Search admin
     */
    public function actionGrid() {
        if (is_object($resp = $this->can("grid"))) {
            return $this->response($resp);
        }
        $search = new TourSearch();
        $search->setAttributes(Yii::$app->request->get());
        // 
        return $this->response(new Response(true, "Danh sách tour", $search->search(true)));
    }

    public function actionGet() {
        if (is_object($resp = $this->can("get"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        $partners = PartnersBusiness::get($id);
        return $this->response(new Response(true, "", $partners));
    }

}
