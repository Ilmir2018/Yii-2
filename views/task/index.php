<?php

$model = \app\models\tables\Tasks::findOne(2);

echo \yii\widgets\ListView::widget([
    //Получаем коллекцию моделей
    'dataProvider' => $dataProvider,
    //Название шаблона которе применяется для каждой модели
    'itemView' => function($model){
        return \app\widgets\MyWidget::widget(['model' => $model]);
    },
    'summary' => false,
    'options' => [
        'class' => 'preview-container'
    ]
]);