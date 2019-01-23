<style>
    h1{
        margin-left: 40px;
    }
    .admin{
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }
</style>
<?php
use yii\helpers\Html;
?>
<h1>Админка</h1>
<p>
    <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?php
$tasks = \app\models\tables\Tasks::find();
?>
<div class="admin">
<?php
echo \yii\widgets\ListView::widget([
    //Получаем коллекцию моделей
    'dataProvider' => $dataProvider,
    //Название шаблона которе применяется для каждой модели
    'itemView' => function($tasks){
        return \app\widgets\AdminWidget::widget(['tasks' => $tasks]);
    },
    'summary' => false,
    'options' => [
            'class' => 'admin'
    ]
]);
?>
</div>