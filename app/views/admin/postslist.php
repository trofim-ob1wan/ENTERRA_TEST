<? include 'app/views/default/defaultHeader.php'?>

<div class="posts-panel mt-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="posts-panel-header d-flex align-items-center justify-content-between">
                    <h3 class="mb-0">Панель администратора</h3>
                    <div class="posts-panel-button">
                        <a class="btn btn-info" href="/admin/add">Добавить запись</a>
                        <a class="btn btn-danger" href="/admin/logout">Выйти</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="posts-list pl-0 mt-5 mb-0">
                <? foreach ($getAllPosts as $val): ?>
                    <div class="post mb-4 pb-4 border-bottom d-flex align-items-start">
                        <div class="post-control mr-3">
                            <img class="post-image" src="/public/img_post/<? echo $val['id']; ?>.jpg">
                            <a class="btn btn-danger mt-2 mb-2 w-100" href="delete/<? echo $val['id']; ?>">Удалить запись</a>
                            <a class="btn btn-info w-100" href="update/<? echo $val['id']; ?>">Редактировать запись</a>
                        </div>
                        <div class="post-main">
                            <h3 class="post-title"><? echo $val['title']; ?></h3>
                            <p class="post-date"><? echo $val['date']; ?></p>
                            <p class="post-description"><? echo $val['description']; ?></p>
                            <p class="post-text mb-0"><? echo $val['text']; ?></p>
                        </div>
                    </div>
                <? endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<? include 'app/views/default/defaultFooter.php';?>