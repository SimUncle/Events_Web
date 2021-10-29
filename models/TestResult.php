<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_result".
 *
 * @property int $id
 * @property string $user_id
 * @property int $event_id
 * @property int $test_id
 * @property int $question_id
 * @property int $answer_id
 * @property int $time
 */
class TestResult extends \yii\db\ActiveRecord
{
//    /**
//     * @var mixed|null`
//     */
//    private $question;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'event_id', 'test_id', 'question_id'], 'required'],
            [['user_id', 'event_id', 'test_id', 'question_id', 'answer_id', 'time'], 'integer'],
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
            'test_id' => 'Тест',
            'question_id' => 'Вопрос',
            'answer_id' => 'Ответ',
            'time' => 'Время',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }
    public function getTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'test_id']);
    }
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }
    public function getAnswer()
    {
        return $this->hasOne(Answer::className(), ['id' => 'answer_id']);
    }

    /**
     * @param $test_id
     * @param $question_id
     * @return array|null|TestResult
     */
    public static function findAnswer($test_id,$question_id)
    {
        return TestResult::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->andWhere(['test_id' => $test_id])
            ->andWhere(['question_id' => $question_id])
            ->one();
    }

    public static function start($test_id,$question_id,$event_id)
    {
        $model = new TestResult();
        $model->user_id = Yii::$app->user->id;
        $model->event_id = $event_id;
        $model->test_id = $test_id;
        $model->question_id = $question_id;

        return $model->save();
    }

    public static function stop($test_id,$question_id,$answer_id,$time)
    {
        /* @var $model TestResult */
        $model = TestResult::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->andWhere(['test_id' => $test_id])
            ->andWhere(['question_id' => $question_id])
            ->one();

        if(!$model) return false;

        $model->answer_id = $answer_id;
        $model->time = $time;

        return $model->save();
    }

    public static function countCorrect($test_id){
        /* @var $models TestResult */
        $models = TestResult::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->andWhere(['test_id' => $test_id])
            ->all();
        $count = 0;
        foreach ($models as $model){
            if ((isset($model->answer)) and ($model->answer->is_correct)) $count++;
        }
        return $count;
    }

    public static function countAll($test_id){
        return TestResult::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->andWhere(['test_id' => $test_id])
            ->count();
    }
}
