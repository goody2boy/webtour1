<?php

namespace backend\models;

use common\models\business\CountryBusiness;
use common\models\db\Country;
use common\models\output\Response;
use yii\base\Model;

class CountryForm extends Model {

    public $id;
    public $name;
    public $language;
    public $code;

    public function rules() {
        return [
             [['name', 'code', 'language'], 'required', 'message' => '{attribute} không được để trống!'],
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
        ];
    }

    public function save() {
        if (!$this->validate()) {
            return new Response(false, "Dữ liệu không hợp lệ !", $this->errors);
        }
        $country = CountryBusiness::get($this->id);
        if ($country == null) {
            $country = new Country();
        }
        $country->name = $this->name;
        $country->code = $this->code;
        $country->language = $this->language;
        if (!$country->save(false)) {
            return new Response(false, "Không lưu được vào csdl", $country->errors);
        }
        return new Response(true, "Lưu ok", $country);
    }

}
