$(function() {
    console.log('app.js geladen!');

    /*Wird ausgeführt wenn auf Senden-Button geklickt wird*/
    $("#kundendaten").on("submit", function() {
      var errors = [];

      if($("#anrede").val() === ""){
        errors.push('Bitte wählen Sie eine Anrede.');
      }

      if($("#nachname").val() === ""){
        errors.push('Bitte geben Sie einen Nachnamen ein.');
      }

      if($("#email").val() === ""){
        errors.push('Bitte geben Sie eine Email ein.');
      } else if($("#email").val().indexOf("@") == -1){
        errors.push('Die Email-Adresse ist ungültig.');
      } else if($("#email").val().indexOf(".") == -1){
        errors.push('Die Email-Adresse ist ungültig.');
      }

      if($("#plz").val().length > 4){
        errors.push('Die Postleitzahl ist zu lang.');
      } else if(!isInt($("#plz").val()) && $("#plz").val().length != 0){
        errors.push('Die Postleitzahl darf nur aus Zahlen bestehen.');
      }

      var isValid = errors.length < 1;

      if(!isValid){
        renderErrors(errors);
      } else {
        /*Popup, ob wirklich gesendet werden soll*/
        if(window.confirm("Möchten Sie wirklich senden?")){
          return true;
        } else {
          return false;
        }
      }

      return false;
    });

    /*Persönlicher sende-button nach vornamen generieren*/
    $('#vorname').keyup(function(){
      console.log("im in here");
      var vorname = $(this).val();
      if(vorname.trim() == ""){
        $('#submit').val("Senden");
      } else {
        $('#submit').val(vorname + ", schicke jetzt das Formular ab.");
      }
    });
    
});

/*Zeigt die Error-Liste an*/
function renderErrors(errors) {

     var $errorList = $('#error-list');

     // Bestehende <li> entfernen
     $errorList.html('');
     $errorList.addClass("error-wrapper");

     errors.forEach(function(error) {
         $errorList.append('<li class="error-list-item">' + error + '</li>');
     });

     $errorList.show();
 }

 /*Prüft, ob der Parameter eine Ganzzahl ist*/
 function isInt(value) {
  return !isNaN(value) &&
         parseInt(Number(value)) == value &&
         !isNaN(parseInt(value, 10));
}
