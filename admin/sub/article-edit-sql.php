<head>
  <style>
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
$topic = $_POST["topic-edit"];
$author = $_POST["author-edit"];
$date = $_POST['date-edit'];
$description = $_POST["description-edit"];
$image = $_POST["image-edit"];
$link = $_POST["link-edit"];
$body = htmlentities($_POST["body-edit"]);
if ($conn->query("UPDATE `expl4ined_posty` SET `topic`=\"".$topic."\",  `author`=\"".$author."\", `date`=\"".$date."\", `description`=\"".$description."\", `image`=\"".$image."\", `link`=\"".$link."\", `body`=\"".$body."\" WHERE `id`=".$id) === TRUE)
{
    echo '<h1 class="display-4">Pomyślnie zaaktualizowano wiersz: </h1><br><hr><br>';
    echo '<table class="prev-tab table box-shadow">';
    echo '<tr><th>id</th><th>topic</th><th>author</th><th>date</th><th>description</th><th>image</th><th>link</th><th>body</th></tr>';
    echo "<tr><td>";
    echo $id;
    echo "</td><td>";
    echo $topic;
    echo "</td><td>";
    echo $author;
    echo "</td><td>";
    echo $date;
    echo "</td><td>";
    echo $description;
    echo "</td><td>";
    echo $image;
    echo "</td><td>";
    echo $link;
    echo "</td><td>";
    echo $body;
    echo "</td></tr></table>";
} else {
            echo "Błąd: ".$conn->error;
        }
 ?>
 <br>
 <a href="?s=articles"><button class="btn btn-danger" >Wróć do panelu</button></a>
</div>
