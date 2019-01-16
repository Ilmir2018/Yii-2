<style>
    .task{
        display: block;
        border: 1px solid black;
        width: 200px;
        background-color: snow;
    }
</style>

<a class='task' href="<?= \yii\helpers\Url::to(['task/task', 'id' => $model->id])?>">
    <h2><?=$model['id']?></h2>
    <h3><?=$model['name']?></h3>
    <p><?=$model['description']?></p>
    <p><?=$model['date']?><p/>
</a>