<?php

namespace backend\models;

use common\models\business\ReviewBusiness;
use common\models\db\Review;
use common\models\output\Response;
use yii\base\Model;

class ReviewForm extends Model {

    public $id;
    public $user_id;
    public $review_comment;
    public $rate;

    public function rules() {
        return [
            [['user_id', 'id', 'rate', 'review_comment'], 'required', 'message' => '{attribute} không được để trống!'],
            [['user_id', 'id', 'rate'], 'integer'],
            [['review_comment'], 'string'],
        ];
    }

    public function attributeLabels() {
        return [
            'name' => "Tên ",
            'user_id' => "User",
            'rate' => "Rate",
            'review_comment' => "Nội dung comment",
        ];
    }

    public function save() {
        if (!$this->validate()) {
            return new Response(false, "Dữ liệu nhập vào chưa chính xác , vui lòng nhập lại", $this->errors);
        }
        $review = ReviewBusiness::get($this->id);
        if ($review == null) {
            $review = new Review();
            $review->submit_time = time();
        }
        $review->rate = $this->rate;
        $review->review_comment = $this->review_comment;
        $review->user_id = $this->user_id;
        if (!$review->save(false)) {
            return new Response(false, "Dữ liệu nhập vào chưa chính xác , vui lòng nhập lại", $review->errors);
        }

        return new Response(true, "Thao tác dữ liệu thành công", $review);
    }

}
