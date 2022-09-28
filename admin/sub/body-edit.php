<?php
  include '../config/db.php';
  $conn->query("SET NAMES 'utf8'");

  $conn->query("SET NAMES 'utf8'");
  $result = $conn->query("SELECT * FROM `expl4ined_tresc` WHERE `id` = ".$_POST['id-edit']);
  $bodyArray = array();
  while ($row = $result -> fetch_array())
    {
      $bodyArray[] = $row;
    }

    if (!$resultMenu = $conn->query("SELECT * FROM `expl4ined_menu`")) {
        echo 'BŁĄD: '.$conn->error;
        die;
    }
    $menuArray = array();

    while ($row = $resultMenu->fetch_array()) {
        $menuArray[] = $row;
  }

  if (!$resultLayout = $conn->query("SELECT * FROM `expl4ined_szablony`")) {
      echo 'BŁĄD: '.$conn->error;
      die;
  }
  $layoutArray = array();

  while ($row = $resultLayout->fetch_array()) {
      $layoutArray[] = $row;
}

 ?>

<div class="jumbotron box-shadow">
  <div class="col-12">
    <form class="upl-form form-group" method="post" action="?s=body-edit-sql">
      <h1 class="display-4">Edytowanie wiersza</h1>
      <hr>
      <table>
        <tr>
          <td> <input class="form-control" style="width: 100%;" type="text" name="id-edit" readonly placeholder="ID" value="<?php print($_POST['id-edit']); ?>"/></td>
        </tr>
        <tr>
          <td>
            <select class="form-control" name="menuId-edit">
              <?php
                $i = 0;
                while ($i < sizeof($menuArray)) {
                  echo '<option value="'.$menuArray[$i]['id'].'">'.$menuArray[$i]['name'].'</option>';
                  $i ++;
                }

              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <select class="form-control" name="type-edit">
              <?php
                $i = 0;
                while ($i < sizeof($layoutArray)) {
                  echo '<option value="'.$layoutArray[$i]['id'].'">'.$layoutArray[$i]['name'].'</option>';
                  $i ++;
                }

              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td> <input class="form-control" type="text" name="name-edit" placeholder="Nazwa" value="<?php echo $bodyArray[0]['name']; ?>"/></td>
        </tr>
        <tr>
          <td> <input class="form-control" type="text" name="header-edit" placeholder="Nagłówek" value="<?php echo $bodyArray[0]['header']; ?>"/></td>
        </tr>
        <tr>
          <td> <input onclick="openCustomRoxy()" class="form-control" type="text" name="image-edit" placeholder="Ścieżka obrazu" value="<?php echo $bodyArray[0]['img']; ?>"/></td>
        </tr>
        <tr>
          <td> <input class="form-control" type="text" name="link-edit" placeholder="Link" value="<?php echo $bodyArray[0]['href']; ?>"/></td>
        </tr>
        <tr>
          <td>
            <textarea id="myeditor" name="body-edit"> <?php echo $bodyArray[0]['body']; ?></textarea>
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
