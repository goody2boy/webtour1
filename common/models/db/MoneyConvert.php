<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "money_convert".
 *
 * @property string $from_id
 * @property string $to_id
 * @property string $rate
 */
class MoneyConvert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money_convert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_id', 'to_id', 'rate'], 'required'],
            [['from_id', 'to_id'], 'integer'],
            [['rate'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'from_id' => Yii::t('app', 'From ID'),
            'to_id' => Yii::t('app', 'To ID'),
            'rate' => Yii::t('app', 'Rate'),
        ];
    }
}
