<?php

namespace backend\controllers\service;

use backend\models\MenuForm;
use common\models\business\MenuBusiness;
use common\models\db\Menu;
use common\models\output\Response;
use Yii;

class MenuController extends ServiceController {

    public function init() {
        parent::init();
        $this->controller = Menu::getTableSchema()->name;
    }

    /**
     * Search admin
     */
    public function actionGrid() {
        if (is_object($resp = $this->can("grid"))) {
            return $this->response($resp);
        }
        return $this->response(new Response(true, "List Menu", MenuBusiness::getGrid()));
    }

    /**
     * 
     * @return type
     */
    public function actionChange() {
        if (is_object($resp = $this->can("change"))) {
            return $this->response($resp);
        }
        $form = new MenuForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->save());
    }

    /**
     * Xóa menu, danh mục có chứa menu con thì đéo được xóa
     * @return type
     */
    public function actionRemove() {
        if (is_object($resp = $this->can("remove"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get("id");
        return MenuBusiness::remove($id);
    }

    /**
     * Detail menu
     * @return type
     */
    public function actionGet() {
        if (is_object($resp = $this->can("get"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get("id");
        return $this->response(new Response(true, "Detail menu", MenuBusiness::get($id)));
    }

}
