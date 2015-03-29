<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property integer $phone
 * @property string $email
 * @property string $city
 * @property string $zipcode
 * @property string $country
 * @property string $state
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone', 'email', 'country'], 'required'],
            [['phone'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['address', 'email', 'city', 'country', 'state'], 'string', 'max' => 100],
            [['zipcode'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'address' => Yii::t('app', 'Address'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'city' => Yii::t('app', 'City'),
            'zipcode' => Yii::t('app', 'Zipcode'),
            'country' => Yii::t('app', 'Country'),
            'state' => Yii::t('app', 'State'),
        ];
    }
}
