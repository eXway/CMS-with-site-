<?php
  include '../config/db.php';

  $conn->query("SET NAMES 'utf8'");
  $result = $conn->query("SELECT * FROM `expl4ined_posty` WHERE `id` = ".$_POST['id-edit']);
  $postyArray = array();
  while ($row = $result -> fetch_array())
    {
      $postyArray[] = $row;
    }
 ?>

<div class="jumbotron box-shadow">
  <div class="col-12">
    <form class="upl-form form-group" method="post" action="?s=article-edit-sql">
      <h1 class="display-4">Edytowanie wiersza</h1>
      <hr>
      <table>
        <tr>
          <td> <input class="form-control" style="width: 100%;" type="text" name="id-edit" disabled placeholder="ID" value="<?php print($_POST['id-edit']); ?>"/></td>
          <input hidden name="id-edit" value="<?php print($_POST['id-edit']); ?>"/>
        </tr>
        <tr>
          <td> <input class="form-control" type="text" name="topic-edit" placeholder="Tytuł" value="<?php print($postyArray[0]['topic']); ?>"/></td>
        </tr>
        <tr>
          <td> <input class="form-control" type="text" name="author-edit" readonly value="<?php echo $loginResult[1]; ?>"/></td>
        </tr>
        <tr>
          <td> <input class="form-control" type="date" name="date-edit" value="<?php print($postyArray[0]['date']); ?>"/></td>
        </tr>
        <tr>
          <td> <input class="form-control" type="text" name="description-edit" placeholder="Opis" value="<?php echo $postyArray[0]['description']; ?>"/></td>
        </tr>
        <tr>
          <td> <input onclick="openCustomRoxy()" class="form-control" type="text" name="image-edit" placeholder="Ścieżka obrazu" value="<?php echo $postyArray[0]['image']; ?>"/></td>
        </tr>
        <tr>
          <td> <input class="form-control" type="text" name="link-edit" placeholder="Link" value="<?php echo $postyArray[0]['link']; ?>"/></td>
        </tr>
        <tr>
          <td>
            <textarea id="myeditor" name="body-edit"> <?php echo $postyArray[0]['body']; ?></textarea>
            <script type="text/javascript">
              CKEDITOR.replace("myeditor");
            </script>
          </td>
        </tr>
      </table>
      <input class="btn btn-outline-secondary" type="submit" value="Zapisz">
      <input class="btn btn-outline-secondary" type="reset" value="Wyczyść">
    </form>
  </div>
</div>
