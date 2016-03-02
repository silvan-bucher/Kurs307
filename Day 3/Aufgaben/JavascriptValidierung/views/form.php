<?php
  if(empty($errors) === false){
    echo '<ul class="error-wrapper">';
    foreach ($errors as $error) {
      echo '<li class="error-list-item">' . $error . '</li>';
    }
    echo '</ul>';
  }

?>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="assets/advancedApp.js"></script>

<ul id="error-list"> </ul>

<h1>Anmeldung</h1>
<p id="explain-text">Füllen Sie folgendes Formular aus um sich für den Event anzumelden.</p>
<form id="form" action="index.php" method="post" novalidate>

<fieldset class="form-thema">
  <legend>Kontaktdaten</legend>

  <div class="form-element">
    <label class="info-label" for="firma">Firma</label>
    <input type="text" id="firma" name="firma" value=<?= htmlspecialchars($_POST['firma'] ?? ' ')?>>
  </div>

  <div class="form-element">
    <label class="info-label" for="email">E-Mail Addresse</label>
      <input type="email" id="email" name="email" value=<?= htmlspecialchars($_POST['email'] ?? ' ')?>>
  </div>

  <div class="form-element">
    <label class="info-label" for="telefon">Telefon</label>
    <input type="text" id="telefon" name="telefon" value= <?= htmlspecialchars($_POST['telefon'] ?? ' ')?>>
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
