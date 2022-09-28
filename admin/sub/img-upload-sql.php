<div class="jumbotron">
<p>
  <?php
  $target_dir = "../images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "Plik jest obrazem - " . $check["mime"] . ".<br>";
          $uploadOk = 1;
      } else {
          echo "Plik nie jest obrazem.<br>";
          $uploadOk = 0;
      }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Plik o takiej nazwie już istnieje.<br>";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 3000000) {
      echo "Plik jest za duży.<br>";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Format pliku nie jest obsługiwany.<br>";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Nie udało się wysłać pliku.<br>";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "Plik  ". basename( $_FILES["fileToUpload"]["name"]). " został wysłany.<br>";
      } else {
          echo "Wystąpił błąd podczas wysyłania pliku.<br>";
      }
  }
?>
</p>
<a class="btn btn-outline-danger" href="/admin">Wróć</a>
</div>
