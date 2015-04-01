<?php

namespace frontend\controllers;

use common\models\business\ItemBusiness;
use common\models\business\MetaIndexBusiness;
use common\models\business\MetaItemBusiness;
use common\models\input\ItemSearch;
use common\util\UrlUtils;
use Yii;

class ItemController extends BaseController {

    public function actionIndex() {

        $search = new ItemSearch();
        $search->setAttributes(Yii::$app->request->get());

        if ($search->pageSize == "" || $search->pageSize == null) {
            $search->pageSize = 10;
        }

        if ($search->page == "" || $search->page == null) {
            $search->page = 1;
        }
        $search->active = 1;
        $dataPage = $search->search(true);
                // config meta
        $meta = MetaIndexBusiness::get(2);
        if (!empty($meta)) {
            $this->meta($meta->title, $meta->description, $this->baseUrl, null, $meta->keyword);
        }
        // end còn
        $this->var['menuactive'] =Yii::$app->request->absoluteUrl;
        return $this->render("index", [
                    'dataPage' => $dataPage->data,
        ]);
    }

    public function actionDetail() {
        $id = \Yii::$app->request->get('id');
        $item = ItemBusiness::getWithImage($id);
        $search = new ItemSearch();
        $search->setAttributes(Yii::$app->request->get());

        if ($search->pageSize == "" || $search->pageSize == null) {
            $search->pageSize = 4;
        }

        if ($search->page == "" || $search->page == null) {
            $search->page = 1;
        }
        $search->active = 1;
        $items = $search->search(true)->data;
        $meta = MetaItemBusiness::get($item->id);
        if (!empty($meta)) {
            $this->meta($meta->title, $meta->description, $this->baseUrl . UrlUtils::item($item->name, $item->id), !empty($item->images) ? $item->images[0] : null, $meta->keyword);
        }
        return $this->render("detail", [
                    'items' => $items,
                    'detail' => $item
        ]);
    }

}
