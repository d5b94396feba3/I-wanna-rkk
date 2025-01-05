$(document).ready(function() {

   window.togglePass=function(inputId, eyeIconId) {
      var passwordInput = $("#" + inputId);
      var eyeIcon = $("#" + eyeIconId);

      if (passwordInput.attr("type") === "password") {
        passwordInput.attr("type", "text");
        eyeIcon.removeClass("fa-eye-slash").addClass("fa-eye");
      } else {
        passwordInput.attr("type", "password");
        eyeIcon.removeClass("fa-eye").addClass("fa-eye-slash");
      }
    }

});

