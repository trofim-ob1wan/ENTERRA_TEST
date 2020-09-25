<? include 'app/views/default/defaultHeader.php';?>

<div class="form-login-block container-fluid d-flex align-items-center justify-content-center">
  <div class="row">
    <div class="col">
      <form class="form-login" action="/admin" method="POST">
        <h2 class="form-login-title">Войдите в аккаунт</h2>
        <div class="form-group">
          <label for="input-login">Логин</label>
          <input class="form-control" type="text" name="name" id="input-login" placeholder="Введите логин">
        </div>
        <div class="form-group">
          <label for="input-password">Пароль</label>
          <input class="form-control" type="password" name="password" id="input-password" placeholder="Введите пароль">
        </div>
        <button class="form-login-enter btn btn-success" type="submit">Войти</button>
      </form>
    </div>
  </div>
</div>

<? include 'app/views/default/defaultFooter.php';?>
