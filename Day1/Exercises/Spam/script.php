<?php
$input = [
    'Neue Aktionen von Ihrem Computerteile-Händler.',
    'Vergrössern Sie jetzt ihr SPAM mit SPAM.',
    'SPAM kann ihnen dabei helfen wieder ruhig zu schlafen.',
    'Kennen Sie Justin Bieber? Finden Sie andere Singles in Ihrer Nähe.',
    'Wenn spam zum Problem wird, haben Sie ein Problem.'
];

foreach ($input as $value) {
  $index =  array_search($value, $input);
  if(stristr($value, "SPAM") === false && stristr($value, "singles") === false){
    echo "Satz $index ist OK\n";
  } else {
    echo "Satz $index ist SPAM\n";
  }
}
