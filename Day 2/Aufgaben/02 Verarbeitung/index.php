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
      return 'Die Email-Adresse "' . $email . '" ist ungültig.';
    }

    if(strpos(substr($email, strpos($email, '@')), '.') === false){
      return 'Die Email-Adresse "' . $email . '" ist ungültig.';
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
      return 'Die Telefonnummer "' . $telnr . '" ist ungültig.';
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>
  <title>Anmeldung</title>
</head>
<body>
  <div class="wrapper">
    <?php
      if(empty($errors) === false){
        echo '<div class="error-wrapper">';
        echo '<ul>';
        foreach ($errors as $error) {
          echo '<li class="error-list-item">' . $error . '</li>';
        }
        echo '<ul>';
        echo '</div>';
      }

    ?>
    <!--<div class="error-wrapper">
      <ul>
        <li class="error-list-item">Bitte geben Sie einen Firmennamen ein.</li>
        <li class="error-list-item">Bitte geben Sie eine Email-Addresse ein.</li>
        <li class="error-list-item">Die Email-Adresse "google.com" ist ungültig.</li>
        <li class="error-list-item">Bitte geben Sie eine Telefonnummer ein.</li>
        <li class="error-list-item">Die Telefonnummer "041 345 34 45" ist ungültig.</li>
        <li class="error-list-item">Bitte geben Sie eine Anzahl Teilnehmer ein.</li>
        <li class="error-list-item">Die angegebene Teilnehmeranzahl "abc" ist ungültigt.</li>
        <li class="error-list-item">Die Teilnehmeranzahl muss zwischen 1 und 60 liegen.</li>
      </ul>
    </div>-->

    <h1>Anmeldung</h1>
    <p id="explain-text">Füllen Sie folgendes Formular aus um sich für den Event anzumelden.</p>
  <form action="index.php" method="post" novalidate>

    <fieldset class="form-thema">
      <legend>Kontaktdaten</legend>

      <div class="form-element">
        <label for="firma">Firma</label>
        <input type="text" id="firma" name="firma" required>
      </div>

      <div class="form-element">
        <label for="email">E-Mail Addresse</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-element">
        <label for="telefon">Telefon</label>
        <input type="text" id="telefon" name="telefon" required>
      </div>

    </fieldset>

    <fieldset class="form-thema">
      <legend>Angaben zur Buchung</legend>

      <div class="form-element">
        <label for="anzahlPersonen">Anzahl Personen</label>
        <input type="number" min=1 max=50 id="anzahlPersonen" name="anzahlPersonen" required>
      </div>

      <div id=hotel class="form-element">
        <label for="hotel">Hotel</label>

        <input type="radio" id="hotelr1" value="icd" name="hotel" required checked>
        <label class="inline-label" for="hotelr1">InterContinental Davos</label>

        <input type="radio" id="hotelr2" value="sgb" name="hotel" required>
        <label class="inline-label" for="hotelr2">Steinberger Grandhotel Belvédère</label>

      </div>

      <div class="form-element">

        <label for="shuttlebus">Mit Shuttlebus</label>
        <input type="checkbox" name="shuttlebus" id="shuttlebus">

      </div>

      <div class="form-element">
        <label for="abendprogramm">Abendprogramm</label>
        <select name="abendprogramm" id="abendprogramm" required>
          <option value="kein" selected>Kein Abendprogramm</option>
          <option value="billard">Billardturnier</option>
          <option value="bowling">Bowlingturnier</option>
          <option value="wein">Weindegustation</option>
          <option value="kochen">asiatischer Kochkurs</option>
          <option value="tanzen">Tankzurs für Webentwickler</option>
          <option value="yoga">Ying & Yang Yoga Einsteigerkurs</option>
        </select>
      </div>

    </fieldset>

    <fieldset class="form-thema">
      <legend>Anmeldung abschliessen</legend>
      <div class="form-element">
        <label for="bemerkungen">Bemerkungen</label>
        <textarea id="bemerkungen" name="bemerkungen" rows="8" cols="40"></textarea>
      </div>

      <div class="form-element">
        <input type="button" onclick="location.href='http://google.com';" value="Abbrechen" />
        <input type="submit" value="Anmeldung abschliessen"></button>
      </div>

    </fieldset>

  </form>
  </div>
</body>
</html>
