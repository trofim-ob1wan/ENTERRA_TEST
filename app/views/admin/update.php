<? include 'app/views/default/defaultHeader.php'?>

<div class="posts-panel mt-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="posts-panel-header d-flex align-items-center justify-content-between">
                    <h3 class="mb-0"><? echo $title;?></h3>
                    <div class="posts-panel-button">
                        <a class="btn btn-info" href="/admin/">Вернутся на главную</a>
                        <a class="btn btn-danger" href="/admin/logout">Выйти</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col">
            <form class="form mt-4" action="/admin/update/<?php echo $data['id']; ?>" method="POST">
              <div class="form-group">
                <label for="input-title">Заголовок</label>
                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['title'], ENT_QUOTES); ?>" name="name" id="input-title" placeholder="Введите заголовок">
              </div>
              <div class="form-group">
                <label for="input-description">Описание</label>
                <input class="form-control" type="text"value="<?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?>" name="description" id="input-description" placeholder="Введите описание">
              </div>
              <div class="form-group">
                <label for="input-text">Текст</label>
                <textarea class="form-control" id="input-text" rows="4" name="text"><?php echo htmlspecialchars($data['text'], ENT_QUOTES); ?></textarea>
              </div>
              <div class="form-group">
                <label for="input-file">Картинка для поста</label>
                <input type="file" name="img" class="form-control-file" id="input-file">
              </div>
              <button class="form-add btn btn-success p-2 w-100" type="submit">Редактировать</button>
            </form>
          </div>
        </div>
    </div>
</div>

<? include 'app/views/default/defaultFooter.php';?>


