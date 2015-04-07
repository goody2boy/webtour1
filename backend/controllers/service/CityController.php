<?php

namespace backend\controllers\service;

use common\models\business\CityBusiness;
use common\models\db\City;
use common\models\output\Response;
use Yii;

/**
 * Description of CityController
 *
 * @author CANH
 */
class CityController  extends ServiceController {
    //put your code here
    
    //put your code here
    public function init() {
        parent::init();
        $this->controller = City::getTableSchema()->name;
    }
    
    
    public function actionGetAll(){
        return $this->response(new Response(true, "Danh sách thành phố" , CityBusiness::getAll()));
    }
}
