<?php
  function Section ($dane)
    {
      var_dump($dane);

      echo '<article class="about">
              <h3 class="display-5">'.$dane[0]['name'].'</h3>
              <p class="offset-xl-2 col-xl-8"> </p>
              <div class="list-group offset-xl-3 col-xl-6">';

      $i= 0;
      while ($i < sizeof($dane))
        {
          echo '<a class="list-group-item disabled">
                  <div class="media-left">
                    <a href="'.$data[$i]['href'].'">
                      <img class="media-object" src="'.$data[$i]['img'].'" alt="...">
                    </a>
                  </div>
                  <h5 class="mb-1">'.$data[$i]['header'].'</h5>
                  <p class="mb-1">'.$data[$i]['body'].'</p>
                </a>';
          $i++;
        }

      echo ' </div>
             <p class="offset-xl-2 col-xl-8"></p>
            </article>';
    }
?>
