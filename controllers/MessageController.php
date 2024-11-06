<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Message;
use yii\web\NotFoundHttpException;

class MessageController extends Controller
{
    public function actionCreate()
    {
        $model = new Message();
        $chat_id = Yii::$app->params['telegramChatId'];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->telegram->sendMessage([
                'chat_id' => $chat_id,
                'text' => $model->text, 
            ]);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
    }

    public function actionView($id)
    {
        $model = Message::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

}
