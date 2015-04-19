<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property integer $createTime
 * @property string $firstName
 * @property integer $activeKey
 * @property integer $active
 * @property string $lastName
 * @property string $email
 * @property string $address
 * @property string $phone
 * @property integer $countryId
 * @property integer $cityId
 */
class User extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'password', 'createTime', 'firstName', 'lastName', 'email', 'address', 'phone'], 'required'],
            [['createTime', 'activeKey', 'active', 'countryId', 'cityId'], 'integer'],
            [['username', 'password'], 'string', 'max' => 50],
            [['firstName', 'lastName'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 150],
            [['address'], 'string', 'max' => 220],
            [['phone'], 'string', 'max' => 45],
            [['email'], 'unique'],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'createTime' => 'Create Time',
            'firstName' => 'First Name',
            'activeKey' => 'Active Key',
            'active' => 'Active',
            'lastName' => 'Last Name',
            'email' => 'Email',
            'address' => 'Address',
            'phone' => 'Phone',
            'countryId' => 'Country ID',
            'cityId' => 'City ID',
        ];
    }

    public function attributes() {
        return array_merge(parent::attributes(), ['countryName','cityName','images']);
    }

}
