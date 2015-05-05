<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "tour_location".
 *
 * @property integer $id
 * @property integer $tour_id
 * @property string $location_name
 * @property string $location_address
 * @property string $location_desc
 * @property integer $position
 */
class TourLocation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tour_location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tour_id', 'location_name', 'location_address', 'location_desc'], 'required'],
            [['tour_id', 'position'], 'integer'],
            [['location_desc'], 'string'],
            [['location_name', 'location_address'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tour_id' => Yii::t('app', 'Tour ID'),
            'location_name' => Yii::t('app', 'Location Name'),
            'location_address' => Yii::t('app', 'Location Address'),
            'location_desc' => Yii::t('app', 'Location Desc'),
            'position' => Yii::t('app', 'Position'),
        ];
    }
}
