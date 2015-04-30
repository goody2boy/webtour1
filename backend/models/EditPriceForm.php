<?php

namespace backend\models;

use common\models\business\TourBusiness;
use common\models\business\PriceBusiness;
use common\models\db\Tour;
use common\models\db\Price;
use common\models\output\Response;
use yii\base\Model;

/**
 * Description of EditPriceForm
 *
 * @author CANH
 */
class EditPriceForm extends Model {

    public $id;
    public $price_1;
    public $price_2;
    public $price_3;
    public $price_4;
    public $price_5;
    public $price_6;

    public function rules() {
        return [
            [['price_1', 'price_2', 'price_3', 'price_4', 'price_5', 'price_6'], 'required', 'message' => '{attribute} không được để trống!'],
            [['id','price_1', 'price_2', 'price_3', 'price_4', 'price_5', 'price_6'], 'integer'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => "Tour id",
            'price_1' => "Giá 1",
            'price_2' => "Giá 2",
            'price_3' => "Giá 3",
            'price_4' => "Giá 4",
            'price_5' => "Giá 5",
            'price_6' => "Giá 6",
        ];
    }

    public function save() {
        if (!$this->validate()) {
            return new Response(false, "Dữ liệu không hợp lệ !", $this->errors);
        }
        $tour = TourBusiness::get($this->id);
        if ($tour == null) {
            return new Response(false, "Không tồn tại tour này!", $this->id);
        }
        PriceBusiness::removeByTour($this->id);
        $price_1 = new Price();
        $price_1->tour_id = $this->id;
        $price_1->position = 1;
        $price_1->type = 1;
        $price_1->name = '1';
        $price_1->price = $this->price_1;
        $price_1->save(false);
        //
        $price_2 = new Price();
        $price_2->tour_id = $this->id;
        $price_2->position = 2;
        $price_2->type = 1;
        $price_2->name = '2';
        $price_2->price = $this->price_2;
        $price_2->save(false);
        //
        $price_3 = new Price();
        $price_3->tour_id = $this->id;
        $price_3->position = 3;
        $price_3->type = 1;
        $price_3->name = '3';
        $price_3->price = $this->price_3;
        $price_3->save(false);
        //
        $price_4 = new Price();
        $price_4->tour_id = $this->id;
        $price_4->position = 4;
        $price_4->type = 1;
        $price_4->name = '4';
        $price_4->price = $this->price_4;
        $price_4->save(false);
        //
        $price_5 = new Price();
        $price_5->tour_id = $this->id;
        $price_5->position = 5;
        $price_5->type = 1;
        $price_5->name = '5';
        $price_5->price = $this->price_5;
        $price_5->save(false);
        //
        $price_6 = new Price();
        $price_6->tour_id = $this->id;
        $price_6->position = 6;
        $price_6->type = 1;
        $price_6->name = '6';
        $price_6->price = $this->price_6;
        $price_6->save(false);
        //
        return new Response(true, "Lưu ok");
    }

}
