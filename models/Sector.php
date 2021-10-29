<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sector".
 *
 * @property int $id
 * @property string $name
 * @property string|null $text
 * @property int $event_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Sector extends \yii\db\ActiveRecord
{
    public static $statusList = [
        1 => 'Активен',
        0 => 'Не активен'
    ];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sector';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'event_id'], 'required'],
            [['text'], 'string'],
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
            'name' => 'Наименование секции',
            'text' => 'Информация о секции',
            'event_id' => 'Мероприятие',
            'status' => 'Статус',
            'created_at' => 'Создана',
            'updated_at' => 'Обновлена',
        ];
    }
    public function getStatusName()
    {
        return ArrayHelper::getValue(self::$statusList, $this->status);
    }

//    public function getEventName()
//    {
//        return $this->
//    }

    public static function activeList()
    {
        return ArrayHelper::map(self::find()->where(['status' => 1])->all(), 'id', 'name');
    }
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }
    public function getSpeeches()
    {
        return $this->hasMany(Speech::className(), ['sector_id' => 'id'])->where(['status' => 1]);
    }
}
