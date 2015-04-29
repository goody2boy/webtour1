<?php

namespace backend\models;

use common\models\business\OptionBusiness;
use common\models\db\Option;
use common\models\output\Response;
use yii\base\Model;

class OptionForm extends Model {

    public $id;
    public $name;
    public $auto_load;
    public $key;
    public $value;

    public function rules() {
        return [
            [['name', 'key', 'value'], 'required', 'message' => '{attribute} không được để trống!'],
            [['auto_load', 'id'], 'integer'],
            [['name', 'key', 'value'], 'string', 'max' => 220],
        ];
    }

    public function attributeLabels() {
        return [
            'name' => "Tên ",
        ];
    }

    public function save() {
        if (!$this->validate()) {
            return new Response(false, "Dữ liệu nhập vào chưa chính xác , vui lòng nhập lại", $this->errors);
        }
        $option = OptionBusiness::get($this->id);
        if ($option == null) {
            $option = new Option();
            $o = OptionBusiness::getByKey($this->key);
            if (!empty($o)) {
                return new Response(false, "Key đã tồn tại", []);
            }
            $option->key = strtoupper($this->key);
        }
        $option->name = $this->name;
        $option->value = $this->value;
        $option->auto_load = $this->auto_load == 1 ? 1 : 0;
        if (!$option->save(false)) {
            return new Response(false, "Dữ liệu nhập vào chưa chính xác , vui lòng nhập lại", $option->errors);
        }

        return new Response(true, "Thao tác dữ liệu thành công", $option);
    }

}
