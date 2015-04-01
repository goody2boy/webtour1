<?php

namespace frontend\controllers;

use common\models\business\BannerBusiness;
use common\models\business\MetaIndexBusiness;
use common\models\business\NewsCategoryBusiness;
use common\models\business\VideoBusiness;
use common\models\enu\BannerType;
use common\models\input\ItemSearch;
use common\models\input\NewsSearch;
use common\models\input\PartnersSearch;

class IndexController extends BaseController {

    /**
     * Trang chủ backend
     * @return type
     */
    public function actionIndex() {
        $news = new NewsSearch();
        $news->active = 1;
        $news->nav = 1;
        $news->pageSize = 10;
        $partners = new PartnersSearch();
        $partners->active = 1;
        $partners->pageSize = 10;
        $partners->home = 1;
        $items = new ItemSearch();
        $items->active = 1;
        $items->pageSize = 10;
        $videos = VideoBusiness::getAll(8, 1);
        $category = NewsCategoryBusiness::getAll(1);
        $categoryIds = [];
        $categorynewIds = [];
        foreach ($category as $c) {
            if ($c->tabOne == 1) {
                array_push($categoryIds, $c->id);
            }
            if ($c->tabTwo == 1) {
                array_push($categorynewIds, $c->id);
            }
        }
        $news->categoryIds = $categorynewIds;
        $app = new NewsSearch();
        $app->active = 1;
        $app->nav = 1;
        $app->categoryIds = $categoryIds;
        $app->pageSize = 10;
        $this->var['left'] = 1;
        $heart = BannerBusiness::getByType(BannerType::HEART, 1);
        $center = BannerBusiness::getByType(BannerType::CENTER, 1);
        $this->var['menuactive'] = $this->baseUrl;
        $cat = [];
        foreach ($category as $c) {
            $cat[] = $c->getAttributes();
        }
//        $applications = [];
//       foreach ($app as $a) {
//            $applications[] = $a->getAttributes();
////        } 
        $data = \GuzzleHttp\json_decode(json_encode($cat));
        foreach ($data as $value) {
            $mynews = [];
            foreach ($news->search(true)->data as $new) {
                if ($value->id == $new->categoryId && $value->tabTwo == 1) {
                    array_push($mynews, $new);
                }
            }
            $value->new = $mynews;
        }
        foreach ($data as $value) {
            $apps = [];
            foreach ($app->search(true)->data as $a) {
                if ($value->id == $a->categoryId && $value->tabOne == 1) {
                    array_push($apps, $a);
                }
            }
            $value->app = $apps;
        }
//        print_r($news->search(true));
//       die;
        // config meta
        $meta = MetaIndexBusiness::get(1);
        if (!empty($meta)) {
            $this->meta($meta->title, $meta->description, $this->baseUrl, null, $meta->keyword);
        }
        // end còn
        return $this->render('home', [
                    'items' => $items->search(true)->data,
                    'partners' => $partners->search(true)->data,
                    'videos' => $videos,
                    'data' => $data,
                    'heart' => $heart,
                    'center' => $center,
                    'news' => $news->search(true)->data,
        ]);
    }

    public function actionPhp() {
        phpinfo();
    }

}
