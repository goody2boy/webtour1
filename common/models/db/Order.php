<?php

namespace common\models\db;

use Yii;


class Order extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['tour_id', 'user_id', 'price_id', 'number_adult', 'number_child', 'number_nochild', 'total_price', 'date_departure', 'create_time', 'update_time', 'invoice_code'], 'required'],
            [['tour_id', 'user_id', 'price_id', 'number_adult', 'number_child', 'number_nochild', 'date_departure', 'create_time', 'update_time'], 'integer'],
            [['total_price','status'], 'number'],
            [['promo_code', 'payment_method', 'status_payment'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'tour_id' => Yii::t('app', 'Tour ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'price_id' => Yii::t('app', 'Price ID'),
            'number_adult' => Yii::t('app', 'Number Adult'),
            'number_child' => Yii::t('app', 'Number Child'),
            'number_nochild' => Yii::t('app', 'Number Nochild'),
            'total_price' => Yii::t('app', 'Total Price'),
            'date_departure' => Yii::t('app', 'Date Departure'),
            'create_time' => Yii::t('app', 'Create Time'),
            'update_time' => Yii::t('app', 'Update Time'),
            'promo_code' => Yii::t('app', 'Promo Code'),
            'payment_method' => Yii::t('app', 'Payment Method'),
            'status_payment' => Yii::t('app', 'Status Payment'),
            'invoice_code' => Yii::t('app', 'Invoice Code'),
            'status' => Yii::t('app', 'Trạng thái'),
        ];
    }

    public function attributes() {
        return array_merge(parent::attributes(), ['tour', 'user', 'price', 'final_price']);
    }

}
