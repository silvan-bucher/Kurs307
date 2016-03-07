<?php
function isValidEmail($email){
  if(!isset($email) || empty($email)){
    return 'Bitte geben Sie eine Email-Addresse ein.';
  }

  if(strpos($email, '@') === false){
    return 'Die Email-Adresse "' . htmlspecialchars($email) . '" ist ungültig.';
  }

  if(strpos(substr($email, strpos($email, '@')), '.') === false){
    return 'Die Email-Adresse "' . htmlspecialchars($email) . '" ist ungültig.';
  }
  return true;
}

function isValidPassword($password){
  if(!isset($password) || empty($password)){
    return 'Bitte geben Sie ein Passwort ein.';
  }
  return true;
}

function isValidQuantity($quantity){
  if(!isset($quantity) || $quantity === ""){
    return 'Bitte geben Sie immer Grösse und Anzahl ein.';
  }
  return true;
}
// Formular wurde abgesendet
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $success = false;
  if(isValidEmail($_POST["Customer"]["email"]) !== true){
    array_push($errors, isValidEmail($_POST["Customer"]["email"]));
  }
  if(isValidPassword($_POST["Customer"]["password"]) !== true){
    array_push($errors, isValidPassword($_POST["Customer"]["password"]));
  }
  $errorIsSet = false;
  foreach ($products as $productID => $product) {
    if(!$errorIsSet){
      if(isValidQuantity($_POST["Order"][$productID]["quantity"]) !== true){
        array_push($errors, isValidQuantity($_POST["Order"][$productID]["quantity"]));
        $errorIsSet = true;
      }
    }
  }
  if(count($errors) === 0) {
      $success = true;
  }
}
