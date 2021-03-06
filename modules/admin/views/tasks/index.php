<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\TasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        //Поиск по моделям
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'date',
            'description:ntext',
            'responsible_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    echo \app\widgets\MyWidget::widget([
        'label' => 'Не нажимай...'
    ]);*/
    echo \yii\widgets\ListView::widget([
        //Получаем коллекцию моделей
        'dataProvider' => $dataProvider,
        //Название шаблона которе применяется для каждой модели
        'itemView' => 'view'
    ]);
    ?>
</div>
