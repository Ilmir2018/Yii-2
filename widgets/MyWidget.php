<?php
/**
 * Created by PhpStorm.
 * User: Ilmir
 * Date: 25.12.2018
 * Time: 12:27
 */

namespace app\widgets;
use yii\base\Widget;


class MyWidget extends Widget
{
    public $title;

    public function run(){
        $tasks = \Yii::$app->db->createCommand("
        SELECT `name`, `description`, id, `date` FROM tasks WHERE id = {$this->title}"
        )->queryAll();

        foreach ($tasks as $task){
            return $this->render('tasks', ['data' => $task]);
        }
    }
}