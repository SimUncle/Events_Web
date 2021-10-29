<?php

namespace app\controllers;

use app\models\Comment;
use app\models\Registration;
use app\models\Test;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\BaseActiveRecord;
use yii\web\Controller;

class AjaxController extends Controller
{
    public function actionComment($type, $object_id)
    {
        $model = new Comment();
        $model->type = $type;
        $model->object_id = $object_id;
        $model->user_id = Yii::$app->user->id;
        $model->score = 5;

        if (Yii::$app->request->isPost) {
            //тут сохранение формы
            if ($model->load(Yii::$app->request->post()) && $model->save()) {

            }

            return $this->redirect(Yii::$app->request->referrer);
        } elseif (Yii::$app->request->isAjax) {
            //тут вывод окна

            return $this->renderAjax('comment', [
                'model' => $model
            ]);
        } else
            return null;
    }

    public function actionRegistration($event_id)
    {
        $model = new Registration();
        $model->user_id = Yii::$app->user->id;
        $model->event_id = $event_id;


        if (Yii::$app->request->isPost) {
            $model->save();
            return $this->redirect(['event/view', 'id'=> $event_id]);
        } elseif (Yii::$app->request->isAjax) {

            return $this->renderAjax('registration',
                [
                    'model' => $model
                ]);
        } else
            return null;
    }
    public function actionTest($id)
    {
        $model = Test::findOne($id);
        if (Yii::$app->request->isPost) {
            return $this->redirect(['event/test', 'id'=> $id]);
        } elseif (Yii::$app->request->isAjax) {

            return $this->renderAjax('test',
                [
                    'id' => $id,
                    'model' => $model
                ]);
        } else
            return null;
    }
}