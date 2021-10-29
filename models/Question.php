<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property string $text
 * @property int $time
 * @property int $num
 * @property int $test_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Question extends \yii\db\ActiveRecord
{
    public static $statusList = [
        1 => 'Активен',
        0 => 'Не активен',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'test_id'], 'required'],
            [['text'], 'string'],
            [['time', 'num', 'test_id', 'status', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Текст вопроса',
            'time' => 'Время на ответ',
            'num' => 'Номер вопроса',
            'test_id' => 'Принадлежит тесту',
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

    public function getTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'test_id']);
    }
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['question_id' => 'id'])
            ->where(['status' => 1])
            ->orderBy([
                'num' => SORT_ASC
            ]);
    }
    public function getResult()
    {
        return $this->hasOne(TestResult::className(), ['question_id' => 'id']);
    }
    public static function activeList()
    {
        return ArrayHelper::map(self::find()->where(['status' => 1])->all(), 'id', 'text');
    }


}
