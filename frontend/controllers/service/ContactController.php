<?php

namespace frontend\controllers\service;

use common\models\business\ContactBusiness;
use common\models\output\Response;
use frontend\models\ContactForm;
use Yii;

class ContactController extends ServiceController {

    public function actionSave() {
        $form = new ContactForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->save());
    }

    /**
     * Get Banner
     */
    public function actionGet() {
        $id = Yii::$app->request->get('id');
        return $this->response(new Response(true, "Lấy dữ liệu thành công", ContactBusiness::get($id)));
    }

}
