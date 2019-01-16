<style>
    .task{
        display: block;
        border: 1px solid black;
        width: 200px;
        background-color: snow;
    }
</style>

<h1>Админка</h1>
<p>Добро пожаловать <?=$users['id']?></p>

<a class='task' href="<?= \yii\helpers\Url::to(['task/task', 'id' => $tasks->id])?>">
    <h2><?=$tasks['id']?></h2>
    <h3><?=$tasks['name']?></h3>
    <p><?=$tasks['description']?></p>
    <p><?=$tasks['date']?><p/>
</a>