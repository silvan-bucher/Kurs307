function setPrice(){
  var total = 0;
  var currentID = "";
  var currentPrice = 0;
  var currentQuantity = 0;
  $(".js-quantity").each(function() {
    currentID = $(this).attr('id').replace("quantity-", "");
    currentPrice = products[currentID]["price"];
    currentQuantity = $(this).val();
    total += currentQuantity * currentPrice;
  });
  var vat = total / 100 * 8;
  var totalVat = total + vat;

  $("#total").text(total + " SFr.");
  $("#vat").text(vat + " SFr.");
  $("#total-vat").text(totalVat + " SFr.");
}

$(function() {
    console.log('app.js geladen!');
    setPrice();
    $('.js-quantity').change(function(){
      setPrice();
    });
    /*Validierung*/
    $('#orderForm').on('submit', function(){
      var errors = [];
      if($("#password").val().replace(" ", "") === ""){
        errors.push("Bitte Passwort eingeben.");
      }

      if($("#email").val().replace(" ", "") === ""){
        errors.push("Bitte E-Mail eingeben.");
      }

      $(".js-quantity").each(function() {
          if(this.val().replace(" ", "") === ""){
            errors.push("Bitte geben Sie immer Grösse und Anzahl ein.");
          }
      });

      var isValid = errors.length < 1;

      if(!isValid){
        renderErrors(errors);
      }
      return isValid;
    });
        /*RenderErrors*/
        function renderErrors(errors){
          var $errorList = $("#error-list");
          $errorList.html("");
          $errorList.addClass("error-wrapper");

          errors.forEach(function(error){
            $errorList.append('<li class="error-list-item">' + error + '</li>');
          });

          $errorList.show();

        }
});
