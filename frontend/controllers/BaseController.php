<?php

namespace frontend\controllers;

use common\models\business\MenuBusiness;
use yii\web\Controller;

class BaseController extends Controller {

    public $staticClient;
    public $baseUrl;
    public $title;
    public $description;
    public $keywrod;
    public $og;
    public $canonical;
    public $var = [];

    public function init() {
        parent::init();
        $this->baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . str_replace("index.php", '', $_SERVER['SCRIPT_NAME']);
        $this->mDefault();
        $this->footer();
    }

    public function footer() {
        $this->var['menus'] = MenuBusiness::getGrid(1);
        
    }

    /**
     * config default
     */
    private function mDefault() {
        $this->title = "City tours - Unique insight into Vietnam";
        $this->keywrod = "vietnam day tour, things to do in vietnam, vietnam day trips, vietnam day tours, vietnam daily tour, vietnam insight, vietnam city tour, vietnam sightseeing tours, vietnam excursions,  vietnam private tours, hanoi city tour, ho chi minh city tour, hue tour, hoi an tour, nha trang city tour";
        $this->description = "Planning a trip to Vietnam? Join Vietnam city tours and day trips operated by City Insight to have great experience exploring the cities of Vietnam.";
        /**
         * config default og
         */
        $this->og = [
            "title" => "City tours - Unique insight into Vietnam",
            "site_name" => "City tours",
            "url" => $this->baseUrl,
            "image" => "",
            "description" => $this->description,
        ];
        $this->canonical = $this->baseUrl;
    }

    /**
     * Config meta
     * @param type $title
     * @param type $description
     * @param type $url
     * @param type $image
     * @param type $keywrod
     */
    protected function meta($title = null, $description = null, $url = null, $image = null, $keywrod = null) {
        if ($title != null) {
            $this->title = $title;
            $this->og['title'] = $title;
        }
        if ($description != null) {
            $this->description = $description;
            $this->og['description'] = $this->description;
        }
        if ($keywrod != null) {
            $this->keywrod = $keywrod;
        }
        if ($url != null) {
            $this->canonical = $url;
            $this->og['url'] = $this->canonical;
        }
        if ($image != null) {
            $this->og['image'] = $image;
        }
    }

}
