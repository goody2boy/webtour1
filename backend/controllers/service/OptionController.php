<?php

namespace backend\controllers\service;

use backend\models\MetaIndexForm;
use backend\models\OptionForm;
use common\models\business\BannerBusiness;
use common\models\business\MetaIndexBusiness;
use common\models\business\OptionBusiness;
use common\models\db\Option;
use common\models\input\OptionSearch;
use common\models\output\Response;
use Yii;

class OptionController extends ServiceController {

    public function init() {
        parent::init();
        $this->controller = Option::getTableSchema()->name;
    }

    /**
     * Danh sách banner
     */
    public function actionGrid() {
        if (is_object($resp = $this->can("grid"))) {
            return $this->response($resp);
        }
        $search = new OptionSearch();
        $search->setAttributes(Yii::$app->request->get());
        return $this->response(new Response(true, "Lấy dữ liệu thành công", $search->search(true)));
    }

    /**
     * Thay đổi trạng thái banner
     */
    public function actionChangeactive() {
        if (is_object($resp = $this->can("changeactive"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        return $this->response(OptionBusiness::changeActive($id));
    }

    /**
     * Xóa banner theo id truyền vào
     */
    public function actionRemove() {
        if (is_object($resp = $this->can("remove"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        return $this->response(OptionBusiness::remove($id));
    }

    /**
     * Xóa banner theo id truyền vào
     */
    public function actionAdd() {
        if (is_object($resp = $this->can("add"))) {
            return $this->response($resp);
        }
        $form = new OptionForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->save());
    }

    /**
     * Get Banner
     */
    public function actionGet() {
        if (is_object($resp = $this->can("get"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        return $this->response(new Response(true, "Lấy dữ liệu thành công", OptionBusiness::get($id)));
    }

}
