<?php
  include '../config/db.php';
  $conn->query("SET NAMES 'utf8'");

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
    <form class="upl-form form-group" method="post" action="?s=body-add-sql">
      <h1 class="display-4">Wstawianie nowego wiersza</h1>
      <hr>
      <table>
        <tr>
          <td> <input class="form-control" style="width: 100%;" type="text" name="id-upl" disabled placeholder="ID"/></td>
        </tr>
        <tr>
          <td>
            <select class="form-control" name="menuId-upl">
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
            <select class="form-control" name="type-upl">
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
          <td> <input class="form-control" type="text" name="name-upl" placeholder="Nazwa"/></td>
        </tr>
        <tr>
          <td> <input class="form-control" type="text" name="header-upl" placeholder="Nagłówek"/></td>
        </tr>
        <tr>
          <td> <input onclick="openCustomRoxy()" class="form-control" type="text" name="image-upl" placeholder="Ścieżka obrazu"/></td>
        </tr>
        <tr>
          <td> <input class="form-control" type="text" name="link-upl" placeholder="Link"/></td>
        </tr>
        <tr>
          <td>
            <textarea id="myeditor" name="body-upl"></textarea>
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
