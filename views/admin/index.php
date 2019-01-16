<?php

$tasks = \app\models\tables\Tasks::findOne(2);
$users = \app\models\tables\Users::findOne(1);

echo \yii\widgets\ListView::widget([
    //Получаем коллекцию моделей
    'dataProvider' => $dataProvider,
    //Название шаблона которе применяется для каждой модели
    'itemView' => function($tasks, $users){
        return \app\widgets\AdminWidget::widget(['tasks' => $tasks, 'users' => $users]);
    },
    'summary' => false
]);