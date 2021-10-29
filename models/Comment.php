<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\BaseActiveRecord;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $text
 * @property int $score
 * @property int $user_id
 * @property int|null $type
 * @property int $object_id
 * @property string $date
 */
class Comment extends \yii\db\ActiveRecord
{
    public static $scopeList = [
        1 => 'Неудовлетворительно',
        2 => 'Не очень',
        3 => 'Нейтрально',
        4 => 'Хорошо',
        5 => 'Отлично',
    ];

    /**
     * @var mixed|null
     */
    private $user;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'score', 'user_id', 'object_id'], 'required'],
            [['score', 'user_id', 'type', 'object_id'], 'integer'],
            [['date'], 'safe'],
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
            'text' => 'Текст отзыва',
            'score' => 'Оценка',
            'user_id' => 'Пользователь',
            'type' => 'Тип мероприятия',
            'object_id' => 'Название',
            'date' => 'Дата отзыва',
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

    public function getObject()
    {
        if($this->type) return $this->hasOne(Speech::className(), ['id' => 'object_id']);
        else return $this->hasOne(Event::className(), ['id' => 'object_id']);
    }
}
