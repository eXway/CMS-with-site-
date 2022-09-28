<div class="row">
  <div class="col-lg-3"> </div>
  <div class="col-lg-6 col-md-12">
    <div class="jumbotron text-center box-shadow">
      <h4 class="display-4">eXlight 0.9</h2>
        <p>Panel dynamicznego zarządzania treścią na stronie</p>
        <hr><br>
        <form class="form-group" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <p id="error-login" class="badge-danger"></p>
          <p id="info-login" class="badge-info"></p>
        <label>Login:</label>
        <input class="form-control" type="email" name="login" id="login" placeholder="login@expl4ined.eu"><br>
        <label>Hasło:</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="Hasło"><br>
        <input class="btn btn-outline-secondary" style="width: 25%;" type="submit" id="submit" value="Zaloguj">
    </div>
  </div>
  <div class="com-lg-3"> </div>
</div>
