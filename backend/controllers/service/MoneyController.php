<?php
namespace backend\controllers\service;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use common\models\db\Money;
use common\models\output\Response;
use common\models\business\MoneyBusiness;
use common\models\input\MoneySearch;
use backend\models\MoneyForm;
use Yii;
/**
 * Description of MoneyController
 *
 * @author CANH
 */
class MoneyController extends ServiceController {
    //put your code here
    
     public function init() {
        parent::init();
        $this->controller = Money::getTableSchema()->name;
    }

    /**
     * 
     * @return type
     */
    public function actionGrid() {
        if (is_object($resp = $this->can("grid"))) {
            return $this->response($resp);
        }
        $search = new MoneySearch();
        $search->setAttributes(Yii::$app->request->get());
        return $this->response(new Response(true, "List Moneys", $search->search(true)));
    }
    
    public function actionRemove($id){
        if (is_object($resp = $this->can("remove"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        return $this->response(MoneyBusiness::remove($id));
    }
    
    public function actionChangeActive($id){
        if (is_object($resp = $this->can("changeActive"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        return $this->response(MoneyBusiness::changeActive($id));
    }
    
    public function actionGet() {
        if (is_object($resp = $this->can("get"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        return $this->response(new Response(true, "Lấy dữ liệu thành công", MoneyBusiness::get($id)));
    }
    
    public function actionAdd() {
        if (is_object($resp = $this->can("add"))) {
            return $this->response($resp);
        }
        $form = new MoneyForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->save());
    }
}
