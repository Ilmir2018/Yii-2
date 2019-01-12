<?php
/**
 * Created by PhpStorm.
 * User: Ilmir
 * Date: 12.01.2019
 * Time: 19:30
 */

namespace app\controllers;


use app\models\tables\Test;
use yii\base\Event;
use yii\web\Controller;

class EventController extends Controller
{

    public function actionIndex(){

        $handler_2 = function (){
            echo 'Подключился';
        };

        Event::on(Test::class, Test::EVENT_RUN_COMPLETE, $handler_2);
        $model = new Test();
        $model->on(Test::EVENT_RUN_COMPLETE, function (){
            echo 'Сигнал получен!';
        });

        //$model->on(Test::EVENT_RUN_COMPLETE, $handler_2);
        $model->run();
        /*$model->off(Test::EVENT_RUN_COMPLETE, $handler_2);
        $model->run();*/
        exit;
    }

}