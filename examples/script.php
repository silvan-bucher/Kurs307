<?php
function getTextFunction(){
  return "Hello\n<br>";
}

$date = date('d.m.Y');
echo 'Das heutige Datum ist: ' . $date . "\n<br>";
$edelmetalle = ['Gold', 'Platin', 'Iridium', 'Silber'];
print_r($edelmetalle);
echo "\n<br>";
echo getTextFunction();
if(1 > 2){
  echo "true\n<br>";
} else {
  echo "false\n<br>";
}
