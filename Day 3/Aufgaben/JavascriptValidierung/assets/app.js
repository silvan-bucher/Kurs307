$(function() {
  $("#form").on("submit", function() {
    var errors = [];

    if($("#firma").val() === ""){
      errors.push('Bitte geben Sie einen Firmennamen ein.');
    }

    if($("#email").val() === ""){
      errors.push('Bitte geben Sie eine Email-Addresse ein.');
    }

    if($("#telefon").val() === ""){
      errors.push('Bitte geben Sie eine Telefonnummer ein.');
    }

    var isValid = errors.length < 1;

    if(!isValid){
      renderErrors(errors);
    }

    return isValid;
  });

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
});
