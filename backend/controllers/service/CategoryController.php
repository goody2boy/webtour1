<?php

namespace backend\controllers\service;

use common\models\business\CategoryBusiness;
use common\models\db\Category;
use common\models\output\Response;
use Yii;

/**
 * Description of CategoryController
 *
 * @author CANH
 */
class CategoryController extends ServiceController {

    //put your code here
    //put your code here
    public function init() {
        parent::init();
        $this->controller = Category::getTableSchema()->name;
    }

    public function actionGetAll() {
        return $this->response(new Response(true, "Danh sách loại tour", CategoryBusiness::getAll()));
    }

}
