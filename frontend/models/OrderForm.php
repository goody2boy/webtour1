<?php

namespace frontend\models;

use common\models\business\ContactBusiness;
use common\models\db\Contact;
use common\models\output\Response;
use yii\base\Model;

class OrderForm extends Model {

    public $id;
    public $name;
    public $email;
    public $content;
    public $phone;
    public $address;
    public $description;
    public $captcha;

    public function rules() {
        return [
            [['id', 'phone'], 'integer', 'message' => '{attribute} phải là số !'],
            [['content', 'name', 'email', 'description'], 'string', 'message' => '{attribute} phải là ký tự !'],
            [['name', 'email', 'phone', 'address', 'captcha'], 'required', 'message' => '{attribute} không được để trống !'],
            [['email'], 'email', 'message' => '{attribute} không đúng định dạng !'],
            ['captcha', 'captcha', 'captchaAction' => 'order/captcha', 'caseSensitive' => false,'message'=>'Captcha không chính xác']
        ];
    }

    public function attributeLabels() {
        return [
            'id' => "Mã",
            'name' => "Tên",
            'email' => "Email",
            'content' => "Ghi chus",
            'phone' => "Số điện thoại",
            'address' => "Địa chỉ",
        ];
    }

    public function save() {
        if (empty($this->description)) {
            return new Response(false, "Vui lòng chọn sản phẩm !",[]);
        }
        if (!$this->validate()) {
            return new Response(false, "Dữ liệu không hợp lệ", $this->errors);
        }
        $contact = ContactBusiness::get($this->id);
        if ($contact == null) {
            $contact = new Contact();
            $contact->createTime = time();
        }
        $contact->email = $this->email;
        $contact->content = $this->content . ' ' . $this->description;
        $contact->name = $this->name;
        $contact->address = $this->address;
        $contact->phone = '0' . $this->phone;
        $contact->updateTime = time();
        if (!$contact->save(false)) {
            return new Response(false, "Không lưu được vào csdl", $contact->errors);
        }
        return new Response(true, "Đặt hàng thành công! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất !", $contact);
    }

}
