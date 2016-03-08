<?php
/*Für jedes zu validierende Feld gibt es eine Validierungs-Funktion*/
function isValidSalutation($salutation){
  if(!isset($salutation) || empty($salutation)){
    return "Bitte wählen Sie eine Anrede.";
  }

  return true;
}

function isValidLastname($lastname){
  if(!isset($lastname) || empty($lastname)){
    return "Bitte geben Sie einen Nachnamen ein.";
  }

  return true;
}

function isValidPLZ($plz){
  if(strlen($plz) > 4){
    return "Die Postleitzahl ist zu lang.";
  }
  if(!ctype_digit($plz) && !empty($plz)){
    return "Die Postleitzahl darf nur aus Zahlen bestehen.";
  }

  return true;
}

function isValidTel($tel){
  if(!preg_match('~^[\s\d+()/]*$~', $tel)){
    return "Ungültige Telefonnummer";
  }
  return true;
}

function isValidEmail($email){
  if(!isset($email) || empty($email)){
    return 'Bitte geben Sie eine Email ein.';
  }

  if(strpos($email, '@') === false){
    return 'Die Email-Adresse ist ungültig.';
  }

  if(strpos($email, '.') === false){
    return 'Die Email-Adresse ist ungültig.';
  }

  return true;
}
// Formular wurde abgesendet
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  /*Allfällige Fehler werden dem Error-Array hinzugefügt*/
  if(isValidSalutation($_POST["anrede"]) !== true){
    array_push($errors, isValidSalutation($_POST["anrede"]));
  }
  if(isValidLastname($_POST["nachname"]) !== true){
    array_push($errors, isValidLastname($_POST["nachname"]));
  }
  if(isValidEmail($_POST["email"]) !== true){
    array_push($errors, isValidEmail($_POST["email"]));
  }

  if(isValidPLZ($_POST["plz"]) !== true){
    array_push($errors, isValidPLZ($_POST["plz"]));
  }

  if(isValidTel($_POST["tel"]) !== true){
    array_push($errors, isValidTel($_POST["tel"]));
  }

  if(count($errors) === 0) {
    /*
    Formular wurde korrekt ausgefüllt

    Entscheidung ob Dankes-Seite für Mann oder Frau angezeigt wird
    */
    if($_POST["anrede"] === "Herr"){
      $view = "man";
    } else if($_POST["anrede"] === "Frau") {
      $view = "woman";
    }
  }

}
