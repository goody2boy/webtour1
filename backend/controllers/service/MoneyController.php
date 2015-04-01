<?php
namespace backend\controllers\service;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use common\models\db\Money;
use common\models\output\Response;
use common\models\input\MoneySearch;
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
    
    public function actionGet() {
        if (is_object($resp = $this->can("grid"))) {
            return $this->response($resp);
        }

//        $image = new ImageSearch();
//        $image->setAttributes(\Yii::$app->request->get());
        $abcd = ['abcd','abcd'];
        return $this->response(new Response(true, "List Images", $abcd));
    }
}
