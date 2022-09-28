<head>
  <style>
  td {
    max-width: 300px;
    overflow-x: hidden;
  }
  </style>
</head>
<div class="jumbotron">
<?php
include '../config/db.php';
$conn->query("SET NAMES 'utf8'");
$name = $_POST["name-upl"];
$parentId= $_POST["parentId-upl"];
$href = $_POST["href-upl"];
$isDisabled = $_POST["isDisabled-upl"];
if ($conn->query("INSERT INTO `expl4ined_menu`(`parentId`, `name`, `href`, `isDisabled`) VALUES( '$parentId', '$name', '$href', '$isDisabled')")) {
    echo '<h1 class="display-4">Pomyślnie utworzono nowy wiersz: </h1><br><hr><br>';
    echo '<table class="prev-tab table box-shadow">';
    echo '<tr><th>name</th><th>parentId</th><th>href</th><th>isDisabled</th></tr>';
    echo "<tr><td>";
    echo $name;
    echo "</td><td>";
    echo $parentId;
    echo "</td><td>";
    echo $href;
    echo "</td><td>";
    echo $isDisabled;
    echo "</td></table>";
} else {
            echo "Błąd: ".$conn->error;
        }
 ?>
 <br>
 <a href="?s=menu"><button class="btn btn-danger" >Wróć do panelu</button></a>
</div>
