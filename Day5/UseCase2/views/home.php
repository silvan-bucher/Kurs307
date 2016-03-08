<h1 class="form-title">Mitmachen &amp; Gewinnen!</h1>

<p>Füllen Sie das folgende Formular aus um an unserem Gewinnspiel teilzunehmen.</p>

<form action="index.php" method="post" id="gewinnspiel">

    <fieldset>
        <legend class="form-legend">Gewinncode</legend>
        <div class="form-group">
            <label class="form-label" for="code">Ihr Gewinncode</label>
            <?php
            if(!$isValidWinCode){
              echo '<span class="error-msg">Ungültiger Code</span>';
            }
            ?>
            <input class="form-control" type="text" id="code" name="code" value="<?= htmlspecialchars($code ?? $_POST["code"] ?? "") ?>">
        </div>
    </fieldset>

    <fieldset>
        <legend class="form-legend">Kontaktdaten</legend>
        <div class="form-group">
            <label class="form-label" for="anrede">Wählen Sie eine Anrede</label>
            <?php
            if(!$isValidSalutation){
              echo '<span class="error-msg">Ungültige Anrede</span>';
            }
            ?>
            <select class="form-control" id="anrede" name="anrede">
                <?php $anredeValue = $_POST["anrede"] ?? ""; ?>
                <option value="Frau"<?php if($anredeValue === "Frau"){echo "selected";} ?>>Frau</option>
                <option value="Herr"<?php if($anredeValue === "Herr"){echo "selected";} ?>>Herr</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label" for="vorname">Ihr Vorname</label>
            <?php
            if(!$isValidFirstname){
              echo '<span class="error-msg">Ungültiger Vorname</span>';
            }
            ?>
            <input class="form-control" type="text" id="vorname" name="vorname" value="<?= htmlspecialchars($_POST["vorname"] ?? "") ?>">
        </div>

        <div class="form-group">
            <label class="form-label" for="nachname">Ihr Nachname</label>
            <?php
            if(!$isValidLastname){
              echo '<span class="error-msg">Ungültiger Nachname</span>';
            }
            ?>
            <input class="form-control" type="text" id="nachname" name="nachname" value="<?= htmlspecialchars($_POST["nachname"] ?? "") ?>">
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Ihre Email-Adresse</label>
            <?php
            if(!$isValidEmail){
              echo '<span class="error-msg">Ungültige Email</span>';
            }
            ?>
            <input class="form-control" type="email" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        </div>
    </fieldset>

    <div class="form-actions">
        <input class="btn btn-primary" type="submit" value="Gewinncode einlösen!">
        <a href="http://www.google.com" class="btn">Abbrechen</a>
    </div>

</form>
