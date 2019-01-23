<?php
/**
 * Created by PhpStorm.
 * User: Ilmir
 * Date: 18.12.2018
 * Time: 11:38
 */

namespace app\controllers;

use app\models\forms\TaskAttachmentsAddForm;
use app\models\tables\TaskComments;
use app\models\tables\Tasks;
use app\models\tables\TaskStatuses;
use app\models\tables\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;


class TaskController extends Controller
{

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find()
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionOne($id){

        return $this->render('one', [
            'model' => Tasks::findOne($id),
            'usersList' => Users::getUsersList(),
            'statusesList' => TaskStatuses::getList(),
            'userId' => \Yii::$app->user->id,
            'taskCommentForm' => new TaskComments(),
            'taskAttachmentForm' => new TaskAttachmentsAddForm(),
        ]);
    }

    public function actionSave($id)
    {
        if ($model = Tasks::findOne($id)){
            $model->load(\Yii::$app->request->post());
            $model->save();
            \Yii::$app->session->setFlash('success', 'Изменения сохранены');
        }else{
            \Yii::$app->session->setFlash('error', 'Не удалось сохранить изменения');
        }
        $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionAddComment()
    {
        $model = new TaskComments();
        if($model->load(\Yii::$app->request->post()) && $model->save()){
            \Yii::$app->session->setFlash('success', "Комментарий добавлен");
        }else {
            \Yii::$app->session->setFlash('error', "Не удалось добавить комментарий");
        }
        $this->redirect(\Yii::$app->request->referrer);

    }


    public function actionAddAttachment()
    {
        $model = new TaskAttachmentsAddForm();
        $model->load(\Yii::$app->request->post());
        $model->file = UploadedFile::getInstance($model, 'file');
        if($model->save()){
            \Yii::$app->session->setFlash('success', "Файл добавлен");
        }else {
            \Yii::$app->session->setFlash('error', "Не удалось добавить файл");
        }
        $this->redirect(\Yii::$app->request->referrer);
    }

}