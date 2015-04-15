<?php

namespace frontend\models;

use common\models\business\UserBusiness;
use common\models\db\User;
use common\models\output\Response;
use yii\base\Model;

class RegisterForm extends Model {

    public $id;
    public $username;
    public $password;
    public $repassword;
    public $firstName;
    public $lastName;
    public $email;
    public $address;
    public $phone;
    public $countryId;
    public $cityId;

    public function rules() {
        return [
            [['countryId', 'cityId','username', 'password', 'firstName','repassword', 'lastName', 'email', 'address', 'phone'], 'required'],
            [['countryId', 'cityId'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['firstName', 'lastName'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['address'], 'string', 'max' => 220],
            [['phone'], 'number'],
            ['repassword', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"],
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

    public function register() {
        if (!$this->validate()) {
            return new Response(false, 'Incorrect Data', $this->errors);
        }
        $user = UserBusiness::getByUsername($this->username);
        if ($user != null) {
            return new Response(false, 'Username already',[]);
        }
        $user = UserBusiness::getByEmail($this->email);
        if ($user != null) {
            return new Response(false, 'Email already',[]);
        }
        $user = new User();
        $user->firstName = $this->firstName;
        $user->email = $this->email;
        $user->username = $this->username;
        $user->lastName = $this->lastName;
        $user->password = md5($this->password);
        $user->phone = '0'.$this->phone;
        $user->address = $this->address;
        $user->cityId = $this->cityId;
        $user->countryId = $this->countryId;
        $user->createTime = time();
        $user->active = 1;
        if (!$user->save()) {
            return new Response(false, "Sava fail", $user->errors);
        }
        return new Response(true, "Register success", $user);
    }

}
