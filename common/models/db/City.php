<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property integer $country_id
 * @property string $description
 * @property string $language
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'code', 'country_id', 'description', 'language'], 'required'],
            [['id', 'country_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['code', 'language'], 'string', 'max' => 3]
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
            'code' => Yii::t('app', 'Code'),
            'country_id' => Yii::t('app', 'Country ID'),
            'description' => Yii::t('app', 'Description'),
            'language' => Yii::t('app', 'Language'),
        ];
    }
}
