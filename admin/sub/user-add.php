<?php
  include '../config/db.php';
  $conn->query("SET NAMES 'utf8'");
?>

<div class="jumbotron row box-shadow">
  <div class="col-12">
    <div class="view-db">
      <div class="box-shadow" style="padding: 10px;">
        <h1 class="display-4">Dodaj użytkownika</h1><hr>
        <form class="form-group" action="/admin/?s=user-add-sql" method="post">
          <label>Login użytkownika</label>
          <input class="form-control" type="text" name="usr-login" placeholder="example(@expl4ined.eu)"><br>
          <input class="btn btn-outline-secondary" type="submit" value="Dodaj">
        </form>
      </div>
    </div>
  </div>
</div>
