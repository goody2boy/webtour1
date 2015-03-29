<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $id
 * @property string $user_name
 * @property string $user_pass
 * @property integer $registered_time
 * @property string $display_name
 * @property string $active_key
 * @property integer $contact_id
 * @property integer $active
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'user_pass', 'registered_time', 'display_name', 'active_key', 'contact_id'], 'required'],
            [['registered_time', 'contact_id', 'active'], 'integer'],
            [['user_name', 'user_pass', 'active_key'], 'string', 'max' => 50],
            [['display_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_name' => Yii::t('app', 'User Name'),
            'user_pass' => Yii::t('app', 'User Pass'),
            'registered_time' => Yii::t('app', 'Registered Time'),
            'display_name' => Yii::t('app', 'Display Name'),
            'active_key' => Yii::t('app', 'Active Key'),
            'contact_id' => Yii::t('app', 'Contact ID'),
            'active' => Yii::t('app', 'Active'),
        ];
    }
}
