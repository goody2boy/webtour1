<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "news_category".
 *
 * @property integer $id
 * @property string $alias
 * @property string $name
 * @property string $description
 * @property integer $parentId
 * @property integer $active
 * @property integer $position
 * @property integer $createTime
 * @property integer $updateTime
 * @property string $createEmail
 * @property string $updateEmail
 */
class NewsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'description', 'createEmail', 'updateEmail'], 'required'],
            [['description'], 'string'],
            [['parentId', 'active', 'position', 'createTime', 'updateTime'], 'integer'],
            [['alias', 'name'], 'string', 'max' => 220],
            [['createEmail', 'updateEmail'], 'string', 'max' => 100],
            [['alias'], 'unique','message'=>'{attribute} đã tồn tại']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'parentId' => Yii::t('app', 'Parent ID'),
            'active' => Yii::t('app', 'Active'),
            'tabOne' => Yii::t('app', 'Tab One'),
            'tabTwo' => Yii::t('app', 'Tab Two'),
            'icon' => Yii::t('app', 'Icon'),
            'position' => Yii::t('app', 'Position'),
            'createTime' => Yii::t('app', 'Create Time'),
            'updateTime' => Yii::t('app', 'Update Time'),
            'createEmail' => Yii::t('app', 'Create Email'),
            'updateEmail' => Yii::t('app', 'Update Email'),
        ];
    }
}
