<?php

namespace backend\controllers\service;

use backend\models\TourForm;
use backend\models\OrderForm;
use common\models\business\TourBusiness;
use common\models\business\CategoryTourBusiness;
use common\models\business\PriceBusiness;
use common\models\business\ImageBusiness;
use common\models\business\OrderBusiness;
use common\models\db\Tour;
use common\models\db\Order;
use common\models\enu\ImageType;
use common\models\input\TourSearch;
use common\models\input\OrderSearch;
use common\models\output\Response;
use Yii;

/**
 * Description of TourController
 *
 * @author CANH
 */
class OrderController extends ServiceController {

    //put your code here
    public function init() {
        parent::init();
        $this->controller = Order::getTableSchema()->name;
    }

    /**
     * Search admin
     */
    public function actionGrid() {
        if (is_object($resp = $this->can("grid"))) {
            return $this->response($resp);
        }
        $search = new OrderSearch();
        $search->setAttributes(Yii::$app->request->get());
        return $this->response(new Response(true, "Danh sách tour", $search->search(true)));
    }

    public function actionGet() {
        if (is_object($resp = $this->can("get"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        $order = OrderBusiness::get($id);
        return $this->response(new Response(true, "", $order));
    }

    public function actionChangeActive($id) {
        if (is_object($resp = $this->can("changeActive"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        return $this->response(TourBusiness::changeActive($id));
    }

    public function actionRemove($id) {
        if (is_object($resp = $this->can("remove"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        return $this->response(OrderBusiness::remove($id));
    }
    
    public function actionEdit() {
        if (is_object($resp = $this->can("add"))) {
            return $this->response($resp);
        }
       $form = new OrderForm();
       $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->save());
    }
    
    
    public function actionAddImage($tourId, $url){
        
    }
    
    public function actionGetPrice($id){
        if (is_object($resp = $this->can("get-price"))) {
            return $this->response($resp);
        }
        $search = new OrderSearch();
        $search->id = $id;
        $order = $search->search(true)->data[0];
        $prices = $order->price;
        return $this->response(new Response(true, "Giá tour", $prices));
    }

}
