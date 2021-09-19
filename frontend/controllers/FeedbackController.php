<?php

namespace frontend\controllers;

use common\models\Feedback;
use common\models\FeedbackSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FeedbackController implements the CRUD actions for Feedback model.
 */
class FeedbackController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors() : array
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Creates a new Feedback model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSend() : string
    {
        $model = new Feedback(['scenario' => 'send']);

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->validate()) {
                if ($model->save(false)) {
                    Yii::$app->session->setFlash(
                        'success',
                        Yii::t('feedback','Your message successfully sent!')
                    );
                    $model = new Feedback(['scenario' => 'send']);
                } else {
                    Yii::$app->session->setFlash(
                        'error',
                        Yii::t('feedback','There was an error sending your message!')
                    );
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('send', [
            'model' => $model,
        ]);
    }
}
