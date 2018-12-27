<?php
/**
 * Created by PhpStorm.
 * User: Ilmir
 * Date: 18.12.2018
 * Time: 11:38
 */

namespace app\controllers;

use Yii;
use app\models\Task;
use yii\web\Controller;
use app\models\filters\TasksSearch;


class TaskController extends Controller
{

    public function actionIndex()
    {
       //$model = new Task();

       /*$model->answerable = 5;
        $model->status = 'sdfsdf';
        $model->task = 'xax';
        var_dump($model->validate());
       var_dump($model->getErrors()); exit;*/

        /*$model->load([
            'Task' =>
            [
            'answerable' => 24324324,
            'status' => 'sdfsdf@sg',
            'task' => 'sdfsdfsdf'
            ]
        ]);

        var_dump($model); exit;*/

       // $model->name = 5;
       // var_dump($model->validate());
        //var_dump($model->getErrors());
        //exit;
        //var_dump(\Yii::$app->request->get());


        /*$res = \Yii::$app->db->createCommand("
        SELECT * FROM tasks"
        )->queryAll();
        var_dump($res);*/

        $searchModel = new TasksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTask(){
            return $this->render('task');
    }
}