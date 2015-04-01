<?php

namespace frontend\models;

use common\models\business\ContactBusiness;
use common\models\db\Contact;
use common\models\output\Response;
use yii\base\Model;

class ContactForm extends Model {

    public $id;
    public $name;
    public $email;
    public $content;

    public function rules() {
        return [
            [['id'], 'integer', 'message' => '{attribute} phải là số !'],
            [['content', 'name', 'email'], 'string', 'message' => '{attribute} phải là ký tự !'],
            [['content', 'name', 'email'], 'required', 'message' => '{attribute} không được để trống !'],
            [['email'], 'email', 'message' => '{attribute} không đúng định dạng !'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => "Mã",
            'name' => "Tên",
            'email' => "Email",
            'content' => "Thông điệp",
        ];
    }

    public function save() {
        if (!$this->validate()) {
            return new Response(false,"Dữ liệu không hợp lệ", $this->errors);
        }
        $contact = ContactBusiness::get($this->id);
        if ($contact == null) {
            $contact = new Contact();
            $contact->createTime = time();
        }
        $contact->email = $this->email;
        $contact->content = $this->content;
        $contact->name = $this->name;
        $contact->updateTime = time();
        if (!$contact->save(false)) {
            return new Response(false, "Không lưu được vào csdl", $contact->errors);
        }
        return new Response(true, "Thông điệp của bạn đã được gửi! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất !", $contact);
    }

}
