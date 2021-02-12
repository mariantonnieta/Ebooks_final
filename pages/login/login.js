if (Cookies.get('login')) {
  let user = JSON.parse(Cookies.get('login'));
  if (user.type == 1) {
    window.location = '../dashboard/';
  } else {
    window.location = '../panel/';
  }
}

$(document).ready(function () {
  $('.modal').modal({ dismissible: false });
  $("#login_form").submit(function (event) {
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "../../core/controller/user_controller.php",
      data: {
        event: "login",
        email: $('#email').val(),
        password: $('#password').val()
      },
      success: function (response) {
        if (response.success && response.data) {
          Cookies.set('login', response.data);
          console.log(response.data)
          if (response.data.type == 1) {
            window.location = '../dashboard/';
          } else {
            if (Cookies.get('book')) {
              window.location = '../../';
            }
            window.location = '../panel/';
          }
        } else {
          $("#span").text("Usuario o contraseña incorrectos").show().fadeOut(3000);
        }
      }
    });
  });

  $("#user_form").submit(function (event) {
    event.preventDefault();
    $("#loader_users").removeClass('hide');
    $.ajax({
      type: "POST",
      url: "../../core/controller/user_controller.php",
      data: {
        event: "register",
        form: $(this).serialize()
      },
      success: function (response) {
        if (response.success && response.data) {
          Cookies.set('login', response.data);
          setTimeout(() => {
            $("#loader_users").addClass('hide');
            $('#modal_users').modal('close');
            window.location = '../panel/';
          }, 1000);
        } else {
          $("#loader_users").addClass('hide');
        }
      }
    });
  });
  
});