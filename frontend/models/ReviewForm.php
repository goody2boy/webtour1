<?php

namespace frontend\models;

use common\models\business\ReviewBusiness;
use common\models\business\UserBusiness;
use common\models\business\CountryBusiness;
use common\models\db\Review;
use common\models\db\User;
use common\models\output\Response;
use yii\base\Model;

class ReviewForm extends Model {

    public $id;
    public $name;
    public $email;
    public $review_comment;
    public $country;
    public $rate;
    public $captcha;

    public function rules() {
        return [
            [['name', 'email', 'review_comment', 'captcha', 'rate', 'country'], 'required', 'message' => '{attribute} không được để trống'],
            [['email'], 'email', 'message' => '{attribute} không đúng định dạng'],
            ['captcha', 'captcha', 'captchaAction' => 'diary/captcha', 'caseSensitive' => false, 'message' => 'Captcha không chính xác']
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'review_comment' => 'Nội dung comment',
            'country' => 'Quốc gia',
            'rate' => 'Bình chọn',
        ];
    }

    public function save() {
        if (!$this->validate()) {
            return new Response(false, "Dữ liệu không chính xác vui lòng nhập lại", $this->errors);
        }
        $review = ReviewBusiness::get($this->id);
        if ($review == null) {
            $review = new Review();
            $review->submit_time = time();
        }
        $user = UserBusiness::getByEmail($this->email);
        $country = CountryBusiness::get($this->country);
        if($user == null){
            $user = new User();
            $user->email = $this->email;
            $user->username = $this->name;
            $user->password = $this->name;
            $user->createTime = time();
            $user->firstName = $this->name;
            $user->lastName = $this->name;
            $user->address = $country->name;
            $user->phone = "123123";
            $user->save(true);
        }
        $review->user_id = $user->id;
        $review->review_comment = $this->review_comment;
        $review->rate = $this->rate;
        if (!$review->save(false)) {
            return new Response(false, "Dữ liệu truyền vào không chính xác vui lòng nhập lại", $review->errors);
        }

        return new Response(true, "Cảm ơn bạn đã đóng góp ý kiến, ý kiến của bạn phải được duyệt rồi mới hiển thị", $review);
    }

}
