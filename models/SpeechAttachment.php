<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "speech_attachment".
 *
 * @property int $id
 * @property int $speech_id
 * @property string $name
 * @property string $url
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class SpeechAttachment extends \yii\db\ActiveRecord
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
        return 'speech_attachment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['speech_id', 'name', 'url'], 'required'],
            [['speech_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'speech_id' => 'Выступление',
            'name' => 'Имя файла',
            'url' => 'Ссылка на файл',
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
    public function getSpeech()
    {
        return $this->hasOne(Speech::className(), ['id' => 'speech_id']);
    }
}
