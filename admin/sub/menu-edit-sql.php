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
$name = $_POST["name-edit"];
$parentId = $_POST['parentId-edit'];
$href = $_POST["href-edit"];
$isDisabled = $_POST["isDisabled-edit"];
//var_dump("UPDATE `expl4ined_menu` SET `name`=\"".$name."\", `href`=\"".$href."\", `isDropdown`=\"".$isDropdown."\", `isDisabled`=\"".$isDisabled."\", `names`=\"".$names."\", `hrefs`=\"".$hrefs."\" WHERE `id`=".$id);die;
//Błąd: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'w kwalifikacjach do MP, `href`="Z przyjemnością informujemy was...", `i' at line 1
if ($conn->query("UPDATE `expl4ined_menu` SET `name`=\"".$name."\", `parentId`=\"".$parentId."\", `href`=\"".$href."\", `isDisabled`=\"".$isDisabled."\" WHERE `id`=".$id) === TRUE)
{
  echo '<h1 class="display-4">Pomyślnie zaaktualizowano wiersz: </h1><br><hr><br>';
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
