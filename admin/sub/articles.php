<?php
  include '../config/db.php';
  $conn->query("SET NAMES 'utf8'");
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
      $post =  array($_POST['rows']);
      $rowsCount = $post[0][0];
      $rowFrom = $post[0][1];
  } else {
      $rowsCount = 5;
      $rowFrom = 0;
  }
  if (!$rowsCount) {
      $rowsCount = 5;
  }
  if (!$rowFrom) {
      $rowFrom = 0;
  }
?>

<div class="jumbotron row box-shadow">
  <div class="col-lg-5 col-12">
    <div class="view-db">
      <div class="box-shadow" style="padding: 10px;">
        <form class="form-group" method="post" action="<?php echo $_SERVER['PHP_SELF']."?s=articles";?>">
          <label>Ilość wierszy do wyświetlenia (Wpisz x aby wyświetliły się wszystkie), domyślnie 5</label>
          <script>
            function checkInput (x, y) {
              var value;
              if (y == 1) {
                value = document.getElementById("InputOne").value;
              }
              if (y == 2){
                value = document.getElementById("InputOne").value;
              }
              if (Number.isInteger(parseInt(value)) || value.toLowerCase() == x)
              {
                document.getElementById("input-btn").value = "Wyślij zapytanie";
                document.getElementById("input-btn").disabled = "";
              }
              else {
                document.getElementById("input-btn").value = "Błędne dane!";
                document.getElementById("input-btn").disabled = "TRUE";
              }


            }
          </script>
          <input onchange="checkInput('x', 1)" id="InputOne" class="form-control" type="text" name="rows[]" value="" placeholder="Liczba albo 'x'"><br>
          <label>Od której pozycji (licząc od 0) ma zacząć podawać, domyślnie 0</label>
          <input onchange="checkInput(NULL, 2)" id="InputTwo" class="form-control" type="text" name="rows[]" value="" placeholder="Liczba"><br>
          <div class="row">
          <div class="col-6">
              <input class="btn btn-outline-secondary" type="submit" id="input-btn" value="Wyślij zapytanie">
            </div>
            <div class="col-6 text-right">
              <?php echo '<a>Ilość wierszy: '.$rowsCount.'</a><br><a>Od którego wiersza: '.$rowFrom.'</a>'; ?>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-lg-7 col-12">
    <?php
    // $query = "SELECT * FROM expl4ined_posty";
    //   if (strtolower($rowsCount) != 'x') {
    //       $query .=  " LIMIT " . $rowsCount . " OFFSET ". $rowFrom ;}
    //   $result = $conn->query($query);
    //   $dane = array();
    //   while ($row = $result ->fetch_array()) {
    //       $dane[] = $row;
    //     }
    //   $n = $i - 1;

      $idSQL = "SELECT 'id' FROM expl4ined_posty where 1";
      $idCount = $conn->query($idSQL);
      $i = -1;
      while ($idRow = $idCount ->fetch_array()){
        $i = $i + 1;
      }

      if($rowFrom == NULL)
        {
          $postyQuery = "SELECT * FROM expl4ined_posty ORDER BY `id` DESC";
        }

      else
        {
          $postyQuery = "SELECT * FROM expl4ined_posty ORDER BY `id` ASC";
        }


      $postyResult = $conn->query($postyQuery);
      $postyArray = array();
      while ($row = $postyResult ->fetch_array()) {
          $dane[] = $row;
        }
      $n = 0 +$rowFrom;

      if ($rowsCount!= 'x')
      {
        if ($rowsCount!= NULL){
          $i = $rowsCount -1;
        }
      }

      echo '<table class="prev-tab table table-hover box-shadow"><tr><th>id</th> <th>topic</th> <th>author</th> <th>date</th> <th>description</th> <th>image</th> <th>link</th> <th>body</th> <th>Akcje</th> </tr>';
        while ($n <= $i){
          echo '<tr style=" max-height: 100px;">
             <td>'.  $dane[$n]['id']. "</td>
             <td>" . $dane[$n]['topic']. "</td>
             <td>" . $dane[$n]['author']. "</td>
             <td>" . $dane[$n]['date']. "</td>
             <td>" . $dane[$n]['description']. '</td>
             <td><a target="_blank" rel="noopener noreferrer" href="../' . $dane[$n]['image']. '">'.$dane[$n]['image'].'</a> </td>
             <td><a target="_blank" rel="noopener noreferrer" href="' . $dane[$n]['link']. '">link</a> </td>
             <td style="white-space: nowrap; max-width: 200px; overflow: hidden; text-overflow:ellipsis;">' . explode("\n", $dane[$n]['body'])[0]. "</td>
             <td>". '<form method="post" action="?s=article-edit"><input type="text" name="id-edit" hidden value='.$dane[$n]["id"].'><input type="submit" class="btn btn-info" value="Edycja"></form>' ."</td>
             </tr>";


             $n++;
      }
    ?>
    <tr>
      <td colspan="9">
        <div style="display: block; text-align: center; margin-top: 5px; margin-bottom: 5px;">
          <a href="?s=article-add">
            <button class="btn btn-success" style="width: 98%;">Dodaj</button>
          </a>
        </div>
      </td>
    </tr>
    </table>

  </div>
  <hr>
</div>
