<?php

namespace frontend\controllers;

use common\models\business\BannerBusiness;
use common\models\enu\BannerType;
use Yii;

class IndexController extends BaseController {

    /**
     * Trang chủ backend
     * @return type
     */
    public function actionIndex() {
        $heart = BannerBusiness::getByType(BannerType::HEART, 1);
        $this->var['menuactive'] = Yii::$app->request->absoluteUrl;
        return $this->render('index', [
                    'heart' => $heart,
        ]);
    }

    public function actionPhp() {
        phpinfo();
    }

}
