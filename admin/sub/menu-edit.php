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

$menuIdRow = $conn->query("SELECT * FROM `expl4ined_menu` WHERE `id` = ".$_POST['id-edit'])->fetch_array();


?>
<div class="jumbotron box-shadow">
  <div class="col-12">
    <form class="upl-form form-group" method="post" action="?s=menu-edit-sql">
      <h1 class="display-5">Edytowanie opcji Menu</h1>
      <hr>

      <table >
        <tr>
          <td> <input  class="form-control" style="width: 100%;" type="text" name="id-edit" readonly value="<?php echo $_POST['id-edit']; ?>"/></td>
        </tr>
        <tr>
          <td>
            <select class="form-control" name="parentId-edit">
              <option value="0"> Main </option>
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
          <td> <input  class="form-control" type="text" name="name-edit" value="<?php echo $menuIdRow['name'];?>" placeholder="Nazwa"/></td>
        </tr>
        <tr>
          <td> <input  class="form-control" type="text" name="href-edit" value="<?php echo $menuIdRow['href']; ?>" placeholder="Łącze"/></td>
        </tr>
        <tr>
          <td> <input onchange="boxChange()" class="form-check-input" id="hiddenCheckbox" type="checkbox"/> <label for="hiddenCheckbox">Menu ukryte: </label></td>
        </tr>
      </table>
      <script>
        function boxChange() {
          if (document.getElementById('hiddenCheckbox').checked == TRUE) document.getElementById('checkboxChange').value = '1';
          if (document.getElementById('hiddenCheckbox').checked == FALSE) document.getElementById('checkboxChange').value = '0';
        }
      </script>
      <input hidden type="text" value="0" name="isDisabled-edit" id="checkboxChange">
      <input class="btn btn-outline-success" type="submit" value="Zapisz">
      <input class="btn btn-outline-danger" type="reset" value="Wyczyść">
    </form>
  </div>
</div>
<tr>
