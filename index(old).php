<!DOCTYPE html>
<html lang="pl">
<head>
    <meta name="google-site-verification" content="kTrnhfq5RClla54ZNLvuxLWdRQBMlFOPJgLd7f2qgAY" />
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=iso-8859-2" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="expires" content="-1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/Explained square - no alpha - no text.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    if (isset($_GET['s']) && $_GET['s'] && $_GET['s'] != 'index') {
        $title = ucfirst($_GET['s']);
    } else {
        $title = "Start";
    }
    print('<title>Expl4ined - '.$title.'</title>');
    ?>
    <link href="bootstrap-4.0.0.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script>
      var __adobewebfontsappname__ = "dreamweaver"
    </script>
    <!-- <script src="http://use.edgefonts.net/nova-mono:n4:default;strong:n4:default.js" type="text/javascript"></script> -->
  </head>

  <body>

    <nav style="background-color: #363b4e" class="navbar navbar-expand-lg navbar-dark">
      <div class="particle" id="particles-js"> </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
      <script src="js/particles.js"></script>
      <script src="js/app.js"></script>
      <img src="./images/Explained square - no alpha - no text.png" class="logo-icon" height="200px" alt="Placeholder image">
      <a class="navbar-brand" href="?s=index">Expl4ined</a>
      <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
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
                if ($menuArray[$i]['isDisabled'] == "0")
                  {
                    if ($menuArray[$i]['isDropdown'] == "1")
                      {
                        $names = explode(",", $menuArray[$i]['names']);
                        $hrefs = explode(",", $menuArray[$i]['hrefs']);
                        echo '<li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> '.$menuArray[$i]['name'].' </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                        $n = 0;

                        while ($n < sizeof($names))
                          {
                            echo '<a class="dropdown-item" href="'.$hrefs[$n].'">'.$names[$n].'</a>';
                            $n++;
                          }
                        echo '</div></li>';
                      } else
                          {
                            echo '<li class="nav-item">
                                    <a class="nav-link" href="'.$menuArray[$i]['href'].'">'.$menuArray[$i]['name'].'</a>
                                  </li>';
                          }
                  }
                $i++;
              }
            ?>

        </ul>

      </div>
    </nav>
    <div class="menu-spacing">
      <br />
    </div>

<!-- HEADER -->

	  <div class="main-content">
    <?php

        if (isset($_GET['s']) && $_GET['s'] && $_GET['s'] != 'index') {
          if ((($_GET['s'] == "" ) == FALSE) && (!is_readable("sub/".$_GET['s'].".php"))) {
            include 'errors/404.html';
          } else include "./sub/".$_GET['s'].".php";
         } else {
          include "start.php";
      }
    ?>
    </div>

    <div class="footer">
      <div class="text-center">
        <p>Copyright &copy; 2018 &middot; All Rights Reserved &middot;
          <a target="_blank" rel="noopener noreferrer" href="https://streamlabs.com/XXeXwayXX" class="alert-link" style="color: #000">eXway</a>
        </p>
      </div>
    </div>
    <div class="icon-bar">
      <a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/expl4ined/" class="facebook">
        <i class="fa fa-facebook"></i>
      </a>
      <a target="_blank" rel="noopener noreferrer" href="https://www.youtube.com/channel/UCbs2ecGEcPgabp64h4rrrHQ" class="youtube">
        <i class="fa fa-youtube"></i>
      </a>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.0.0.js"></script>

</script>
</body>
</html>
