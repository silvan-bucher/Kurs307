<?php
  function isValidName($name){
    if(!isset($name) || empty($name)){
      return 'Bitte geben Sie einen Firmennamen ein.';
    }

    return true;
  }

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

  function isValidTelnr($telnr){
    $validChars = [' ', '+', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    if(!isset($telnr) || empty($telnr)){
      return 'Bitte geben Sie eine Telefonnummer ein.';
    }

    $tmptelnr = str_replace($validChars, "", $telnr);
    if(strlen($tmptelnr) !== 0){
      return 'Die Telefonnummer "' . htmlspecialchars($telnr) . '" ist ungültig.';
    }

    return true;
  }

  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $errors = [];

    if(isValidName($_POST['firma']) !== true){
      array_push($errors, isValidName($_POST['firma']));
    }

    if(isValidEmail($_POST['email']) !== true){
      array_push($errors, isValidEmail($_POST['email']));
    }

    if(isValidTelnr($_POST['telefon']) !== true){
      array_push($errors, isValidTelnr($_POST['telefon']));
    }
  }
