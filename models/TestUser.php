<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_user".
 *
 * @property int $id
 * @property int $test_id
 * @property int $user_id
 * @property int $date_start
 * @property int $date_end
 */
class TestUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test_id', 'user_id', 'date_start', 'date_end'], 'required'],
            [['test_id', 'user_id', 'date_start', 'date_end'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_id' => 'Test ID',
            'user_id' => 'User ID',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
        ];
    }

    public static function isComplete($test_id)
    {
        return self::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->andWhere(['test_id' => $test_id])
            ->andWhere(['>','date_end', 0])
            ->count();
    }

    public static function start($test_id)
    {
        $user_id = Yii::$app->user->id;
        $model = self::findOne(['user_id' => $user_id, 'test_id' => $test_id]);
        if($model) return true;

        $model = new self();
        $model->user_id = $user_id;
        $model->test_id = $test_id;
        $model->date_start = time();
        $model->date_end = 0;

        return $model->save();
    }

    public static function finish($test_id)
    {
        $user_id = Yii::$app->user->id;
        $model = self::findOne(['user_id' => $user_id, 'test_id' => $test_id]);

        if(!$model) return false;
        $model->date_end = time();

        return $model->save();
    }
}
