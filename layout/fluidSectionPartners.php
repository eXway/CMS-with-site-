<?php
  function Section ($dane)
    {
      echo    '<div class="jumbotron jumbotron-fluid text-center center">
                <h1 class="display-4">'.$dane[0]['name'].'</h1>
                <hr class="my-4">';

      $i = 0;
      while ($i < sizeof($dane)){
        echo    '<a href="'.$dane[$i]['href'].'">
                    <img style="max-width: 300px;" src="'.$dane[$i]['img'].'" class="img-fluid" alt="Placeholder image">
                  </a>
                  <br />
                  <br />
                  <p class="offset-xl-2 col-xl-8">
                    '.html_entity_decode($dane[$i]['body']).'</p>';
        $i ++;
      }

      echo    '</div>';
    }
?>
