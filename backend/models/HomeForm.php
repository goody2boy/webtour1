<?php

namespace backend\models;

use common\models\business\OptionBusiness;
use common\models\db\Home;
use common\models\output\Response;
use yii\base\Model;

class HomeForm extends Model {

    public $id;
    public $emailcontact;
    public $emailadmin;
    public $slogan;
    public $hotline;
    public $phone;
    public $facebook;
    public $youtube;
    public $twitter;
    public $bank;

    public function rules() {
        return [
            [['slogan', 'phone', 'bank', 'hotline', 'emailcontact', 'emailadmin', 'facebook', 'youtube', 'twitter'], 'required', 'message' => "{attribute} không được để trống"],
            [['id'], 'integer'],
        ];
    }

    public function save() {
        if (!$this->validate()) {
            return new Response(false, "Dữ liệu không chính xác vui lòng nhập lại", $this->errors);
        }
        $nameArr = ['EMAIL_CONTACT', 'ADMIN_EMAIL', 'SLOGAN', 'HOTLINE', 'PHONE', 'FACEBOOK', 'YOUTUBE', 'TWITTER', 'BANK_INFO'];
        $allOptions = OptionBusiness::getConfig($nameArr, 1);
        foreach ($allOptions as $option) {
            if ($option["key"] == "EMAIL_CONTACT") {
                $option["value"] = $this->emailcontact;
            }
            if ($option["key"] == "ADMIN_EMAIL") {
                $option["value"] = $this->emailadmin;
            }
            if ($option["key"] == "SLOGAN") {
                $option["value"] = $this->slogan;
            }
            if ($option["key"] == "HOTLINE") {
                $option["value"] = $this->hotline;
            }
            if ($option["key"] == "PHONE") {
                $option["value"] = $this->phone;
            }
            if ($option["key"] == "FACEBOOK") {
                $option["value"] = $this->facebook;
            }
            if ($option["key"] == "YOUTUBE") {
                $option["value"] = $this->youtube;
            }
            if ($option["key"] == "TWITTER") {
                $option["value"] = $this->twitter;
            }
            if ($option["key"] == "BANK_INFO") {
                $option["value"] = $this->bank;
            }
        }
        foreach ($allOptions as $option) {
            if (!$option->save(false)) {
                return new Response(false, "Dữ liệu truyền vào không chính xác vui lòng nhập lại", $option->errors);
            }
        }
        return new Response(true, "Lưu thành công", $allOptions);
    }

}
