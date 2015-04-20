<?php

namespace frontend\controllers\service;

use common\models\input\TourSearch;
use frontend\models\ReviewForm;
use Yii;
use yii\captcha\Captcha;

/**
 * Description of ReviewController
 *
 * @author CANH
 */
class ReviewController extends ServiceController {
   
    public function actionSave() {
        $form = new ReviewForm();
        $form->setAttributes(Yii::$app->request->getBodyParams());
        return $this->response($form->save());
    }
}
