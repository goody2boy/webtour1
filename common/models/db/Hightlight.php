<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "hightlight".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $language
 */
class Hightlight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hightlight';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'language'], 'required'],
            [['id'], 'integer'],
            [['name', 'description', 'language'], 'string', 'max' => 45]
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
            'description' => Yii::t('app', 'Description'),
            'language' => Yii::t('app', 'Language'),
        ];
    }
    
    public function attributes() {
        return array_merge(parent::attributes(), ['images']);
    }
}
