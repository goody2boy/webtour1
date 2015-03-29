<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property string $language
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'language'], 'required'],
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
            'language' => Yii::t('app', 'Language'),
        ];
    }
}
