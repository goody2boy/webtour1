<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property string $id
 * @property string $type
 * @property integer $target_id
 * @property string $description
 * @property string $title
 * @property string $caption
 * @property string $link
 * @property integer $by
 * @property integer $active
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'target_id', 'title', 'link'], 'required'],
            [['target_id', 'by', 'active'], 'integer'],
            [['description'], 'string'],
            [['type'], 'string', 'max' => 12],
            [['title', 'caption', 'link'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'target_id' => Yii::t('app', 'Target ID'),
            'description' => Yii::t('app', 'Description'),
            'title' => Yii::t('app', 'Title'),
            'caption' => Yii::t('app', 'Caption'),
            'link' => Yii::t('app', 'Link'),
            'by' => Yii::t('app', 'By'),
            'active' => Yii::t('app', 'Active'),
        ];
    }
}
