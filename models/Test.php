<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property string $name
 * @property int $event_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Test extends \yii\db\ActiveRecord
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
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'event_id'], 'required'],
            [['event_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'event_id' => 'Мероприятие',
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
        return ArrayHelper::map(self::find()->where(['status' => 1])->all(), 'id', 'name');
    }

    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }

    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['test_id' => 'id'])
            ->where(['status' => 1])
            ->orderBy([
                'num' => SORT_ASC
            ]);
    }

    //зачем это?
//    public function getTestResult()
//    {
//        return $this->hasOne(TestResult::className(), ['test_id' => 'id']);
//    }
//    public function isEnded(){
//        $count = TestResult::find()->where(['user_id' => Yii::$app->user->id])
//            ->andWhere(['event_id'=> $this->id])->count();
//        if ($count) return true;
//        else return false;
//    }
}
