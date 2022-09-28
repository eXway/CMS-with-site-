<?php
  include '../config/db.php';
  $conn->query("SET NAMES 'utf8'");
?>

<div class="jumbotron row box-shadow">
  <div class="col-lg-5 col-12">
    <div class="view-db">
      <div class="box-shadow" style="padding: 10px;">
        <h1 class="display-4">Zmiana hasła</h1><hr>
        <form class="form-group" action="/admin/?s=passChange" method="post">
          <label>Aktualne hasło</label>
          <input class="form-control" type="password" name="old-pass" placeholder="Aktualne hasło"><br>
          <label>Nowe hasło</label>
          <input class="form-control" type="password" name="new-pass" placeholder="Nowe hasło"><br>
          <input class="btn btn-outline-secondary" type="submit" value="Zmień hasło">
        </form>
      </div>
    </div>
  </div>

  <div class="col-lg-7 col-12">
    <div class="view-db">
      <div class="box-shadow" style="padding: 10px;">
        <h1 class="display-4">Zmiana aliasu</h1><hr>
        <form class="form-group" action="/admin/?s=aliasChange" method="post">
          <label>Nowy alias</label>
          <input class="form-control" type="text" name="new-alias" placeholder="Alias"><br>
          <input class="btn btn-outline-secondary" type="submit" value="Zmień alias">
        </form>
      </div>
    </div>

  </div>
  <hr>
</div>
