<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "speech".
 *
 * @property int $id
 * @property string $name
 * @property int $speaker_id
 * @property int $sector_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Speech extends \yii\db\ActiveRecord
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
        return 'speech';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'speaker_id', 'sector_id'], 'required'],
            [['speaker_id', 'sector_id', 'status', 'created_at', 'updated_at'], 'integer'],
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
            'name' => 'Тема выступления',
            'speaker_id' => 'Выступающий', //выступающий млжет
            'sector_id' => 'Секция',
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
    public function getSpeaker()
    {
        return $this->hasOne(Speaker::className(), ['id' => 'speaker_id']);
    }
    public function getSector()
    {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }
    public function getAttachments()
    {
        return $this->hasMany(SpeechAttachment::className(), ['speech_id' => 'id'])->where(['status' => 1]);
    }
    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['object_id' => 'id']);
    }

}
