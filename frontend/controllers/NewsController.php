<?php

namespace frontend\controllers;

use common\models\business\BannerBusiness;
use common\models\business\MetaCategoryBusiness;
use common\models\business\MetaIndexBusiness;
use common\models\business\MetaNewsBusiness;
use common\models\business\NewsBusiness;
use common\models\business\NewsCategoryBusiness;
use common\models\enu\BannerType;
use common\models\input\ItemSearch;
use common\models\input\NewsSearch;
use common\util\UrlUtils;
use Yii;

class NewsController extends BaseController {

    public function actionIndex() {

        $search = new NewsSearch();
        $search->setAttributes(Yii::$app->request->get());

        if ($search->pageSize == "" || $search->pageSize == null) {
            $search->pageSize = 8;
        }

        if ($search->page == "" || $search->page == null) {
            $search->page = 1;
        }
        $search->active = 1;
        $dataPage = $search->search(true);
        $category = NewsCategoryBusiness::getAll(true);
        //
        $item = new ItemSearch();
        $item->setAttributes(Yii::$app->request->get());

        if ($item->pageSize == "" || $item->pageSize == null) {
            $item->pageSize = 4;
        }

        if ($item->page == "" || $item->page == null) {
            $item->page = 1;
        }
        $item->active = 1;
        $items = $item->search(true);
        // config meta
        $meta = MetaIndexBusiness::get(3);
        if (!empty($meta)) {
            $this->meta($meta->title, $meta->description, $this->baseUrl, null, $meta->keyword);
        }
        // end còn
        $this->var['menuactive'] = Yii::$app->request->absoluteUrl;
        return $this->render("category", [
                    'dataPage' => $dataPage,
                    'categorys' => $category,
                    'items' => $items,
                    'right' => BannerBusiness::getByType(BannerType::RIGHT, 1),
        ]);
    }

    public function actionBrowse() {
        $search = new NewsSearch();
        $alias = Yii::$app->request->get('alias');
        $category = NewsCategoryBusiness::getAll(true);
        $catealias = null;
        foreach ($category as $value) {
            if ($value->alias == $alias) {
                $catealias = $value;
                break;
            }
        }
        $search->categoryId = $catealias->id;
        $search->active = 1;
        $cateByParentId = [];
        foreach ($category as $value) {
            if ($value->parentId == $catealias->id) {
                array_push($cateByParentId, $value);
            }
        }
        if (sizeof($cateByParentId) == 0) {
            foreach ($category as $value) {
                if ($value->parentId == $catealias->parentId) {
                    array_push($cateByParentId, $value);
                }
            }
        }
        $search->setAttributes(Yii::$app->request->get());

        if ($search->pageSize == "" || $search->pageSize == null) {
            $search->pageSize = 10;
        }

        if ($search->page == "" || $search->page == null) {
            $search->page = 1;
        }

        $search->active = 1;

        $dataPage = $search->search(true);
        $item = new ItemSearch();
        $item->setAttributes(Yii::$app->request->get());

        if ($item->pageSize == "" || $item->pageSize == null) {
            $item->pageSize = 4;
        }

        if ($item->page == "" || $item->page == null) {
            $item->page = 1;
        }
        $item->active = 1;
        $items = $item->search(true);
        $meta = MetaCategoryBusiness::get($catealias->id);
        if (!empty($meta)) {
            $this->meta($meta->title, $meta->description, $this->baseUrl . UrlUtils::browse($alias), !empty($category->images) ? $item->images[0] : null, $meta->keyword);
        }
        $this->var['menuactive'] = Yii::$app->request->absoluteUrl;
        return $this->render("category", [
                    'dataPage' => $dataPage,
                    'categorys' => $category,
                    'subcate' => $cateByParentId,
                    'items' => $items,
                    'right' => BannerBusiness::getByType(BannerType::RIGHT, 1),
        ]);
    }

    public function actionDetail() {
        $alias = Yii::$app->request->get('alias');
        $detail = NewsBusiness::getByAlias($alias);
        if (empty($detail)) {
            return $this->render('//error/message', ['message' => "Tin tức không tồn tại", 'title' => "404 NOT FOUND"]);
        }
        $detail->viewCount = $detail->viewCount + 1;
        $detail->save(false);
        $category = NewsCategoryBusiness::getAll(true);
        $datasub = [];
        $subcate = [];
        foreach ($category as $value) {
            if ($value->id == $detail->categoryId) {
                array_push($datasub, $value);
            }
        }
        foreach ($category as $value) {
            if ($value->parentId == $datasub[0]->parentId) {
                array_push($subcate, $value);
            }
        }
        $news = NewsBusiness::getAll(5, 1, 1);
        $this->var['menuactive'] = Yii::$app->request->absoluteUrl;
        // config meta
        $meta = MetaNewsBusiness::get($detail->id);
        if (!empty($meta)) {
            $this->meta($meta->title, $meta->description, $this->baseUrl . UrlUtils::news($alias), empty($detail->images) ? null : $detail->images[0], $meta->keyword);
        }
        // end còn
        $item = new ItemSearch();
        $item->setAttributes(Yii::$app->request->get());

        if ($item->pageSize == "" || $item->pageSize == null) {
            $item->pageSize = 4;
        }

        if ($item->page == "" || $item->page == null) {
            $item->page = 1;
        }
        $item->active = 1;
        $items = $item->search(true);
        return $this->render("detail", [
                    'detail' => $detail,
                    'categorys' => $category,
                    'news' => $news,
                    'subcate' => $subcate,
                    'items' => $items,
                    'right' => BannerBusiness::getByType(BannerType::RIGHT, 1),
        ]);
    }

}
