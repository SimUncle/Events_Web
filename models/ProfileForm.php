<?php


namespace app\models;


use Yii;
use yii\base\Model;

class ProfileForm extends Model
{
    public $username;
    public $fio;
    public $organization_id;
    public $password;
    public $idRecord;
    public $email;
    public $password_repeat;

    public function rules()
    {
        return [
            [['username', 'fio'], 'trim'],
            [['username', 'fio', 'organization_id'], 'required'],
            [['password', 'password_repeat'], 'required'],
            [['username', 'fio'], 'string', 'min' => 3, 'max' => 255],
            ['organization_id', 'integer'],
            [['email'], 'email'],
            ['username', 'unique', 'filter' => $this->idRecord ? ['!=', 'id', $this->idRecord] : '', 'targetClass' => '\app\models\User', 'message' => 'Аккаунт с таким логином уже существует'],
            ['password', 'string', 'min' => 4],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => "Пароли не совпадают"],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Измените логин',
            'fio' => 'Измените ФИО',
            'email' => 'Измените email',
            'organization_id' => 'Изменить организацию',
            'password' => 'Введите новый пароль',
            'password_repeat' => 'Повторите новый пароль'
        ];
    }


    public function updateProfile()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = Yii::$app->user->identity;
        $user->username = $this->username;
        $user->fio = $this->fio;
        $user->email = $this->email;
        $user->organization_id = $this->organization_id;

        if($this->password)
        {
            $user->setPassword($this->password);
            $user->generateAuthKey();
        }
        return $user->save();
    }

}