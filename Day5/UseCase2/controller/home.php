<?php
function checkWincode($winCode, $codes, $file, $userData){
  if(!in_array($winCode, $codes)){
    return false;
  }
  $handle = fopen($file, "r+");
  $csv = [];
  $allLinesRead = false;
  $line = null;
  while(!$allLinesRead){
    $line = fgetcsv($handle);
    if($line !== null && $line !== false){
      array_push($csv, $line);
    } else {
      $allLinesRead = true;
    }
  }
  foreach ($csv as $value) {
    if($value[0] === $winCode){
      return false;
    }
  }
  fputcsv($handle, $userData);
  fclose($handle);
  return true;
}

function isValidWinCode($winCode){
  if(!isset($winCode) || str_replace(" ", "", $winCode) === ""){
    return false;
  }
  return true;
}

function isValidSalutation($anrede){
  if(!isset($anrede) || str_replace(" ", "", $anrede) === ""){
    return false;
  }
  if($anrede !== "Herr" && $anrede !== "Frau"){
    return false;
  }
  return true;
}

function isValidFirstname($firstname){
  if(!isset($firstname) || str_replace(" ", "", $firstname) === ""){
    return false;
  }
  return true;
}

function isValidLastname($lastname){
  if(!isset($lastname) || str_replace(" ", "", $lastname) === ""){
    return false;
  }
  return true;
}

function isValidEmail($email){
  if(!isset($email) || empty($email)){
    return false;
  }

  if(strpos($email, '@') === false){
    return false;
  }
  return true;
}
// Formular wurde abgesendet
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $isValidWinCode = isValidWinCode($_POST["code"]);
      $isValidSalutation = isValidSalutation($_POST["anrede"]);
      $isValidFirstname = isValidFirstname($_POST["vorname"]);
      $isValidLastname = isValidLastname($_POST["nachname"]);
      $isValidEmail = isValidEmail($_POST["email"]);
      if($isValidWinCode && $isValidFirstname && $isValidLastname && $isValidEmail){
        $userData = [$_POST["code"], $_POST["anrede"], $_POST["vorname"], $_POST["nachname"], $_POST["email"]];
        $isValidWinCode = checkWincode($_POST["code"], $codes, $file, $userData);
      }
      if($isValidWinCode && $isValidFirstname && $isValidLastname && $isValidEmail){
        $view = "success";
      }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $code = $_GET["code"] ?? "";
}
