<div class="jumbotron">
  <?php
    include '../config/db.php';
    $conn->query("SET NAMES 'utf8'");
    $login = $_POST['usr-login'];

    if (substr($login, -13, 13) != '@expl4ined.eu')
      {
        $login .= '@expl4ined.eu';
      }

    if ($conn->query("INSERT INTO `expl4ined_uzytkownicy`(`id`, `login`, `isDisabled`) VALUES('','$login', 1)"))
      {
        echo 'Dodano nowego użytkownika - '.$login;
      }
    else
      {
        echo "Błąd: ".$conn->error;
      }
  ?>
  <br>
  <a href="?s=user-add"><button class="btn btn-danger">Wróć do panelu</button></a>
</div>
