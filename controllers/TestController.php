<?php
/**
 * Created by PhpStorm.
 * User: Ilmir
 * Date: 24.12.2018
 * Time: 17:03
 */

namespace app\controllers;


use app\models\tables\Test;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex(){
        $model = new Test();
        return $this->render('index', ['model' => $model]);
    }
}