<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "price".
 *
 * @property string $id
 * @property string $name
 * @property string $type
 * @property string $price
 * @property integer $tour_id
 * @property integer $position
 */
class Price extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'type', 'price', 'tour_id', 'position'], 'required'],
            [['id', 'tour_id', 'position'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'type' => Yii::t('app', 'Type'),
            'price' => Yii::t('app', 'Price'),
            'tour_id' => Yii::t('app', 'Tour ID'),
            'position' => Yii::t('app', 'Position'),
        ];
    }
}
