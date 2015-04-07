<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "category_tour".
 *
 * @property string $cate_id
 * @property string $tour_id
 */
class CategoryTour extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_tour';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cate_id', 'tour_id'], 'required'],
            [['cate_id', 'tour_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cate_id' => 'Cate ID',
            'tour_id' => 'Tour ID',
        ];
    }
    
    public function getTour()
    {
        return $this->hasOne(Tour::className(), ['id'=>'tour_id']);
    }
}
