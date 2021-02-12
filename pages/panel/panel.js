let user = JSON.parse(Cookies.get('login'));
console.log(user)

let bookTable = $('#books_borrow_table').DataTable({
  lengthChange: false,
  ajax: {
    url: "../../core/controller/book_controller.php?event=fetchBorrow&id=" + user.id,
  },
  columns: [
    { data: 'id' },
    { data: 'name' },
    { data: 'author' },
    { data: 'isbn' },
    { data: 'duration_day' },
    { data: 'borrow_in' },
    { data: 'returned' },
    {
      data: null,
      className: "center",
      defaultContent: '<center><i class="material-icons blue-text devolver" style="cursor:pointer">autorenew</i></center>'
    }
  ]
});

$('#books_borrow_table tbody').on( 'click', '.devolver', function () {
  var book = bookTable.row( $(this).parents('tr') ).data();
  if (book.returned === "No") {
    $.ajax({
      type: "POST",
      url: "../../core/controller/book_controller.php",
      data: {
        event: "return",
        id: user.id,
        book: book.id
      },
      success: function (response) {
        if (response.success && response.data) {
          alert("El libro devuelto con exito")
          $('#books_borrow_table').DataTable().ajax.reload();
        } else {
          alert('Ocurrio un error intentelo mas tarde')
        }
      }
    });
  } else {
    alert("El libro ya fue devuelto")
  }
})

$("#exit").click(function() {
    var message = 'Desea salir del sistema';
    if (confirm(message)) {
      Cookies.remove('login');
      window.location = '../../';
    }
  })