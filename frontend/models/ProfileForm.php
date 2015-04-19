<?php

namespace frontend\models;

use common\models\business\UserBusiness;
use common\models\db\User;
use common\models\output\Response;
use yii\base\Model;

class ProfileForm extends Model {

    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $address;
    public $phone;
    public $countryId;
    public $cityId;

    public function rules() {
        return [
            [['countryId', 'cityId', 'firstName', 'lastName', 'email', 'address', 'phone'], 'required'],
            [['countryId', 'cityId'], 'integer'],
            [['firstName', 'lastName'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['address'], 'string', 'max' => 220],
            [['phone','id'], 'number'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'email' => 'Email',
            'address' => 'Address',
            'phone' => 'Phone',
            'countryId' => 'Country',
            'cityId' => 'City',
        ];
    }

    public function change() {
        if (!$this->validate()) {
            return new Response(false, 'Incorrect Data', $this->errors);
        }
        $user = UserBusiness::get($this->id);
        if (empty($user)) {
            return new Response(false, 'Account not found', []);
        }
        if ($this->email != $user->email) {
            $user = UserBusiness::getByEmail($this->email);
            if ($user != null) {
                return new Response(false, 'Email already', []);
            }
        }
        $user->firstName = $this->firstName;
        $user->email = $this->email;
        $user->lastName = $this->lastName;
        $user->phone = '0' . $this->phone;
        $user->address = $this->address;
        $user->cityId = $this->cityId;
        $user->countryId = $this->countryId;
        if (!$user->save()) {
            return new Response(false, "Sava fail", $user->errors);
        }
        return new Response(true, "Change profile success", $user);
    }

}
