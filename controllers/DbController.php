<?php
/**
 * Created by PhpStorm.
 * User: Ilmir
 * Date: 21.12.2018
 * Time: 15:57
 */

namespace app\controllers;


use app\models\tables\Tasks;
use app\models\Task;
use yii\db\Query;
use yii\web\Controller;

class DbController extends Controller
{
    public function actionIndex(){
        /*\Yii::$app->db->createCommand("
        INSERT INTO test (title, content) VALUES ('dsgfdgdfsgfd', 'sfsdfdsfdf')"
        )->execute();*/

        /*$res = \Yii::$app->db->createCommand("
        SELECT * FROM users WHERE id = :id"
        )->bindValue(":id", 1)
            ->queryAll();
        var_dump($res);*/

/*        $res = \Yii::$app->db->createCommand("
        SELECT * FROM test"
        )->queryAll();*/

/*        $res = \Yii::$app->db->createCommand("
        SELECT id FROM test"
        )->queryColumn();*/

/*        $res = \Yii::$app->db->createCommand("
        SELECT count(*)FROM test"
        )->queryScalar();

        var_dump($res);*/
    }


    public function actionArr()
    {
/*        $model = new Tasks();

        $model->name = "new Task4";
        $model->description = "sdfdsfds";
        $model->date = date("Y-m-d");
        $model->responsible_id = 10;
        $model->save();*/

        //$model = Tasks::findOne(['name' => 'new Task4']);
      /*  $model = Tasks::find()->all();
        var_dump($model);*/

        /*$model = Tasks::findOne(6);
        $model->description = 'fsdfsdfsdfsdfsdf';
        $model->save();*/

        /*$model = Tasks::findOne(6);
        $model->delete();*/

    }

    public function actionFind(){
       /* $tasks = Tasks::find();
        var_dump($tasks);*/

        /*$query = new Query();

        $query->select(['id'])
            ->from('task');

        var_dump($query);*/

        /*$tasks = Tasks::findOne(7);
        var_dump($tasks->getTest());*/

        $tasks = Tasks::find()
            ->with("user")->all();

        foreach ($tasks as $task){
         var_dump($task->user->login);
        }

 /*       $tasks = Tasks::find()->with("user")->all();
        foreach ($tasks as $task){
            var_dump($task->getUser());
        }*/
    }
}