<div class="jumbotron">
  <p class="display-4">
  <?php
    include '../config/db.php';
    $conn->query("SET NAMES 'utf8'");
    if ($_SESSION['password'] == crypt($_POST['old-pass'], '$6$rounds=5000$ZrobionePrzePiorunIeXway$')) {
        if ($_POST['old-pass'] != $_POST['new-pass']) {
            if (!$conn->query("UPDATE `expl4ined_uzytkownicy` SET `password`=\"".crypt($_POST['new-pass'], '$6$rounds=5000$ZrobionePrzePiorunIeXway$')."\" WHERE `login`=\"".$_SESSION['login']."\"")) {
                echo 'BLOND! '.$conn->error;
            } else {
                echo 'Hasło zostało zmienione!';
                $_SESSION = array();
                session_unset();
                session_destroy();
            }
        } else {
            echo 'Hasła nie mogą być takie same!';
        }
    } else {
        echo 'Hasło nie zgadza się!';
    }
  ?>
  </p>
  <hr>
  <a class="btn btn-outline-danger" href="?s=index">Wróć</a>
</div>
