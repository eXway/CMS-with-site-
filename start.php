<div id="glowna">
  <div class="jumbotron jumbotron-fluid text-center center">
    <h1 class="display-4"><?php  ?>Aktualności</h1>
    <hr class="my-4">
    <p>OPIS</p>
    <p>Jeżeli chcesz się dowiedzieć o nas ciut więcej zapraszamy do odwiedzenia podstrony:</p>
    <p class="lead">
      <a class="btn btn-dark btn-lg" href="?s=about" role="button">O nas</a>
    </p>
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
      $query = "SELECT * FROM expl4ined_posty LIMIT 5 OFFSET ".($i - 5); //You don't need a ; like you do in SQL
      $result = $conn->query($query);
      $dane = array();
      while ($row = $result ->fetch_array()) {
          $dane[] = $row;
        }
      $n = 4;
    ?>

    <div class="row">
      <div class="col-xl-12 col-md-12">
        <div class="card">
          <div class="img">
            <?php print('<a href="?s=article&id='.$dane[$n]['id'].'"><img class="card-img-top" src="'.$dane[$n]['image'].'" alt="Card image cap"></a>'); ?>
          </div>
          <div class="card-body">
            <h4 class="card-title"  > <?php print($dane[$n]['topic']); ?></h4>
            <p class="card-text" ><?php print($dane[$n]['description']); ?></p>
            <br>
            <br>
            <?php print('<a href="?s=article&id='.$dane[$n]['id'].'" class="btn btn-dark">Cały post</a>'); ?>
          </div>
        </div>
      </div>
    </div>
    <?php $n = $n -1; ?>
    <br/>
    <br/>

    <div class="row">
      <div class=" col-md-6">
        <div class="card">
          <div class="img">
            <?php print('<a href="?s=article&id='.$dane[$n]['id'].'"><img class="card-img-top" src="'.$dane[$n]['image'].'" alt="Card image cap"></a>'); ?>
          </div>
          <div class="card-body">
            <h4 class="card-title"  > <?php print($dane[$n]['topic']); ?></h4>
            <p class="card-text" ><?php print($dane[$n]['description']); ?></p>
            <br>
            <br>
            <?php print('<a href="?s=article&id='.$dane[$n]['id'].'" class="btn btn-dark">Cały post</a>'); ?>
          </div>
        </div>
        <br />
      </div>
      <?php $n = $n -1; ?>

      <div class=" col-md-6">
        <div class="card">
          <div class="img">
            <?php print('<a href="?s=article&id='.$dane[$n]['id'].'"><img class="card-img-top" src="'.$dane[$n]['image'].'" alt="Card image cap"></a>'); ?>
          </div>
          <div class="card-body">
            <h4 class="card-title"  > <?php print($dane[$n]['topic']); ?></h4>
            <p class="card-text" ><?php print($dane[$n]['description']); ?></p>
            <br>
            <br>
            <?php print('<a href="?s=article&id='.$dane[$n]['id'].'" class="btn btn-dark">Cały post</a>'); ?>
          </div>
        </div>
        <br />
      </div>
      <?php $n = $n -1; ?>

      <div class=" col-md-6">
        <div class="card">
          <div class="img">
            <?php print('<a href="?s=article&id='.$dane[$n]['id'].'"><img class="card-img-top" src="'.$dane[$n]['image'].'" alt="Card image cap"></a>'); ?>
          </div>
          <div class="card-body">
            <h4 class="card-title"  > <?php print($dane[$n]['topic']); ?></h4>
            <p class="card-text" ><?php print($dane[$n]['description']); ?></p>
            <br>
            <br>
            <?php print('<a href="?s=article&id='.$dane[$n]['id'].'" class="btn btn-dark">Cały post</a>'); ?>
          </div>
        </div>
        <br />
      </div>
      <?php $n = $n -1; ?>

      <div class=" col-md-6">
        <div class="card">
          <div class="img">
            <?php print('<a href="?s=article&id='.$dane[$n]['id'].'"><img class="card-img-top" src="'.$dane[$n]['image'].'" alt="Card image cap"></a>'); ?>
          </div>
          <div class="card-body">
            <h4 class="card-title"> <?php print($dane[$n]['topic']); ?> </h4>
            <p class="card-text"> <?php print($dane[$n]['description']); ?> </p>
            <br>
            <br>
            <?php print('<a href="?s=article&id='.$dane[$n]['id'].'" class="btn btn-dark">Cały post</a>'); ?>
          </div>
        </div>
        <br />
      </div>
      <?php $n = $n -1; ?>

    </div>
    <br/>
    <br/>
    <br>
    <hr>
    <div class="jumbotron jumbotron-fluid text-center center" style="">
      <h2 class="display-4">Za mało informacji?</h1>
      <p>Chcesz zobaczyć starsze posty? Zapraszamy do:</p>
       <p class="lead">
        <a class="btn btn-dark btn-lg" href="?s=archive" role="button">Archiwum</a>
      </p>
    </div>
  </div>
</div>
