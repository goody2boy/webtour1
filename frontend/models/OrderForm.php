<?php

namespace frontend\models;

use common\models\business\OrderBusiness;
use common\models\db\Order;
use common\models\enu\PaymentType;
use common\models\enu\PaymentStatusType;
use common\models\output\Response;
use yii\base\Model;

class OrderForm extends Model {

    public $id;
    public $tour_id;
    public $user_id;
    public $price_id;
    public $number_adult;
    public $number_child;
    public $number_nochild;
    public $total_price;
    public $date_departure;
    public $promo_code;
    public $payment_method;
    public $status_payment;

    public function rules() {
        return [
            [['id', 'tour_id', 'user_id', 'price_id', 'number_adult', 'number_child', 'number_nochild', 'total_price'], 'integer', 'message' => '{attribute} phải là số !'],
            [['promo_code', 'payment_method'], 'string', 'message' => '{attribute} phải là ký tự !'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'tour_id' => 'Mã tour',
            'user_id' => '',
            'price_id' => 'Mã giá',
            'number_adult' => 'Số người lớn',
            'number_child' => 'Số trẻ em',
            'number_nochild' => 'Số bé nhỏ',
            'total_price' => 'tổng giá order',
            'date_departure' => 'Ngày bắt đầu',
            'promo_code' => 'Mã giảm giá',
            'payment_method' => 'Phương thức thanh toán',
            'status_payment' => 'Trạng thái thanh toán',
        ];
    }

    public function save() {
        if (!$this->validate()) {
            return new Response(false, "Dữ liệu không hợp lệ", $this->errors);
        }
        $order = OrderBusiness::get($this->id);
        if ($order == null) {
            $order = new Order();
            $order->create_time = time();
        }
        $order->tour_id = $this->tour_id;
        $order->user_id = $this->user_id;
        $order->price_id = $this->price_id;
        $order->number_adult = $this->number_adult;
        $order->number_child = $this->number_child;
        $order->number_nochild = $this->number_nochild;
        $order->total_price = time();
        $order->date_departure = time();
        if ($this->promo_code != null && $this->promo_code != "") {
            $order->promo_code = time();
        }
        $order->payment_method = $this->payment_method;
        $order->status_payment = PaymentStatusType::EVER;
        $order->update_time = time();
        if (!$order->save(false)) {
            return new Response(false, "Không lưu được vào csdl", $order->errors);
        }
        return new Response(true, "Đặt hàng thành công! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất !", $order);
    }

}
