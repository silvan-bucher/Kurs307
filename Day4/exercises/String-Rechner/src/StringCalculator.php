<?php
function calculateSum($input){
  if($input == ""){
    return false;
  }
  $numbers = explode(',', $input);
  if(count($numbers) > 6){
    return false;
  }
  $result = 0;
  foreach ($numbers as $number) {
    if($number <= 100 && $number >= 0){
      $result += $number;
    }
  }
  return $result;
}
