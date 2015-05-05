<?php

namespace backend\controllers\service;

use backend\models\TourForm;
use backend\models\TourLocationForm;
use backend\models\EditPriceForm;
use common\models\business\TourBusiness;
use common\models\business\TourLocationBusiness;
use common\models\business\CategoryTourBusiness;
use common\models\business\PriceBusiness;
use common\models\business\ImageBusiness;
use common\models\db\Tour;
use common\models\enu\ImageType;
use common\models\input\TourSearch;
use common\models\output\Response;
use Yii;

/**
 * Description of TourController
 *
 * @author CANH
 */
class TourController extends ServiceController {

    //put your code here
    public function init() {
        parent::init();
        $this->controller = Tour::getTableSchema()->name;
    }

    public function actionGetall() {
        if (is_object($resp = $this->can("getall"))) {
            return $this->response($resp);
        }
        return $this->response(new Response(true, "", TourBusiness::getAll()));
    }

    /**
     * Search admin
     */
    public function actionGrid() {
        if (is_object($resp = $this->can("grid"))) {
            return $this->response($resp);
        }
        $search = new TourSearch();
        $search->setAttributes(Yii::$app->request->get());
        // 
        return $this->response(new Response(true, "Danh sách tour", $search->search(true)));
    }

    public function actionGet() {
        if (is_object($resp = $this->can("get"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        $tour = TourBusiness::get($id);
        return $this->response(new Response(true, "", TourBusiness::get($id)));
    }

    public function actionChangeActive($id) {
        if (is_object($resp = $this->can("changeActive"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        return $this->response(TourBusiness::changeActive($id));
    }

    public function actionRemove($id) {
        if (is_object($resp = $this->can("remove"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        CategoryTourBusiness::removeByTour($id);
        PriceBusiness::removeByTour($id);
        ImageBusiness::deleteByTargetAndType($id, ImageType::TOUR);
        return $this->response(TourBusiness::remove($id));
    }

    public function actionAdd() {
        if (is_object($resp = $this->can("add"))) {
            return $this->response($resp);
        }
        $form = new TourForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        $cateIds = $form->tourType;
        $tourTypeStr = '';
        if ($form->tourType == null) {
            return new Response(false, "Chưa chọn tour Type", $form);
        }
        foreach ($form->tourType as $temp) {
            $tourTypeStr .= $temp . ',';
        }
        $form->tourType = $tourTypeStr;
        if ($form->save()->success) {
            CategoryTourBusiness::addCateTour(null, $cateIds, $form->code);
            return $this->response(new Response(true, "Thêm mới tour thành công"));
        } else {
            return new Response(false, "Có lỗi xảy ra trong quá trình thêm mới Tour", $form);
        }
    }

    public function actionAddImage($tourId, $url) {
        
    }

    public function actionGetPrice($id) {
        if (is_object($resp = $this->can("get-price"))) {
            return $this->response($resp);
        }
        $search = new TourSearch();
        $search->id = $id;
        $tour = $search->search(true)->data[0];
        $prices = $tour->prices;
        return $this->response(new Response(true, "Giá tour", $prices));
    }

    public function actionEditPrice() {
        if (is_object($resp = $this->can("edit-price"))) {
            return $this->response($resp);
        }
        $form = new EditPriceForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->save());
    }

    public function actionGetLocations($id) {
        if (is_object($resp = $this->can("get-locations"))) {
            return $this->response($resp);
        }
        $search = new TourSearch();
        $search->id = $id;
        $tour = $search->search(true)->data[0];
//        $locations = $tour->locations;
//        TourLocationBusiness::getByTour($tour->id);
        return $this->response(new Response(true, "Địa điểm trong tour", $tour));
    }

    public function actionAddLocation() {
        if (is_object($resp = $this->can("add-location"))) {
            return $this->response($resp);
        }
        $form = new TourLocationForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
//        return new Response($form->save());
        $result = $form->save();
        if ($result->success) {
            return $this->response($result);
        } else {
            return new Response(false, $result->message, $form);
        }
    }

    public function actionRemoveLocation($id) {
        if (is_object($resp = $this->can("add-location"))) {
            return $this->response($resp);
        }
        return $this->response(TourLocationBusiness::remove($id));
    }

    public function actionGetLocation($id) {
        if (is_object($resp = $this->can("get-location"))) {
            return $this->response($resp);
        }
        $tourLocat = TourLocationBusiness::get($id);
        if ($tourLocat == null) {
            return $this->response(new Response(false, 'Không tìm thấy địa điểm này', $id));
        } else {
            return $this->response(new Response(true, 'Tìm thấy địa điểm', $tourLocat));
        }
    }

}
