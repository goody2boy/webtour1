<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "promotion".
 *
 * @property string $id
 * @property string $code
 * @property integer $user_id
 * @property string $discount_price
 * @property string $discount_percent
 * @property integer $start_time
 * @property integer $end_time
 * @property integer $status
 */
class Promotion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promotion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'user_id', 'discount_price', 'discount_percent', 'start_time', 'end_time'], 'required'],
            [['user_id', 'start_time', 'end_time', 'status'], 'integer'],
            [['discount_price', 'discount_percent'], 'number'],
            [['code'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'user_id' => Yii::t('app', 'User ID'),
            'discount_price' => Yii::t('app', 'Discount Price'),
            'discount_percent' => Yii::t('app', 'Discount Percent'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
