<?php
function selectData($rowName, $rowCount)
{
  include './config/db.php';
  $dataLine = $conn->query("SELECT " . "*" . " FROM expl4ined_dane WHERE 1");

  $rowArr = array();
  if ($dataLine->num_rows > 0) {
    $n=1;
    while($row = $dataLine->fetch_assoc() && $rowCount > $n) {
      $rowArr[] = $row;
      $n = $n + 1;
    }
} else {
    echo "0 results";
}
return $rowArr;
}
 ?>
