<?php

namespace app\models;

use app\models\Registration;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property string $name
 * @property string $date_start
 * @property string $date_end
 * @property int|null $have_test
 * @property string|null $address
 * @property string|null $map
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Event extends \yii\db\ActiveRecord
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
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'date_start', 'date_end'], 'required'],
            [['date_start', 'date_end'], 'safe'],
            [['have_test','status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'map'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 1000],
//            [['date_start', 'date_end'], 'date'],
            [['date_end', 'date_start'], 'validateDate'],
        ];
    }
    public function validateDate(){

//        $currentDate = Yii::$app->formatter->asDate(time());

        if ($this->date_start > $this->date_end){
            $this->addError('date_begin', '"Проверьте дату окончания"');
            $this->addError('date_end', '"Дата окончания", не может быть раньше "даты начала"');
        }

//        if ($currentDate > $this->date_start) {
//            $this->addError('date_begin', '"Дата начала", не может быть раньше текущей даты');
//        }
//
//        if ($currentDate > $this->date_end){
//            $this->addError('date_end', '"Дата окончания", не может быть раньше текущей даты');
//        }

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'date_start' => 'Дата начала',
            'date_end' => 'Дата окончания',
            'have_test' => 'Наличие теста',
            'address' => 'Адрес проведения',
            'map' => 'Как добраться',
            'status' => 'Статус',
            'created_at' => 'Создана',
            'updated_at' => 'Обновлена',
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


    public function getRegistration()
    {
        return $this->hasOne(Registration::className(), ['id' => 'event_id']);
    }
    public function getSectors()
    {
        return $this->hasMany(Sector::className(), ['event_id' => 'id'])->where(['status' => 1]);
    }
    public static function activeList()
    {
        return ArrayHelper::map(self::find()->where(['status' => 1])->all(), 'id', 'name');
        //->where(['status' => 1]) посде статуса
    }
//    public static function activeTest()
//    {
//        return ArrayHelper::map(self::find()->where(['status' => 1])->all(), 'id', 'have_test');
//        //->where(['status' => 1]) посде статуса
//    }
    public function getTests()
    {
        return $this->hasMany(Test::className(), ['event_id' => 'id'])->where(['status' => 1]);
    }
//    public function getResult()
//    {
//        return $this->hasOne(TestResult::className(), ['event_id' => 'id']);
//    }
    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['object_id' => 'id']);
    }
    public function getAttachments()
    {
        return $this->hasMany(EventAttachment::className(), ['event_id' => 'id'])->where(['status' => 1]);
    }
    public function isRegistered(){
        $count = Registration::find()->where(['user_id' => Yii::$app->user->id])
            ->andWhere(['event_id'=> $this->id])->count();
        if ($count) return true;
        else return false;
    }
}
