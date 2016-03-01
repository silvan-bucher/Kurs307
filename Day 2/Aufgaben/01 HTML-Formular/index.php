<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>
  <title>Anmeldung</title>
</head>
<body>
  <div class="wrapper">

    <h1>Anmeldung</h1>
    <p id="explain-text">Füllen Sie folgendes Formular aus um sich für den Event anzumelden.</p>
  <form action="index.php" method="post">

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
