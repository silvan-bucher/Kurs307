<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <title>Pixel</title>
</head>
<body>
    <?php
    function getXFromCoordinateString(string $coordinateString){
      return (int) strstr($coordinateString, "|", true);
    }
    function getYFromCoordinateString(string $coordinateString){
      return (int) trim(strrchr($coordinateString, "|"), "|");
    }
    function hasToBePainted($row, $col, $pixels){
      foreach ($pixels as $coordinate) {
        if(getXFromCoordinateString($coordinate) == $row && getYFromCoordinateString($coordinate) == $col){
          return true;
        } else {
          return false;
        }
      }
    }

    $cols = 4;
    $rows = 4;
    $pixels = $_GET["pixels"];
    //just some poor debuging
    if(hasToBePainted(2, 2, $pixels)){
      echo "true";
    } else {
      echo "false";
    }
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
    for($i = 0; $i < $rows; $i++){
      echo "<tr>";
      for($i2 = 0; $i2 < $cols; $i2++){
        if(hasToBePainted($i, $i2, $pixels)){
          echo "<td class=mark></td>";
        } else {
          echo "<td></td>";
        }
      }
      echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
