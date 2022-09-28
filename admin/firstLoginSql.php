<div class="jumbotron">
  <?php
    include '../config/db.php';
    $conn->query("SET NAMES 'utf8'");
    $login = $_POST['login'];
    $newPass = crypt($_POST['newPass'], '$6$rounds=5000$ZrobionePrzePiorunIeXway$');
    $alias = $_POST['newAlias'];

    if ($conn->query("UPDATE `expl4ined_uzytkownicy` SET `password`= '$newPass', `isDisabled` = 0, `alias` = '$alias' WHERE `login` = '$login'"))
      {
        echo 'Dodano nowego użytkownika - '.$login;
      }
    else
      {
        echo "Błąd: ".$conn->error;
      }

      session_destroy();
  ?>
  <br>
  <a href="http://expl4ined.eu/admin"><button class="btn btn-danger">Wróć do panelu</button></a>
</div>
