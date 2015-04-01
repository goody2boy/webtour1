<?php

namespace backend\controllers\service;

use backend\models\ItemForm;
use backend\models\MetaItemForm;
use common\models\business\ItemBusiness;
use common\models\business\MetaItemBusiness;
use common\models\db\Item;
use common\models\input\ItemSearch;
use common\models\output\Response;
use Yii;

class ItemController extends ServiceController {

    public function init() {
        parent::init();
        $this->controller = Item::getTableSchema()->name;
    }

    /**
     * Search admin
     */
    public function actionGrid() {
        if (is_object($resp = $this->can("grid"))) {
            return $this->response($resp);
        }
        $search = new ItemSearch();
        $search->setAttributes(Yii::$app->request->get());
        return $this->response(new Response(true, "Danh sách item", $search->search(true)));
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
        return $this->response(ItemBusiness::changeActive($id));
    }

    public function actionChangeposition() {
        if (is_object($resp = $this->can("changeposition"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get("id");
        $position = Yii::$app->request->get("position");
        return ItemBusiness::changePosition($id, $position);
    }

    /**
     * 
     * @return type
     */
    public function actionChange() {
        if (is_object($resp = $this->can("change"))) {
            return $this->response($resp);
        }
        $form = new ItemForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->save());
    }

    /**
     * 
     * @return type
     */
    public function actionContent() {
        if (is_object($resp = $this->can("content"))) {
            return $this->response($resp);
        }
        $form = new ItemForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->content());
    }

    /**
     * 
     * @return type
     */
    public function actionAbout() {
        if (is_object($resp = $this->can("about"))) {
            return $this->response($resp);
        }
        $form = new ItemForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->about());
    }

    /**
     * 
     * @return type
     */
    public function actionProperty() {
        if (is_object($resp = $this->can("property"))) {
            return $this->response($resp);
        }
        $form = new ItemForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->property());
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
        return ItemBusiness::remove($id);
    }

    public function actionGet() {
        if (is_object($resp = $this->can("get"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        $item = ItemBusiness::get($id);
        return $this->response(new Response(true, "", $item));
    }

    public function actionConfig() {
        if (is_object($resp = $this->can("config"))) {
            return $this->response($resp);
        }
        $metaitem = new MetaItemForm();
        $metaitem->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($metaitem->save());
    }

    public function actionGetmetaitem() {
        if (is_object($resp = $this->can("getmetaitem"))) {
            return $this->response($resp);
        }

        $id = Yii::$app->request->get('id');
        $metaitem = MetaItemBusiness::get($id);
        if (empty($metaitem)) {
            return $this->response(new Response(true, ''));
        }
        return $this->response(new Response(true, '', $metaitem));
    }

}
