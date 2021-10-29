<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\base\Behavior;
use yii\db\BaseActiveRecord;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property int $user_id
 * @property string $email
 * @property string $text
 * @property string $date
 */
class Feedback extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'email', 'text'], 'required'],
            [['user_id', 'date'], 'integer'],
            [['email'], 'email'],
            [['date'], 'safe'],
            [['email'], 'string', 'max' => 255],
            [['text'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь', //пока без имени
            'email' => 'Email',
            'text' => 'Сообщение',
            'date' => 'Дата',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => ['date'],
                    BaseActiveRecord::EVENT_BEFORE_UPDATE => false,

                ],
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function contact()
    {
        $this->user_id = Yii::$app->user->id;
        return $this->save();
    }

}
