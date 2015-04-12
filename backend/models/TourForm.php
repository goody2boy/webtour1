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
    public $city_id;
    public $description;
    public $full_initerary;
    public $inclusion;
    public $exclusion;
    public $note;
    public $mapp_address;
    public $price_id;
    public $duration_time;
    public $money_id;
    public $create_time;
    public $update_time;
    public $end_time;
    public $author_id;
    public $language;
    public $status;
    public $categories;

    public function rules() {
        return [
            [['name', 'code', 'language', 'active', 'categories'], 'required', 'message' => '{attribute} không được để trống!'],
            [['id'], 'integer', 'message' => '{attribute} không được để trống!'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => "ID",
            'code' => "Mã loại tiền",
            'name' => "Tên loại tiền",
            'language' => "Ngôn ngữ",
            'active' => "Trạng thái",
        ];
    }

    public function save() {
        if (!$this->validate()) {
            return new Response(false, "Dữ liệu không hợp lệ !", $this->errors);
        }
        $money = MoneyBusiness::get($this->id);
        if ($money == null) {
            $money = new Money();
            $money->create_time = time();
        }
        $money->code = $this->code;
        $money->name = $this->name;
        $money->active = $this->active == 1 ? 1 : 0;
        $money->language = $this->language;
        $money->update_time = time();
        if (!$money->save(false)) {
            return new Response(false, "Không lưu được vào CSDL", $money->errors);
        }
        return new Response(true, "Lưu ok", $money);
    }

}
