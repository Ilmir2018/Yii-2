<?php
/**
 * Created by PhpStorm.
 * User: Ilmir
 * Date: 16.01.2019
 * Time: 22:57
 */

namespace app\controllers;


use app\models\tables\Tasks;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class AdminController extends Controller
{

    public function actionIndex(){


        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find()->where(['responsible_id' => \Yii::$app->user->id])
        ]);

        $cache = \Yii::$app->cache;

        $key = 'task';

        if ($cache->exists($key)){
            $task = $cache->get($key);
        }else{
            $task = $dataProvider;
            $cache->set($key, $task, 100);
        }

        return $this->render('index', [
            'dataProvider' => $task,
        ]);
    }

}