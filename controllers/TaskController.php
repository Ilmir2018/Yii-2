<?php
/**
 * Created by PhpStorm.
 * User: Ilmir
 * Date: 17.12.2018
 * Time: 17:08
 */

namespace app\controllers;


use yii\web\Controller;

class TaskController extends Controller
{

    public function actionIndex()
    {
        var_dump(\Yii::$app->request->get('id'));
        return $this->render('index', [
            'title' => 'sdfsdfsdfsdf',
            'content' => 'sdfsdfsdfdsf'
        ]);
    }
}