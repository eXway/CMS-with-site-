<?php

  $articleId = $_GET['id'];
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

  $articleRowQuery = "SELECT * FROM `expl4ined_posty` WHERE `id`=".$articleId;
  $result = $conn->query($articleRowQuery);
  if ($result == FALSE){
    include 'errors/404.html';
    die;
  }
  $articleRow = $result->fetch_array();
?>

<div class="container-fluid">
  <div class="row">
    <div class="offset-xl-2 col-xl-9">
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="img article-img" data-toggle="modal" data-target="#exampleModalCenter">
              <img src="<?php echo $articleRow['image']; ?>" alt="">
            </div>
            <div class="card-body">
              <h4 class="card-title"><?php echo $articleRow['topic']; ?></h4>
              <h6 class="card-subtitle mb-2 text-muted"><?php echo $articleRow['author']." / ".$articleRow['date']; ?></h6>
              <br>
              <p class="card-text"><?php echo html_entity_decode($articleRow['body']); ?></p>
              <br>
              <br>
              <a target="_blank" rel="noopener noreferrer" class="btn btn-dark" href="<?php echo $articleRow['link']; ?>"> Facebook </a>
            </div>
          </div>
          <br>
        </div>

        <div class="offset-xl-1 col-xl-3">
          <h3>Ostatnie Posty</h3>
          <hr>
          <div class="row">

          <?php

            while ($n > 1)
              {
                echo '<div class="col-xl-12">
                  <a class="article-thumbnail-link" href="?s=article&id='.$dane[$n]['id'].'">
                    <div class="img article-thumbnail">
                      <img src="'.$dane[$n]['image'].'" alt="">
                    </div>
                    <h5 class="card-title">'.$dane[$n]['topic'].'</h4>
                    <h6 class="card-subtitle mb-2 text-muted">'.$dane[$n]['description'].'</h6>
                  </a>
                  <hr>
                </div>';
                $n--;
              }
           ?>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $articleRow['topic']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img width="100%" src="<?php echo $articleRow['image']; ?>" alt="">
      </div>
    </div>
  </div>
</div>
