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

?>
<div class="jumbotron row box-shadow">
  <div class="col-lg-5 col-12">
      <div class="box-shadow" style="padding: 10px;">
        <form class="upl-form form-group" method="post" action="?s=menu-upload-sql">
          <h1 class="display-5">Wstawianie nowej opcji Menu</h1>
          <hr>

          <table >
            <tr>
              <td> <input  class="form-control" style="width: 100%;" type="text" name="id-upl" disabled placeholder="ID"/></td>
            </tr>
            <tr>
              <td>
                <select class="form-control" name="parentId-upl">
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
              <td> <input  class="form-control" id="inputName" type="text" name="name-upl" placeholder="Nazwa"/></td>
            </tr>
            <tr>
              <td> <input  class="form-control" id="inputHref" type="text" name="href-upl" placeholder="Łącze"/></td>
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
          <input hidden type="text" value="0" name="isDisabled-upl" id="checkboxChange">
          <input class="btn btn-outline-success" type="submit" value="Wstaw">
          <input class="btn btn-outline-danger" type="reset" value="Wyczyść">
        </form>
      </div>
  </div>
  <div class="col-lg-7 col-12">
    <table class="prev-tab table table-hover box-shadow">
      <tr><th>id</th><th>parentId</th><th>name</th><th>href</th><th>isDisabled</th><th>Akcje</th></tr>
    <?php
          $i = 0;
          while ($i < sizeof($menuArray)) {
            if ($menuArray[$i]['parentId'] == '0')
            {
              echo
                '<tr>
                  <td>'.$menuArray[$i]['id'].'</td>
                  <td> main </td>
                  <td>'.$menuArray[$i]['name'].'</td>
                  <td><a href="http://expl4ined.eu/'.$menuArray[$i]['href'].'">Link</a></td>
                  <td>'.$menuArray[$i]['isDisabled'].'</td>
                  <td><form method="post" action="?s=menu-edit"><input type="text" name="id-edit" hidden value='.$menuArray[$i]["id"].'><input type="submit" class="btn btn-info" value="Edycja"></form></td>
                </tr>';
                $n = 0;
                while ($n < sizeof($menuArray)) {
                  if ($menuArray[$i]['id'] == $menuArray[$n]['parentId']){
                    echo
                      '<tr>
                        <td>'.$menuArray[$n]['id'].'</td>
                        <td>'.$menuArray[$n]['parentId'].'└ </td>
                        <td>'.$menuArray[$n]['name'].'</td>
                        <td><a href="http://expl4ined.eu/'.$menuArray[$n]['href'].'">Link</a></td>
                        <td>'.$menuArray[$n]['isDisabled'].'</td>
                        <td><form method="post" action="?s=menu-edit"><input type="text" name="id-edit" hidden value='.$menuArray[$n]["id"].'><input type="submit" class="btn btn-info" value="Edycja"></form></td>
                      </tr>';
                  }
                  $n ++;
                }
            }
            $i ++;
          }
    ?>
    </table>
  </div>
  <hr>
</div>

<!-- echo '<tr><td>'.$menuArray[$i]['id'].'</td>
<td style="filter: opacity(30%)">'.$menuArray[$i]['name'].'</td>
<td style="filter: opacity(30%)"><a target="_blank" rel="noopener noreferrer" href="http://expl4ined.eu/'.$menuArray[$i]['href'].'">'.$menuArray[$i]['href'].'</a></td>
<td style="filter: opacity(30%)">'.$menuArray[$i]['isDropdown'].'</td>
<td style="filter: opacity(30%)">'.$menuArray[$i]['isDisabled'].'</td>
<td>'.'<form method="post" action="?s=menu-edit"><input type="text" name="id-edit" hidden value='.$menuArray[$i]["id"].'><input type="submit" class="btn btn-info" value="Edycja"></form>'.'</td></tr>'; -->
