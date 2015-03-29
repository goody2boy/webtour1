<?php

namespace backend\controllers\service;

use common\models\business\OptionBusiness;
use common\models\db\Option;
use common\models\output\Response;
use \backend\models\HomeForm;
use Yii;

class HomeController extends ServiceController {

    public function init() {
        parent::init();
        $this->controller = Option::getTableSchema()->name;
    }

    /**
     * Get Banner
     */
    public function actionGet() {
        if (is_object($resp = $this->can("get"))) {
            return $this->response($resp);
        }
        $id = Yii::$app->request->get('id');
        $nameArr = ['EMAIL_CONTACT', 'ADMIN_EMAIL', 'SLOGAN', 'HOTLINE', 'PHONE', 'FACEBOOK', 'YOUTUBE', 'TWITTER', 'BANK_INFO'];
        return $this->response(new Response(true, "Lấy dữ liệu thành công", OptionBusiness::getConfig($nameArr, 1)));
    }
    
    public function actionChange(){
        if(is_object($resp = $this->can("change"))){
            return $this->response($resp);
        }
        $form = new HomeForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->save());
//        return $this->response(new Response(false, "Khong the cap nhat!", null));
    }

}
