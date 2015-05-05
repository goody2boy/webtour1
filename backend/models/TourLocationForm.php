<?php

namespace backend\models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use common\models\business\TourLocationBusiness;
use common\models\db\TourLocation;
use common\models\output\Response;
use yii\base\Model;

/**
 * Description of TourLocationForm
 *
 * @author CANH
 */
class TourLocationForm extends Model {

    public $id;
    public $tour_id;
    public $location_name;
    public $location_address;
    public $location_desc;
    public $position;

    public function rules() {
        return [
            [[ 'tour_id', 'location_name', 'location_address', 'location_desc', 'position'], 'required', 'message' => '{attribute} không được để trống!'],
            [['location_name', 'location_address', 'location_desc'], 'string'],
            [['id', 'tour_id', 'position'], 'integer', 'message' => '{attribute} phải là kiểu số!'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => "ID",
            'tour_id' => "Tour ID",
            'location_name' => "Tên địa điểm",
            'location_address' => "Địa chỉ",
            'location_desc' => "Mô tả địa điểm",
            'position' => "Thứ tự",
        ];
    }

    public function save() {
        if (!$this->validate()) {
            return new Response(false, "Dữ liệu không hợp lệ !", $this->errors);
        }
        $tourLocation = TourLocationBusiness::get($this->id);
        if ($tourLocation == null) {
            $tourLocation = new TourLocation();
        }
        $tourLocation->tour_id = $this->tour_id;
        $tourLocation->location_name = $this->location_name;
        $tourLocation->location_address = $this->location_address;
        $tourLocation->location_desc = $this->location_desc;
        $tourLocation->position = $this->position;
        if (!$tourLocation->save(false)) {
            return new Response(false, "Không lưu được vào CSDL", $tourLocation->errors);
        }
        return new Response(true, "Lưu ok", $tourLocation);
    }

}
