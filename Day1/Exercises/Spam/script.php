<?php
$input = [
    'Neue Aktionen von Ihrem Computerteile-Händler.',
    'Vergrössern Sie jetzt ihr SPAM mit SPAM.',
    'SPAM kann ihnen dabei helfen wieder ruhig zu schlafen.',
    'Kennen Sie Justin Bieber? Finden Sie andere Singles in Ihrer Nähe.',
    'Wenn spam zum Problem wird, haben Sie ein Problem.'
];
$counter = 0;
foreach ($input as $value) {
  if(stristr($value, "SPAM") === false){
    echo "Satz $counter ist OK\n";
  } else {
    echo "Satz $counter ist SPAM\n";
  }
  $counter++;
}
