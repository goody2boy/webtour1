<?php

namespace backend\models;

use common\models\business\CityBusiness;
use common\models\db\City;
use common\models\output\Response;
use yii\base\Model;

class CityForm extends Model {

    public $id;
    public $name;
    public $language;
    public $code;
    public $description;
    public $country_id;

    public function rules() {
        return [
             [['name', 'code', 'language','description','country_id'], 'required', 'message' => '{attribute} không được để trống!'],
            [['name'], 'string', 'max' => 100, 'message' => '{attribute} phải là ký tự !'],
            [['code', 'language'], 'string', 'max' => 3, 'message' => '{attribute} phải là ký tự !','tooLong'=>'{attribute} tối đa là {max} ký tự'],
            [['id'], 'integer'],
        ];
    }

    public function attributeLabels() {
        return [
            'name' => "Tên",
            'code' => "Mã",
            'language' => "Ngôn ngữ",
            'description' => "Mô tả",
        ];
    }

    public function save() {
        if (!$this->validate()) {
            return new Response(false, "Dữ liệu không hợp lệ !", $this->errors);
        }
        $city = CityBusiness::get($this->id);
        if ($city == null) {
            $city = new City();
        }
        $city->name = $this->name;
        $city->code = $this->code;
        $city->language = $this->language;
        $city->description = $this->description;
        $city->country_id = $this->country_id;
        if (!$city->save(false)) {
            return new Response(false, "Không lưu được vào csdl", $city->errors);
        }
        return new Response(true, "Lưu ok", $city);
    }

}
