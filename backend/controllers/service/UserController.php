<?php

namespace backend\controllers\service;

use common\models\business\UserBusiness;
use common\models\db\User;
use common\models\input\UserSearch;
use common\models\output\Response;
use Yii;

class UserController extends ServiceController {

    public function init() {
        parent::init();
        $this->controller = User::getTableSchema()->name;
    }

    /**
     * Search admin
     */
    public function actionGrid() {
        if (is_object($resp = $this->can("grid"))) {
            return $this->response($resp);
        }
        $search = new UserSearch();
        $search->setAttributes(Yii::$app->request->get());
        return $this->response(new Response(true, "Danh sách người dùng", $search->search(true)));
    }

    /**
     * Change active
     * @return type
     */
    public function actionChangeactive() {
        if (is_object($resp = $this->can("changeactive"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        return $this->response(UserBusiness::changeActive($id));
    }
    public function actionGet() {
        if (is_object($resp = $this->can("get"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        return $this->response(new Response(true,"",UserBusiness::get($id,true)));
    }
    public function actionGetall(){
        if (is_object($resp = $this->can("getall"))) {
            return $this->response($resp);
        }
        return $this->response(new Response(true,"",UserBusiness::getAll()));
    }

}
