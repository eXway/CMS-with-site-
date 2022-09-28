<div class="jumbotron">
  <p class="display-4">
    <?php
      include '../config/db.php';
      $conn->query("SET NAMES 'utf8'");
      if (!$conn->query("UPDATE `expl4ined_uzytkownicy` SET `alias`=\"".$_POST['new-alias']."\" WHERE `login`=\"".$_SESSION['login']."\""))
        {
          echo 'BŁONT'.$conn->error;
        }
      else
        {
          echo 'Zmieniono alias - ' .$loginResult[1]. ' na ' . $_POST['new-alias'];
        }
    ?>
  </p>
  <hr>
  <a class="btn btn-outline-danger" href="?s=index">Wróć</a>
</div>
