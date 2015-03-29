<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "money".
 *
 * @property string $id
 * @property string $code
 * @property string $name
 * @property string $language
 */
class Money extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'language'], 'required'],
            [['code', 'language'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'language' => Yii::t('app', 'Language'),
        ];
    }
}
