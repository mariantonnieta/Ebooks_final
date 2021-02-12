const urlParams = new URLSearchParams(window.location.search);
const token = urlParams.get('token');

$("#password_form").submit(function (event) {
    event.preventDefault();
    if ($('#password').val() == $('#password_confirm').val()) {
        $("#loader_email").removeClass('hide');
        $.ajax({
            type: "POST",
            url: "../core/controller/user_controller.php",
            data: {
              event: "restore-password",
              password: $('#password').val(),
              token: token
            },
            success: function (response) {
              if (response.success && response.data) {
                  M.toast({
                      html: 'Contraseña cambiada con exito', 
                      classes: 'rounded', 
                      timeRemaining: 5000
                  });
                  setTimeout(() => {
                    $("#loader_email").addClass('hide');
                    window.location = 'login/';
                  }, 1500);
              } else {
                    $("#loader_email").addClass('hide');
                  M.toast({
                      html: 'Ocurrio un problema al cambiar la contraseña, intentelo más tarde', 
                      classes: 'rounded', 
                      timeRemaining: 5000
                  });
              }
            }
        });
    } else {
        M.toast({
            html: 'Las contraseñas deben de coincidir', 
            classes: 'rounded', 
            timeRemaining: 5000
        });
    }
  });