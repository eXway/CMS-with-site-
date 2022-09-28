<head>
  <style>
  }
  td {
    max-width: 300px;
    overflow: hidden;
  }
  </style>
</head>
<div class="jumbotron">
<?php
include '../config/db.php';
$conn->query("SET NAMES 'utf8'");
$id = $_POST["id-edit"];
$menuId = $_POST['menuId-edit'];
$type = $_POST['type-edit'];
$name = $_POST["name-edit"];
$header = $_POST['header-edit'];
$image = $_POST["image-edit"];
$href = $_POST["link-edit"];
$body = htmlentities($_POST["body-edit"]);

//var_dump("UPDATE `expl4ined_menu` SET `name`=\"".$name."\", `href`=\"".$href."\", `isDropdown`=\"".$isDropdown."\", `isDisabled`=\"".$isDisabled."\", `names`=\"".$names."\", `hrefs`=\"".$hrefs."\" WHERE `id`=".$id);die;
//Błąd: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'w kwalifikacjach do MP, `href`="Z przyjemnością informujemy was...", `i' at line 1
if ($conn->query("UPDATE `expl4ined_tresc` SET `menuId`=\"".$menuId."\",`type`=\"".$type."\", `name`=\"".$name."\", `header`=\"".$header."\", `img`=\"".$image."\", `href`=\"".$href."\", `body`=\"".$body."\" WHERE `id`=".$id) === TRUE)
{
  echo '<h1 class="display-4">Pomyślnie zaaktualizowano wiersz: </h1><br><hr><br>';
  echo '<table class="prev-tab table box-shadow">';
  echo '<tr><th>menu</th><th>type</th><th>name</th><th>header</th><th>img</th><th>href</th><th>body</th></tr>';
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
  echo "</td></table>";
} else {
            echo "Błąd: ".$conn->error;
        }
 ?>
 <br>
 <a href="?s=body"><button class="btn btn-danger" >Wróć do panelu</button></a>
</div>
