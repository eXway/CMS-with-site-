<?php
  function Section ($dane)
  {
      echo '<div class="jumbotron jumbotron-fluid text-center center">
        <h1 class="display-4">'.$dane[0]['name'].'</h1>
        <hr class="my-4">';

      $i = 0;
      while ($i < sizeof($dane)){
        echo '<strong>'.$dane[$i]['header'].'</strong><br><br>
          '.html_entity_decode($dane[$i]['body']);
          if($dane[$i]['href'] != NULL)
            {
              echo '<p class="lead">
                <a class="btn btn-dark btn-lg" href="'.$dane[$i]['href'].'" role="button">Przejdź</a>
              </p>';
            }

        $i++;
      }
      echo '</div>';
    }
?>
