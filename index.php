<!DOCTYPE html>
<html>
  <head>
    <meta name="google-site-verification" content="kTrnhfq5RClla54ZNLvuxLWdRQBMlFOPJgLd7f2qgAY" />
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=iso-8859-2" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="expires" content="-1" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/Explained square - no alpha - no text.png">
    <!-- DYNAMIC SITE TITLE -->
    <?php
      if (isset($_GET['s']) && $_GET['s'] && $_GET['s'] != 'index') {
          $title = ucfirst($_GET['s']);
      } else {
          $title = "Start";
      }
      print('<title>Expl4ined - '.$title.'</title>');
    ?>

  </head>
  <body>

    <!-- NAV BAR -->
    <nav class="navbar navbar-expand-lg navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <!-- PARTUICLES -->
        <img class="logo-img" src="images/Explained square - no alpha - no text.png" alt="">
        <a class="navbar-brand" href="/">Expl4ined</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">≡</span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <?php
              include 'config/db.php';
              $conn->query("SET NAMES 'utf8'");
              if (!$resultMenu = $conn->query("SELECT * FROM `expl4ined_menu`"))
              {
                echo 'BŁĄD: '.$conn->error; die;
              }
              $menuArray = array();

              while ($menuRow = $resultMenu->fetch_array())
                {
                  $menuArray[] = $menuRow;
                }
              $i = 0;

              while($i < sizeof($menuArray))
                {
                  $isDropdown = 0;
                  if ($menuArray[$i]['isDisabled'] == 0)
                    {
                      if ($menuArray[$i]['parentId'] == 0)
                        {
                          $n = 0;
                          while ($n < sizeof($menuArray))
                            {
                              if ($menuArray[$i]['id'] == $menuArray[$n]['parentId'])
                                {
                                  if ($isDropdown == 0)
                                    {
                                      echo '<li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> '.$menuArray[$i]['name'].' </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                                      $isDropdown = 1;
                                    }
                                  echo '<a class="dropdown-item" href="'.$menuArray[$n]['href'].'">'.$menuArray[$n]['name'].'</a>';
                                }
                              $n++;
                            }
                          if ($isDropdown == 1)
                            {
                              echo '</div></li>';
                              $isDropdown = 0;
                            }
                          else
                            {
                              echo '<li class="nav-item">
                                    <a class="nav-link" href="'.$menuArray[$i]['href'].'">'.$menuArray[$i]['name'].'</a>
                                    </li>';
                            }
                        }
                    }
                $i ++;
              }
            ?>
          </ul>
        </div>
      </div>
       <div id="particles-js"></div>
    </nav>

    <!-- CONTENT -->
    <div class="main-content">
      <div class="menu-spacing"></div>
      <?php

          if (isset($_GET['s']) && $_GET['s'] && $_GET['s'] != 'index') {
            if ((($_GET['s'] == "" ) == FALSE) && (!is_readable("sub/".$_GET['s'].".php"))) {
              include 'errors/404.html';
            } else
                {
                  include "./sub/".$_GET['s'].".php";
                }
           } else {
            include "start.php";
        }
      ?>
    </div>

    <!-- FOOTER  -->
    <footer>
      <div class="text-center">
        <p>Expl4ined &middot; Copyright &copy; 2018 &middot; All Rights Reserved &middot;
          <a target="_blank" rel="noopener noreferrer" href="https://streamlabs.com/XXeXwayXX" class="alert-link">eXway</a>
        </p>
      </div>
    </footer>

    <!-- SOCIAL ICON -->
    <div class="icon-bar">
      <a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/expl4ined/" class="facebook">
        <i class="fa fa-facebook"></i>
      </a>
      <a target="_blank" rel="noopener noreferrer" href="https://www.youtube.com/channel/UCbs2ecGEcPgabp64h4rrrHQ" class="youtube">
        <i class="fa fa-youtube"></i>
      </a>
    </div>

    <!-- COOKIES NOTIFICATION  -->
    <script type="text/javascript" id="cookieinfo"
  	  src="//cookieinfoscript.com/js/cookieinfo.min.js"
      data-fg="#fff"
      data-bg="#363b4e"
      data-link="#fff"
      data-divlink="#fff"
      data-divlinkbg="rgba(205,98,106,1)"
      data-message="Ta witryna korzysta z plików cookies w celu realizacji usług zgodnie z"
      data-linkmsg=" polityką plików cookies."
      data-close-text="Ok, zamknij"
      data-cookie="ciasteczko">
    </script>


    <!-- BOOTSTRAP SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>
