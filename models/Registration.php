<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\BaseActiveRecord;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "registration".
 *
 * @property int $id
 * @property int $user_id
 * @property int $event_id
 * @property string $date
 */
class Registration extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'event_id'], 'required'],
//            ['date', 'date', 'format' => 'php:Y-m-d H:i:s'],
            [['date'], 'date'],
            [['user_id', 'event_id'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'event_id' => 'Мероприятие',
            'date' => 'Дата регистрации',
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
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
//    public function isRegistered(){
//
//    }

//    public static function eventList()
//    {
//        return ArrayHelper::map(self::find()->all(), 'id', 'name');
//    }
//    public static function userList()
//    {
//        return ArrayHelper::map(self::find()->all(), 'id', 'name');
//    }
}
