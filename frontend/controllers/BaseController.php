<?php

namespace frontend\controllers;

use common\models\business\HomeBusiness;
use common\models\business\MenuBusiness;
use common\models\input\AlbumSearch;
use common\models\input\ReviewsSearch;
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
    }

    public function footer() {
        
        
    }

    /**
     * config default
     */
    private function mDefault() {
        $this->title = "Máy lọc không khí hàng đầu Việt Nam";
        $this->keywrod = "Điều hòa, máy lọc không khí";
        $this->description = "Máy lọc không khí, tốt cho trẻ em, hàng nhập từ mỹ,CÁCH MẠNG CÔNG NGHỆ MÁY LỌC KHÔNG KHÍ ĐẾN TỪ NASA";
        /**
         * config default og
         */
        $this->og = [
            "title" => "Máy lọc không khí đến từ nasa",
            "site_name" => "Airocide",
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
