<?php
include __DIR__ . "/../data/plz.php";

$ort = "";

if(array_key_exists($_POST["plz"], $plz)){
  $ort = $plz[$_POST["plz"]];
}



if($ort !== ""){
  echo '<p>Viele Grüsse nach ' . $ort . '.</p>';
} else {
  echo '<p>Ihr Ort wurde leider nicht gefunden.</p>';
}
