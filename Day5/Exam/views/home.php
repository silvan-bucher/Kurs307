<!--Diese Liste wird für die JS-error-anzeige gebraucht-->
<ul id="error-list"> </ul>
<?php
  /*Darstellung des PHP-Error-Arrays*/
  if(empty($errors) === false){
    echo '<ul class="error-wrapper">';
    foreach ($errors as $error) {
      echo '<li class="error-list-item">' . $error . '</li>';
    }
    echo '</ul>';
  }
?>
<!--Hauptformular-->
<form action="index.php" method="post" id="kundendaten">

    <fieldset>
        <legend>Daten</legend>

        <div>
          <label for="anrede">Anrede</label>
          <select id="anrede" name="anrede">
            <option value="Frau">Frau</option>
            <option value="Herr">Herr</option>
          </select>
        </div>

        <div>
          <label for="vorname">Vorname</label>
          <input type="text" id="vorname" name="vorname" value="">
        </div>

        <div>
          <label for="nachname">Nachname</label>
          <input type="text" id="nachname" name="nachname" value="">
        </div>

        <div>
          <label for="email">E-Mail</label>
          <input type="email" id="email" name="email" value="">
        </div>

        <div>
          <label for="plz">Postleitzahl</label>
          <input type="text" id="plz" name="plz" value="">
        </div>

        <div>
          <label for="tel">Telefon</label>
          <input type="text" id="tel" name="tel" value="">
        </div>

        <div>
          <input id="submit" type="submit" value="Senden">
        </div>
    </fieldset>
