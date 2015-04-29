<?php

namespace backend\models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use common\models\business\OrderBusiness;
use common\models\db\Tour;
use common\models\output\Response;
use yii\base\Model;

/**
 * Description of TourForm
 *
 * @author CANH
 */
class OrderForm extends Model {

    public $id;
    public $payment_method;
    public $status_payment;
    public $date_departure;
    public $number_adult;
    public $number_child;
    public $number_nochild;

    public function rules() {
        return [
            [['payment_method', 'status_payment'],'string','message' => 'giá trị {attribute} không đúng!'],
            [['id','number_nochild','number_child','number_adult', 'date_departure'], 'integer', 'message' => '{attribute} phải là kiểu số!'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => "ID",
        ];
    }

    public function save() {
        if (!$this->validate()) {
            return new Response(false, "Dữ liệu không hợp lệ !", $this->errors);
        }
        $order = OrderBusiness::get($this->id);
        if ($order == null) {
            return new Response(true, "Không tồn tại order này", $this->id);
        }
        $order->number_nochild = $this->number_nochild;
        $order->number_child = $this->number_child;
        $order->number_adult = $this->number_adult;
        $order->date_departure = $this->date_departure/1000;
        $order->payment_method = $this->payment_method;
        $order->status_payment = $this->status_payment;
        if (!$order->save(false)) {
            return new Response(false, "Không lưu được vào CSDL", $order->errors);
        }
        return new Response(true, "Lưu ok", $order);
    }

}
