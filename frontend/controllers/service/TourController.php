<?php

namespace frontend\controllers\service;

use common\models\input\TourSearch;
use common\models\output\Response;
use Yii;
use yii\captcha\Captcha;

/**
 * Description of TourController
 *
 * @author CANH
 */
class TourController extends ServiceController {

    public function actionGetTourImg() {
        $post = Yii::$app->request->post();
        $id = $post['id'];
        $search = new TourSearch();
        $search->id = $id;
        $search->status = 1;
        $result = $search->search(true)->data;
        if ($result == null) {
            return $this->response(new Response(false, "Tour không tồn tại", $tourId));
        }
        $tour = $result[0];
        return $this->response(new Response(true, "Get thành công thông tin Tour", $tour));
    }
    
    public function actionGetcaptcha(){
        $captText = Captcha::widget(['name' => 'captcha', 'captchaAction' => 'diary/captcha', 'template' =>
                            '<div class="col-sm-5"> 
                            <div class="form-group">
                                <div class="box-captcha">
                                    {image}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <a class="btnnewimg" href="#" id="refresh-captcha" onclick="tour.changeCaptcha();"></a>
                            </div><!-- form-group -->
                        </div><!-- col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {input}
                            </div><!-- form-group -->
                        </div>',]);
        return $this->response(new Response(true, "Get thành công thông tin Tour", $captText));
    }

}
