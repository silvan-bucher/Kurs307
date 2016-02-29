<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <title>Pixel</title>
</head>
<body>
    <?php
    $cols = 4;
    $rows = 4;

    if(isset($_GET["cols"])){
      $parameterCols = (int) $_GET["cols"];
      if($parameterCols <= 60 && $parameterCols >= 1){
        $cols = $parameterCols;
      }
    }
    if(isset($_GET["rows"])){
      $parameterRows = (int) $_GET["rows"];
      if($parameterRows <= 60 && $parameterRows >= 1){
        $rows = $parameterRows;
      }
    }

    echo "<table>";
    for($rows; $rows > 0; $rows--){
      $colsToIterate = $cols;
      echo "<tr>";
      for($colsToIterate; $colsToIterate > 0; $colsToIterate--){
        echo "<td></td>";
      }
      echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
