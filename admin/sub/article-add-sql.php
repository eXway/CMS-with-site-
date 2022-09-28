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
$topic = $_POST["topic-upl"];
$author = $_POST["author-upl"];
$date = $_POST["date-upl"];
$description = $_POST["description-upl"];
$image = $_POST["image-upl"];
$link = $_POST["link-upl"];
$body = htmlentities($_POST["body-upl"]);
if ($conn->query("INSERT INTO `expl4ined_posty`(`id`, `topic`, `author`, `date`, `description`, `image`, `link`, `body`) VALUES('','$topic', '$author', '$date', '$description', '$image', '$link', '$body')")) {
    echo '<h1 class="display-4">Pomyślnie utworzono nowy wiersz: </h1><br><hr><br>';
    echo '<table class="prev-tab table box-shadow">';
    echo '<tr><th>id</th><th>topic</th><th>date</th><th>description</th><th>image</th><th>link</th><th>body</th></tr>';
    echo "<tr><td>";
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
 <a href="?s=articles"><button class="btn btn-danger">Wróć do panelu</button></a>
</div>
