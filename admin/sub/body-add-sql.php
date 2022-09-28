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
$menuId = $_POST["menuId-upl"];
$type = $_POST["type-upl"];
$name = $_POST["name-upl"];
$header = $_POST["header-upl"];
$image = $_POST["image-upl"];
$href = $_POST["link-upl"];
$body = htmlentities($_POST["body-upl"]);
if ($conn->query("INSERT INTO `expl4ined_tresc`(`id`, `menuId`, `type`, `name`, `header`, `img`, `href`, `body`) VALUES('','$menuId', '$type', '$name', '$header', '$image', '$href', '$body')")) {
    echo '<h1 class="display-4">Pomyślnie utworzono nowy wiersz: </h1><br><hr><br>';
    echo '<table class="prev-tab table box-shadow">';
    echo '<tr><th>menuId</th><th>type</th><th>name</th><th>header</th><th>image</th><th>link</th><th>body</th></tr>';
    echo "<tr><td>";
    echo $menuId;
    echo "</td><td>";
    echo $type;
    echo "</td><td>";
    echo $name;
    echo "</td><td>";
    echo $header;
    echo "</td><td>";
    echo $image;
    echo "</td><td>";
    echo $href;
    echo "</td><td>";
    echo $body;
    echo "</td></tr></table>";
} else {
            echo "Błąd: ".$conn->error;
        }
 ?>
 <br>
 <a href="?s=body"><button class="btn btn-danger">Wróć do panelu</button></a>
</div>
