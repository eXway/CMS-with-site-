<?php
  include '../config/db.php';
  $conn->query("SET NAMES 'utf8'");
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
      $post =  array($_POST['rows']);
      $rowsCount = $post[0][0];
      $rowFrom = $post[0][1];
  } else {
      $rowsCount = 5;
      $rowFrom = 0;
  }
  if (!$rowsCount) {
      $rowsCount = 5;
  }
  if (!$rowFrom) {
      $rowFrom = 0;
  }
session_destroy();
?>

<script>

  function passCheck()
    {
      if (document.getElementById('newPass').value != document.getElementById('newPassConfirm').value)
        {
          document.getElementById("error-pass").innerHTML = "Hasła nie zgadzają się!";
          return false;
        }
      if (document.getElementById('newAlias').value == "")
        {
          document.getElementById("error-pass").innerHTML = "Nick musi zostać podany!";
          return false;
        }
      else
        {
          return true;
        }
    }

</script>

<div class="row">
  <div class="col-lg-3"> </div>
  <div class="col-lg-6 col-md-12">
    <div class="jumbotron text-center box-shadow">
      <h4 class="display-4">eXlight 0.9</h2>
        <p>Wykryto pierwsze logowanie z tego loginu!</p>
        <hr><br>
        <form class="form-group" onsubmit="return passCheck()" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <label>Twój login</label>
          <input class="form-control" type="text" name="login" readonly value="<?php echo $_SESSION['login']; ?>"><br>
          <p id="error-pass" class="badge-danger"></p>
          <label>Ustaw swój Nick:</label>
          <input class="form-control" type="text" id="newAlias" name="newAlias" placeholder="Nick"><br>
          <label>Ustaw hasło:</label>
          <input class="form-control" type="password" id="newPass" name="newPass" placeholder="Nowe hasło"><br>
          <label>Potwierdź hasło:</label>
          <input class="form-control" type="password" id="newPassConfirm" name="newPassConfirm" placeholder="Potwierdź hasło"><br>
          <input class="btn btn-outline-secondary" style="width: 25%;" type="submit" value="Zapisz">
        </form>
        <a class="btn btn-outline-danger" style="width: 25%;" href="http://expl4ined.eu/admin">Wróć</a>
    </div>
  </div>
  <div class="com-lg-3"> </div>
</div>
