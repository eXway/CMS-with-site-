<?php
  session_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Panel Administratora</title>
    <script src="js/jquery-3.3.1.js"> </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../app/ckeditor/ckeditor.js"> </script>
    <script src="http://use.edgefonts.net/nova-mono:n4:default;strong:n4:default.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="header text-center menu-color box-shadow">
      <div class="title box-shadow"><a href="http://expl4ined.eu">expl4ined.eu</a><a style="color: rgba(255,255,255,0.5)"> / Panel Administratora  <?php if (!isset($_GET['s'])) printf(""); else echo "/ ".str_replace("-"," ",ucfirst($_GET['s'])); ?></a></div>
    </div>
    <br class="fixed-spacing">
    <br><br>

    <?php
      include '../config/db.php';
      $conn->query("SET NAMES 'utf8'");
      if($_POST['login'] != NULL)
      {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = crypt($_POST['password'], '$6$rounds=5000$ZrobionePrzePiorunIeXway$');

      }
      if($_SESSION['login'] == NULL)
        {
          echo '<script>
                  document.getElementById("error-login").innerHTML = "'.$_GET['err'].'";
                </script>';
                if (isset($_GET['s']) && $_GET['s'] && $_GET['s'] != 'index') {
                  include "./sub/".$_GET['s'].".php";
                 }
                 else {
                  include "sub/loginPanel.php";}
        }

      else
        {
          $login = $_SESSION['login'];
          $uzytkownicyResult = $conn->query("SELECT `password`, `alias`, `isDisabled`, `isAdmin` FROM `expl4ined_uzytkownicy` WHERE `login`=\"".$login."\"")->fetch_array();
          if ($_SESSION['password']  == $uzytkownicyResult[0] && $uzytkownicyResult['isDisabled'] == 0)

            {
                  echo'
                  <div class="row">
                    <div class="col-lg-2 col-12">
                      <ul class="nav flex-column">
                        <li class="nav-item btn btn-secondary"><a class="nav-link" href="?s=articles">Posty</a></li>
                        <li class="nav-item btn btn-secondary"><a class="nav-link" href="?s=menu">Menu</a></li>
                        <li class="nav-item btn btn-secondary"><a class="nav-link" href="?s=body">Treść</a></li>
                        <li class="nav-item btn btn-secondary"><a class="nav-link" href="?s=set">Ustawienia</a></li>
                        <li class="nav-item btn btn-secondary"><a class="nav-link" href="?s=layout">Szablony</a></li>
                        <li class="nav-item btn btn-secondary"><a class="nav-link" href="?s=sites">Strony</a></li>';
                  if ($uzytkownicyResult['isAdmin'] == 1)
                    {
                      echo '<li class="nav-item btn btn-dark"><a class="nav-link" href="?s=user-add">Dodaj admina</a></li>';
                    }
                  echo '<li class="nav-item btn btn-info"><a class="nav-link" href="?s=img-upload">Import na serwer</a></li>
                        <li class="nav-item btn btn-danger"> <a class="nav-link" href="?s=logout">Zalogowano jako: '.$uzytkownicyResult[1].'<br>Wyloguj</a></li>
                      </ul>
                    </div>
                  <div class="col-lg-10 col-12 main-site">';


                          if (isset($_GET['s']) && $_GET['s'] && $_GET['s'] != 'index') {
                            include "./sub/".$_GET['s'].".php";
                           }
                           else {
                            include "sub/articles.php";
                        }

                    echo '</div></div>';
            }

          else
            {
              if ($uzytkownicyResult['isDisabled'] == 1)
                {
                  if (isset($_POST['newAlias']))
                    {
                      include 'firstLoginSql.php';
                    }
                  else
                    {
                      include 'firstLogin.php';
                    }
                }
                else {
                  include 'sub/loginPanel.php';
                  echo '<script>
                          document.getElementById("error-login").innerHTML = "Niepoprawny login lub hasło!";
                        </script>';
              }
            }
        }
    ?>
    <footer>
      <div class="text-center">
        <p> eXlight | Made By
          <a  target="_blank" rel="noopener noreferrer" href="https://streamlabs.com/XXeXwayXX" class="alert-link">eXway</a>
        </p>
      </div>
    </footer>
  </body>
</html>
