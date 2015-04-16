<?php

namespace frontend\controllers;

use common\models\business\NewsBusiness;
use common\models\input\NewsSearch;
use Yii;

class NewsController extends BaseController {

    public function actionIndex() {

        $search = new NewsSearch();
        $search->setAttributes(Yii::$app->request->get());

        if ($search->pageSize == "" || $search->pageSize == null) {
            $search->pageSize = 3;
        }

        if ($search->page == "" || $search->page == null) {
            $search->page = 1;
        }
        $search->active = 1;
        $dataPage = $search->search(true);

        $this->var['menuactive'] = Yii::$app->request->absoluteUrl;
        return $this->render("index", [
                    'dataPage' => $dataPage,
        ]);
    }

    public function actionDetail() {
        $alias = Yii::$app->request->get('alias');
        $detail = NewsBusiness::getByAlias($alias);
        if (empty($detail)) {
            return $this->render('//error/message', ['message' => "Service không tồn tại", 'title' => "404 NOT FOUND"]);
        }
        $detail->viewCount = $detail->viewCount + 1;
        $detail->save(false);

        $news = NewsBusiness::getAll(5, 1, 1);
        $this->var['menuactive'] = Yii::$app->request->absoluteUrl;
        // config meta

        return $this->render("detail", [
                    'detail' => $detail,
                    'news' => $news,
        ]);
    }

}
