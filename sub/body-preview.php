<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../images/Explained square - no alpha - no text.png">
    <title> Podgląd </title>
  </head>
  <body>
    <?php
    include '../config/db.php';

    $conn->query("SET NAMES 'utf8'");
    $result = $conn->query("SELECT * FROM `expl4ined_tresc` WHERE `id` = ".$_POST['id-edit']);
    $bodyArray = array();
    while ($row = $result -> fetch_array())
      {
        $bodyArray[] = $row;
      }

      if (!$resultLayout = $conn->query("SELECT * FROM `expl4ined_szablony`")) {
          echo 'BŁĄD: '.$conn->error;
          die;
      }
      $layoutArray = array();

      while ($row = $resultLayout->fetch_array()) {
          $layoutArray[] = $row;
    }

    include '../layout/'.$layoutArray[$bodyArray[0]['type']-1]['body'].'.php';
    $id = $bodyArray[0]['id']-1;

    include '../config/db.php';

    $conn->query("SET NAMES 'utf8'");
    $result = $conn->query("SELECT * FROM `expl4ined_tresc`");
    $bodyArray = array();
    while ($row = $result -> fetch_array())
      {
        $bodyArray[] = $row;
      }

    $n = 0;
    $dane = array();
    while ($n < sizeof($bodyArray)) {
      if (($bodyArray[$id]['name'] == $bodyArray[$n]['name']) && ($bodyArray[$id]['type'] == $bodyArray[$n]['type']) && ($bodyArray[$id]['menuId'] == $bodyArray[$n]['menuId']))
      {
        $dane[] = $bodyArray[$n];
      }
      $n ++;
    }
    Section($dane);
?>

  <br><br>
  <center>
    <a class="btn btn-dark" onclick="window.close()" style="cursor: pointer; color:white;"> Wyjdź</a>
  </center>
  </body>
</html>
