<?php

namespace frontend\controllers;

use common\models\business\BannerBusiness;
use common\models\business\TourBusiness;
use common\models\business\CountryBusiness;
use common\models\business\OptionBusiness;
use common\models\business\MoneyBusiness;
use common\models\business\MoneyConvertBusiness;
use common\models\input\TourSearch;
use common\models\enu\BannerType;
use common\util\TextUtils;
use Yii;

/**
 * Description of TourController
 *
 * @author CANH
 */
class TourController extends BaseController {

    /**
     * Trang chủ backend
     * @return type
     */
    public function actionIndex() {
        $heart = BannerBusiness::getByType(BannerType::HEART, 1);
        $tourFeatures = $this->getTourFeatureBox();
        return $this->render('index', [
                    'heart' => $heart,
                    'tourFeatures' => $tourFeatures,
        ]);
    }
    public function actionRequest() {
        $countries = CountryBusiness::getAll();
        return $this->render('request', [
            'countries'=>$countries,
        ]);
    }

    
    
    public function actionDetail() {
        $heart = BannerBusiness::getByType(BannerType::HEART, 1);
        $search = new TourSearch();
        $alias = Yii::$app->request->get('alias');
        $id = Yii:: $app->request->get('id');
        $search->id = $id;
        $search->status = 1;
        $result = $search->search(true)->data;
        if ($result == null) {
            return $this->render('//error/message', ['message' => "Tour không tồn tại", 'title' => "404 NOT FOUND"]);
        }
        $tour = $result[0];
        if (TextUtils::removeMarks($tour->title) != $alias) {
            return $this->render('//error/message', ['message' => "Tour không tồn tại", 'title' => "404 NOT FOUND"]);
        }
        // get all Money
        $moneys = MoneyBusiness::listAll();
        $listIds = [];
        foreach ($moneys as $money) {
            $listIds [] = $money->id;
        }
        $moneyConvert = MoneyConvertBusiness::getFromUSDToOther($listIds);
        // get related tour by TourType
        $listTourType = preg_split("/,/", $tour->category_ids);
        $search = new TourSearch();
        $search->status = 1;
        $search->listType = $listTourType;
        $search->pageSize = 6;
        $venuesTour = $search->search(true)->data;
        // get relate Tour by city
        $search = new TourSearch();
        $search->status = 1;
        $search->city = $tour->city_id;
        $search->pageSize = 5;
        $relateTourCity = $search->search(true)->data;
        return $this->render('detail', [
                    'heart' => $heart,
                    'tour' => $tour,
                    'moneys' => $moneys,
                    'moneyconvert' => $moneyConvert,
                    'venuesTour' => $venuesTour,
                    'relateTourCity' => $relateTourCity,
        ]);
    }

    public function getTourFeatureBox() {
        $tourFeatures = [];
        $search = new TourSearch();
        $nameArr = ['HOMEBOX'];
        $listTourIds = preg_split("/,/", OptionBusiness::getConfig($nameArr, 1)[0]->value);
        foreach ($listTourIds as $tourId) {
            $search->id = $tourId;
            $tourFeatures[] = $search->search(true)->data[0];
        }
        return $tourFeatures;
    }
    

}
