<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "option".
 *
 * @property string $id
 * @property string $name
 * @property string $value
 * @property integer $auto_load
 */
class Option extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'value','name'], 'required'],
            [['auto_load'], 'integer'],
            [['key'], 'string', 'max' => 100],
            [['value','name'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Key'),
            'value' => Yii::t('app', 'Value'),
            'name' => Yii::t('app', 'Name'),
            'auto_load' => Yii::t('app', 'Auto Load'),
        ];
    }
    
}
