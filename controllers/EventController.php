<?php

namespace app\controllers;

use app\models\Answer;
use app\models\Event;
use app\models\Registration;
use app\models\Sector;
use app\models\Speaker;
use app\models\Speech;
use app\models\Test;
use app\models\TestResult;
use app\models\TestUser;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class EventController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $events = Event::find()
            ->where(['>', 'status', 0])
            ->andWhere(['>=','date_end',date('Y-m-d H:i:s')])
            ->orderBy('date_start ASC')
            ->limit(100)
            ->all();
        return $this->render('index', [
            'events' => $events
        ]);
    }

    public function actionView($id)
    {
        $event = Event::findOne($id);
        if (!$event)  throw new NotFoundHttpException('Такого мероприятия не существует');

        return $this->render('view', [
            'event' => $event,
        ]);
    }

    public function actionSection($id)
    {
        $section = Sector::findOne($id);
        if (!$section)  throw new NotFoundHttpException('Такой страницы не существует');


        return $this->render('section', [
            'section' => $section
        ]);
    }

    public function actionSpeaker($id)
    {
        $speech = Speech::findOne($id);
        if (!$speech)  throw new NotFoundHttpException('Такой страницы не существует');


        return $this->render('speaker', [
            'speech' => $speech
        ]);
    }

    public function actionTest($id)
    {
        $session = Yii::$app->session;
        $test = Test::findOne($id);

        $timer = $session->get('timer');
        if(Yii::$app->request->isPost)
        {
            //записываем ответ
            $answer = Yii::$app->request->post('answer');
            $model = Answer::findOne($answer);
            if($model)
            {
                $time = time() - $timer;
                $flag = TestResult::stop($test->id,$model->question_id,$model->id,$time);
                if($flag)
                {
                    //если успешно сбрасываем время таймера
                    $session->remove('timer');
                }
            }

            return $this->redirect(Yii::$app->request->referrer);
        }
        //ищем первый неотвеченный вопрос
        $q = null;
        $questions = $test->questions;
        foreach ($questions as $question)
        {
            $res = TestResult::findAnswer($test->id,$question->id);
            if(!$res)
            {
                $q = $question;
                TestResult::start($test->id,$q->id,$test->event_id);
                TestUser::start($test->id);

                $session->set('timer', time());
                $timer = $session->get('timer');
                break;
            }elseif(is_null($res->answer_id))
            {
                $q = $question;
                //если не успел за отведенное время - закрываем
                if($timer > 0 && $q->time > 0 && ($timer + $q->time < time()))
                {
                    $flag = TestResult::stop($test->id,$q->id,0,0);
                    if($flag) $session->remove('timer');

                    return $this->redirect(['test','id' => $test->id]);
                }
                break;
            }
        }
        //если все вопросы отвечены редиректим на сообщение, что тест пройден
        if(is_null($q))
        {
            TestUser::finish($test->id);
            $session->remove('timer');
            return $this->redirect(['event/view','id' => $test->event_id, '#'=>'pills-tests']);
        }

        return $this->render('test', [
            'test' => $test,
            'q' => $q,
            'timer' => $timer,
        ]);
    }
}