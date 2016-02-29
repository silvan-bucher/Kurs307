<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Clown</title>
</head>
<body>
<style>
    .markiert {
        color: red;
        font-weight: bold;
    }
</style>
    <?php
    $clowns = ["Eugen Rosai", "Alfredo Smaldini", "Charlie Rivel", "Carl Godlewski", "Oleg Popow", "Herschel Krustofski"];
    $ending = "ski";
    asort($clowns);
    echo "<ul>";
    foreach ($clowns as $clown) {
      if(substr($clown, - strlen($ending)) == $ending){
        echo "<li class=markiert>$clown</li>";
      } else {
        echo "<li>$clown</li>";
      }
    }
    echo "</ul>";
    ?>
</body>
</html>
