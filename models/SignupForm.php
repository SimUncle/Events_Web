<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $fio;
    public $organization_id;
    public $password;
    public $password_repeat;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'fio', 'email'], 'trim'],
            [['username', 'fio', 'organization_id', 'email'], 'required'],
            [['username', 'fio'], 'string', 'min' => 3, 'max' => 255],
            ['organization_id', 'integer'],
//            ['email', 'trim'],
//            ['email', 'required'],
            ['email', 'email'],
//            ['email', 'string', 'min' => 2, 'max' => 255],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Аккаунт с таким логином уже существует'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Аккаунт с такой почтой уже существует'],
            [['password', 'password_repeat'], 'required'],
            ['password', 'string', 'min' => 4],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => "Пароли не совпадают"],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'email' => 'Почта',
            'fio' => 'ФИО',
            'organization_id' => 'Организация',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите паролль'
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->fio = $this->fio;
        $user->email = $this->email;
        $user->organization_id = $this->organization_id;
//        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }

}