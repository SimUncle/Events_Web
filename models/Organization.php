<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "organization".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Organization extends \yii\db\ActiveRecord
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
        return 'organization';
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
            [['name'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
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
            'name' => 'Наименование орагнизации',
            'status' => 'Статус',
            'created_at' => 'Создана',
            'updated_at' => 'Обновлена',
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
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id']);
    }
}
