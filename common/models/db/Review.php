<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property string $id
 * @property integer $tour_id
 * @property integer $rate
 * @property string $review_title
 * @property string $review_comment
 * @property integer $submit_time
 */
class Review extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['rate', 'review_comment', 'submit_time'], 'required'],
            [['user_id', 'rate', 'submit_time'], 'integer'],
            [['review_comment'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'rate' => 'Rate',
            'review_comment' => 'Review Comment',
            'submit_time' => 'Submit Time',
        ];
    }

    public function attributes() {
        return array_merge(parent::attributes(), ['image', 'user']);
    }

}
