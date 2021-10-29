<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "answer".
 *
 * @property int $id
 * @property string $text
 * @property int $num
 * @property int $question_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $is_correct
 */
class Answer extends \yii\db\ActiveRecord
{
    public static $statusList = [
        1 => 'Активен',
        0 => 'Не активен',
        -1 => 'Удален',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'question_id', 'is_correct'], 'required'],
            [['text'], 'string'],
            [['num', 'question_id', 'status', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Текст Ответа',
            'num' => 'Номер ответа',
            'question_id' => 'К вопросу...',
            'is_correct' => 'Верный?',
            'status' => 'Статус',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    public function getStatusName()
    {
        return ArrayHelper::getValue(self::$statusList, $this->status);
    }
    public static function activeList()
    {
        return ArrayHelper::map(self::find()->where(['status' => 1])->all(), 'id', 'text');
    }
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }
    public function getResult()
    {
        return $this->hasOne(TestResult::className(), ['answer_id' => 'id']);
    }


}
