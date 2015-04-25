<?php

namespace frontend\models;

use common\models\business\OrderBusiness;
use common\models\db\Order;
use common\models\output\Response;
use yii\base\Model;

/**
 * Description of CheckoutForm
 *
 * @author CANH
 */
class CheckoutForm extends Model {

    public $id;
    public $promo_code;
    public $payment_method;
    public $status_payment;

    public function rules() {
        return [
            [['id'], 'integer', 'message' => '{attribute} phải là số !'],
            [['promo_code', 'payment_method', 'status_payment'], 'string', 'message' => '{attribute} phải là ký tự !'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
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
            return new Response(false, "Order không tồn tại", $this->id);
        }
        if ($this->promo_code != null && $this->promo_code != "") {
            $order->promo_code = $this->promo_code;
        }
        $order->payment_method = $this->payment_method;
        $order->status_payment = $this->status_payment;
        $order->update_time = time();
        $order->invoice_code = "CI" + str_pad($order->user_id, 5, "0") + str_pad($order->id, 5, "0");
        if (!$order->save(false)) {
            return new Response(false, "Không lưu được vào csdl", $order->errors);
        }
        return new Response(true, "Đặt hàng thành công! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất !", $order);
    }

}
