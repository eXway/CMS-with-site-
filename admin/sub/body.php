<div class="jumbotron row box-shadow">
  <div class="col-12">
    <table class="prev-tab table table-hover box-shadow">
    <?php
          include 'config/db.php';
          $conn->query("SET NAMES 'utf8'");
          if (!$resultbody = $conn->query("SELECT * FROM `expl4ined_tresc`")) {
              echo 'BŁĄD: '.$conn->error;
              die;
          }
          $bodyArray = array();

          while ($bodyRow = $resultbody->fetch_array()) {
              $bodyArray[] = $bodyRow;
          }
          $i = 0;
          echo '<tr><th>id</th><th>menu</th><th>type</th><th>name</th><th>header</th><th>body</th><th>img</th><th>href</th><th>Akcje</th></tr>';

          while ($i < sizeof($bodyArray)) {
            echo '<tr style=" max-height: 100px;">
               <td>'.  $bodyArray[$i]['id']. "</td>
               <td>" . $conn->query("SELECT `name` FROM `expl4ined_menu` WHERE `id` = ". explode(".", $bodyArray[$i]['menuId'])[0])->fetch_array()[0]. "</td>
               <td>" . $bodyArray[$i]['type']. "</td>
               <td>" . $bodyArray[$i]['name']. "</td>
               <td>" . $bodyArray[$i]['header']. '</td>
               <td>' . $bodyArray[$i]['body']. '</td>
               <td><a target="_blank" rel="noopener noreferrer" href="../' . $bodyArray[$i]['img']. '">'.$bodyArray[$i]['img'].'</a> </td>
               <td><a target="_blank" rel="noopener noreferrer" href="' . $bodyArray[$i]['href']. '">href</a> </td>
               <td>'. '<form method="post" action="?s=body-edit"><input type="text" name="id-edit" hidden value='.$bodyArray[$i]["id"].'><input type="submit" class="btn btn-info" value="Edycja"></form><br>
                       <form target="_blank" method="post" action="../sub/body-preview.php"><input type="text" name="id-edit" hidden value='.$bodyArray[$i]["id"].'><input type="submit" class="btn btn-outline-info" value="Podgląd"></form>' ."</td>
               </tr>";

              $i++;
          }
    ?>
    <tr>
      <td colspan="9">
        <div style="display: block; text-align: center; margin-top: 5px; margin-bottom: 5px;">
          <a href="?s=body-add">
            <button class="btn btn-success" style="width: 98%;">Dodaj</button>
          </a>
        </div>
      </td>
    </tr>

    </table>

  </div>
  <hr>
</div>
