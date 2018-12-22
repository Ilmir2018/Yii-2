<?php
/**
 * Created by PhpStorm.
 * User: Ilmir
 * Date: 18.12.2018
 * Time: 11:38
 */

namespace app\controllers;


use app\models\Task;
use yii\web\Controller;

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
        return $this->render('index', [
            'title' => 'Yii2',
            'content' => 'Приветствие дорогой друг! Ты начинаешь изучать Yii!'
        ]);
    }
}