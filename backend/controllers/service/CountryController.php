<?php

namespace backend\controllers\service;

use backend\models\CityForm;
use backend\models\CountryForm;
use common\models\business\CityBusiness;
use common\models\business\CountryBusiness;
use common\models\db\Country;
use common\models\output\Response;
use Yii;

class CountryController extends ServiceController {

    public function init() {
        parent::init();
        $this->controller = Country::getTableSchema()->name;
    }

    public function actionGrid() {
        if (is_object($resp = $this->can("grid"))) {
            return $this->response($resp);
        }

        return $this->response(new Response(true, "Lấy dữ liệu trả về thành công", CountryBusiness::getAll()));
    }

    public function actionAdd() {
        if (is_object($resp = $this->can("add"))) {
            return $this->response($resp);
        }
        $form = new CountryForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        $form->code = $form->code . '';
        return $this->response($form->save());
    }

    public function actionGet() {
        if (is_object($resp = $this->can("get"))) {
            return $this->response($resp);
        }
        $id = \Yii::$app->request->get('id');
        return $this->response(new Response(true, "Lấy dữ liệu thành công", CountryBusiness::get($id)));
    }

    public function actionRemove($id) {
        if (is_object($resp = $this->can("remove"))) {
            return $this->response($resp);
        }
        $id = \Yii::$app->request->get('id');
        return $this->response(CountryBusiness::remove($id));
    }

    public function actionGetbycountryid() {
        if (is_object($resp = $this->can("getbycountryid"))) {
            return $this->response($resp);
        }
        $id = \Yii::$app->request->get("id");
        return $this->response(new Response(true, "Lấy dữ liệu thành công", CityBusiness::getCityByCountry($id)));
    }

    public function actionAddcity() {
        if (is_object($resp = $this->can("addcity"))) {
            return $this->response($resp);
        }
        $form = new CityForm();
        $form->setAttributes(\Yii::$app->request->getBodyParams());
        return $this->response($form->save());
    }

    public function actionGetcityid() {
        if (is_object($resp = $this->can("getcityid"))) {
            return $this->response($resp);
        }
        $id = \Yii::$app->request->get();
        return $this->response(new Response(true, 'Lấy dữ liệu thành công', CityBusiness::get($id)));
    }

    public function actionRemovecity() {
        if (is_object($resp = $this->can("removecity"))) {
            return $this->response($resp);
        }
        $id = \Yii::$app->request->get();
        return $this->response(CityBusiness::remove($id));
    }

}
