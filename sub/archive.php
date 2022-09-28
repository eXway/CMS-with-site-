<div id="archive">
  <div class="jumbotron jumbotron-fluid text-center center">
    <h1 class="display-4">Archiwum</h1>
    <hr class="my-4">
    <p>Tu znajdziesz wszystkie posty, które miały miejsce na tej stronie</p>
  </div>
  <div class="container">
    <br>
    <hr>
    <br>
    <?php
    include './config/db.php';
    $conn->query("SET NAMES 'utf8'");
    $idSQL = "SELECT 'id' FROM expl4ined_posty where 1";
    $idCount = $conn->query($idSQL);
    $i = 0;
    while ($idRow = $idCount ->fetch_array()){
      $i = $i + 1;
    }
    $query = "SELECT * FROM expl4ined_posty";
    $result = $conn->query($query);
    $dane = array();
    while ($row = $result ->fetch_array()) {
        $dane[] = $row;
      }
    $n = $i - 1;
      ?>

    <br/>
    <br/>
    <div class="row">
    <?php
    while ($n >= 0) {

    echo '
        <div class=" col-md-6">
          <div class="card archive-card">
            <div class="img">
              <a target="_blank" rel="noopener noreferrer" href="'.$dane[$n]['link'].'"><img class="card-img-top" src="'.$dane[$n]['image'].'" alt="Card image cap"></a>
            </div>
            <div class="card-body">
              <h4 class="card-title"  > '. $dane[$n]['topic'] .'</h4>
              <p class="card-text" >'. $dane[$n]['description'].' </p>
              <br>
              <br>
              <a href="?s=article&id='.$dane[$n]['id'].'" class="btn btn-dark">Cały post</a>
            </div>
          </div>
          <br />
        </div>';
        $n= $n-1;
      }
    ?>

    </div>
    <br/>
    <br/>
    <br>
    <hr>
  </div>
</div>
