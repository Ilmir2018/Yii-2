<style>
    .task{
        display: block;
        border: 1px solid black;
        width: 200px;
        background-color: snow;
    }
</style>


<a class='task' href='task'>
    <h2><?=$data['id']?></h2>
    <h3><?=$data['name']?></h3>
    <p><?=$data['description']?></p>
    <p><?=$data['date']?><p/>
</a>