$(function() {
  $("#form").on("submit", function() {
    var isValid = true;

    var fields = [{id: "firma", message: "Bitte geben Sie einen Firmennamen ein."},
                  {id: "email", message: "Bitte geben Sie eine Email-Addresse ein."},
                  {id: "telefon", message: "Bitte geben Sie eine Telefonnummer ein."}
                ];

    $(".has-error").removeClass("has-error");

    $("label .error-msg").remove();
    $(".error-textfield").removeClass("error-textfield");

    fields.forEach(function(field){

      var $field = $("#" + field.id);

      if($field.val() === ""){
        isValid = false;

        var errorMessage = '<span class="error-msg">'
                                 + field.message
                                 + '</span>';

        $field.parent().addClass("has-error").find("label").append(errorMessage);
        $field.addClass("error-textfield");
      }
    });
    return isValid;
  });
});
