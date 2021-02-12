let user = JSON.parse(Cookies.get('login'));
$("#user_name").text(user.name + ' ' + user.last_name);
$("#user_email").text(user.email);
getUserCount();
getBookCount();

function getUserCount() {
  $.ajax({
    type: "POST",
    url: "../../core/controller/default_controller.php",
    data: {
      event: "query",
      query: 'select count(id) as total from users'
    },
    success: function (response) {
      if (response.success && response.data) {
        $("#users").text(response.data[0].total);
      }
    }
  });
}

function getBookCount() {
  $.ajax({
    type: "POST",
    url: "../../core/controller/default_controller.php",
    data: {
      event: "query",
      query: 'select count(id) as total from book'
    },
    success: function (response) {
      if (response.success && response.data) {
        $("#books").text(response.data[0].total);
      }
    }
  });
}

$.ajax({
  type: "POST",
  url: "../../core/controller/default_controller.php",
  data: {
    event: "query",
    query: 'select count(id) as total from book_borrow'
  },
  success: function (response) {
    if (response.success && response.data) {
      $("#books_borrow").text(response.data[0].total);
    }
  }
});

$(document).ready(function () {
  $('.tabs').tabs();
  $('.modal').modal({ dismissible: false });
  $('.sidenav').sidenav();
  $('select').formSelect();

  $("#user_form").submit(function (event) {
    event.preventDefault();
    $("#loader_users").removeClass('hide');
    $.ajax({
      type: "POST",
      url: "../../core/controller/user_controller.php",
      data: {
        event: "insert",
        form: $(this).serialize()
      },
      success: function (response) {
        if (response.success && response.data) {
          $('#users_table').DataTable().ajax.reload();
          setTimeout(() => {
            $("#loader_users").addClass('hide');
            $('#modal_users').modal('close');
            getUserCount();
          }, 2000);
          
        } else {
          $("#loader_users").addClass('hide');
        }
      }
    });
  });

  $('select').on('contentChanged', function() {
    $(this).formSelect();
  });

  $.ajax({
    url: "../../core/controller/default_controller.php",
    type: "GET",
    data : {
      event: "query",
      query: 'select * from category'
    },
    success: function(response){
      if (response.data) {
        response.data.forEach(element => {
          console.log(element);
          var option = $("<option>").attr("value", element.id).text(element.name);
          $("#category").append(option);
        });
        $("#category").trigger('contentChanged');
      }
    }
  });
  
  

  let bookTable = $('#books_table').DataTable({
    lengthChange: false,
    ajax: {
      url: "../../core/controller/book_controller.php?event=fetchAll",
    },
    columns: [
      { data: 'id' },
      { data: 'name' },
      { data: 'author' },
      { data: 'language' },
      { data: 'category' },
      { data: 'publisher' },
      {
        data: null,
        className: "center",
        defaultContent: '<center><i class="material-icons red-text delete" style="cursor:pointer">delete_forever</i></center>'
      }
    ]
  });

  $('#books_table tbody').on( 'click', '.delete', function () {
    var book = bookTable.row( $(this).parents('tr') ).data();
    var message = 'Esta seguro de eliminar el libro ' + book.name;
    if (confirm(message)) {
      $.ajax({
        type: "POST",
        url: "../../core/controller/book_controller.php",
        data: {
          event: "delete",
          id: book.id
        },
        success: function (response) {
          if (response.success && response.data) {
            $('#books_table').DataTable().ajax.reload();
            setTimeout(() => {
              getBookCount();
            }, 1000);   
          } else {
            alert('Ocurrio un error intentelo mas tarde')
          }
        }
      });
    }
  });

  $("#book_form").on('submit', function (events) {
    events.preventDefault();
    var formData = new FormData($("#book_form")[0]);
    $("#loader_book").removeClass('hide');
    $.ajax({
        url: "../../core/controller/book_controller.php?event=insert",
        type: "POST",
        data : formData,
        processData: false,
        contentType: false,
        beforeSend: function() {

        },
        success: function(result){
          if (result.success) {
            $('#books_table').DataTable().ajax.reload();
            setTimeout(() => {
              $("#loader_book").addClass('hide');
              $('#modal_books').modal('close');
              getBookCount();
            }, 2000);  
          }else {
            alert(result.message);
          }
          
        }
    });
});


  let userTable = $('#users_table').DataTable({
    lengthChange: false,
    ajax: {
      url: "../../core/controller/user_controller.php?event=fetchAll",
    },
    columns: [
      { data: 'id' },
      { data: 'name' },
      { data: 'last_name' },
      { data: 'email' },
      { data: 'type' },
      {
        data: null,
        className: "center",
        defaultContent: '<center><i class="material-icons red-text delete" style="cursor:pointer">delete_forever</i></center>'
      }
    ]
  });

  $('#users_table tbody').on( 'click', '.delete', function () {
    let userRow = userTable.row( $(this).parents('tr') ).data();
    const message = 'Esta seguro de eliminar a ' + userRow.name + ' ' + userRow.last_name;
    if (confirm(message)) {
      $.ajax({
        type: "POST",
        url: "../../core/controller/user_controller.php",
        data: {
          event: "delete",
          id: userRow.id
        },
        success: function (response) {
          if (response.success && response.data) {
            $('#users_table').DataTable().ajax.reload();
            setTimeout(() => {
              getUserCount();
            }, 1000); 
          } else {
            alert('Ocurrio un error intentelo mas tarde')
          }
        }
      });
    }
  });


  $("#exit").click(function() {
    var message = 'Desea salir del sistema';
    if (confirm(message)) {
      Cookies.remove('login');
      window.location = '../../';
    }
  })
});
