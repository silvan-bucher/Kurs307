<?php
function getWord($bottleCount){
  switch($bottleCount){
    case 0:
      return "no more bottles";
      break;
    case 1:
      return "1 bottle";
      break;
    default:
      return $bottleCount . " bottles";
  }
}

for($bottleCount = 99; $bottleCount > 0; $bottleCount--){
  echo getWord($bottleCount) . " of beer on the wall, " . getWord($bottleCount) . " of beer.\n";
  echo "Take one down and pass it around, " . getWord($bottleCount - 1) . " of beer on the wall.\n\n";
}

echo "No more bottles of beer on the wall, no more bottles of beer.\n";
echo "Go to the store and buy some more, 99 bottles of beer on the wall.";
