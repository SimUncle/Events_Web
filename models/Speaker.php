<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "speaker".
 *
 * @property int $id
 * @property string $name
 * @property string $photo
 * @property string $profession
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Speaker extends \yii\db\ActiveRecord
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
        return 'speaker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'photo', 'profession'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'photo' => 'Фото',
            'profession' => 'Должность',
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
    public function getSpeeches()
    {
        return $this->hasMany(Speech::className(), ['speaker_id' => 'id']);
    }
}
