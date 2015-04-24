<?php

namespace backend\models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use common\models\business\TourBusiness;
use common\models\db\Tour;
use common\models\output\Response;
use yii\base\Model;

/**
 * Description of TourForm
 *
 * @author CANH
 */
class TourForm extends Model {

    public $id;
    public $code;
    public $title;
    public $tourType;
    public $city_id;
    public $description;
    public $full_initerary;
    public $inclusion;
    public $exclusion;
    public $notes;
    public $mapp_address;
//    public $price_id;
    public $duration_time;
//    public $author_id;
    public $language;
    public $status;

    public function rules() {
        return [
            [['name', 'code', 'title', 'tourType', 'city_id', 'language', 'status'], 'required', 'message' => '{attribute} không được để trống!'],
            [['id', 'city_id'], 'integer', 'message' => '{attribute} phải là kiểu số!'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => "ID",
            'code' => "Mã tour",
            'title' => "Tiêu đề tour",
            'tourType' => "Danh mục tour",
            'city_id' => "Thành phố",
            'description' => "Mô tả",
            'full_initerary' => "full initerary",
            'inclusion' => "inclusion",
            'exclusion' => "exclusion",
            'notes' => "notes",
            'mapp_address' => "Địa chỉ tour",
            'duration_time' => "Thời gian diễn ra",
            'language' => "Ngôn ngữ",
            'status' => "Trạng thái",
        ];
    }

    public function save() {
        if (!$this->validate()) {
            return new Response(false, "Dữ liệu không hợp lệ !", $this->errors);
        }
        $tour = TourBusiness::get($this->id);
        if ($tour == null) {
            $tour = new Tour();
            $tour->create_time = time();
        }
        $cateIds = '';
        foreach ($this->tourType as $cateId) {
            $cateIds += $cateIds + $cateId + ',';
        }
        $tour->code = $this->code;
        $tour->title = $this->title;
        $tour->category_ids = $cateIds;
        $tour->description = $this->description;
        $tour->full_initerary = $this->full_initerary;
        $tour->inclusion = $this->inclusion;
        $tour->exclusion = $this->exclusion;
        $tour->notes = $this->notes;
        $tour->mapp_address = $this->mapp_address;
        $tour->duration_time = $this->duration_time;
        $tour->status = $this->status == 1 ? 1 : 0;
        $tour->language = $this->language;
        $tour->update_time = time();
        if (!$tour->save(false)) {
            return new Response(false, "Không lưu được vào CSDL", $tour->errors);
        }
        return new Response(true, "Lưu ok", $tour);
    }

}
