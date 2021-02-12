$(document).ready(function () {
    $("#restore_form").submit(function (event) {
        $("#loader_email").removeClass('hide');
        event.preventDefault();
        $.ajax({
          type: "POST",
          url: "../../core/controller/user_controller.php",
          data: {
            event: "send-email",
            email: $('#email').val()
          },
          success: function (response) {
            if (response.success && response.data) {
                M.toast({html: 'Se envio un correo para restablecer su contraseña', classes: 'rounded', timeRemaining: 5000});
            } else {
                M.toast({html: 'Ocurrio un error, revise su correo.', classes: 'rounded', timeRemaining: 5000});
            }
            setTimeout(() => {
                $("#loader_email").addClass('hide');
            }, 1200);
          }
        });
      });
});