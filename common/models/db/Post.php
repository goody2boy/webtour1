<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property string $id
 * @property integer $cate_id
 * @property integer $author_id
 * @property string $name
 * @property string $content
 * @property integer $start_time
 * @property integer $end_time
 * @property integer $update_time
 * @property string $status
 * @property integer $view_count
 * @property integer $love_count
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cate_id', 'author_id', 'name', 'content', 'start_time', 'end_time', 'update_time', 'status', 'view_count', 'love_count'], 'required'],
            [['id', 'cate_id', 'author_id', 'start_time', 'end_time', 'update_time', 'view_count', 'love_count'], 'integer'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cate_id' => Yii::t('app', 'Cate ID'),
            'author_id' => Yii::t('app', 'Author ID'),
            'name' => Yii::t('app', 'Name'),
            'content' => Yii::t('app', 'Content'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
            'update_time' => Yii::t('app', 'Update Time'),
            'status' => Yii::t('app', 'Status'),
            'view_count' => Yii::t('app', 'View Count'),
            'love_count' => Yii::t('app', 'Love Count'),
        ];
    }
}
