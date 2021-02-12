$.ajax({
  type: "GET",
  url: "core/controller/category_controller.php",
  data: { event : "fetchAll" },
  success: function (response) {
    if(response.success){
      response.data.forEach(element => {
        $("#category_bar ul").append('<li><a href="#'+element.id+'">'+element.name+'</a></li>');
      });
    }
  }
});

$.ajax({
  type: "GET",
  url: "core/controller/book_controller.php",
  data: { event : "fetchAll" },
  success: function (response) {
    if(response.success){
      $("#content").append('<div class="b e" id="books"></div>')
      response.data.forEach(element => {
        $("#books").append(getItem(element));
      });
      setTimeout(() => {
        $.getScript("resource/js/materialize.min.opt.js");
      }, 1000);
    }
  }
});

function access() {
  if (Cookies.get('login')) {
    let user = JSON.parse(Cookies.get('login'));
    if (user.type == 1) {
      window.location = 'pages/dashboard/';
    } else {
      window.location = 'pages/panel/';
    }
  } else {
    window.location= 'pages/login/';
  }
}

$(document).ready(function() {
  $.getScript("resource/js/materialize.min.opt.js");
});

function getBorrow(book_id) {
  Cookies.set('book', book_id);
  if (Cookies.get('login')) {
    let user = JSON.parse(Cookies.get('login'));
    let days = prompt("¿Cuantos días desea prestarlo?");
    if (days) {
      $.ajax({
        type: "GET",
        url: "core/controller/book_controller.php",
        data: { 
          event : "borrow",
          book: book_id,
          id: user.id,
          time: days
        },
        success: function (response) {
          if(response.success){
            alert("Libro solicitado con exito")
          } else {
            alert("Ocurrio un erro al intentar prestar el libro")
          }
        }
      });
    }
  } else {
    window.location= 'pages/login/';
  }
}

function getItem(book) {
  return '<div class="d hx hf gu gallery-item gallery-expand ce '+book.id_category+'"> \
    <div class="gallery-curve-wrapper"> \
      <a class="gallery-cover gray"> \
        <img class="responsive-img" src="resource/images/books/'+book.image+'" alt="placeholder" crossOrigin="anonymous">\
      </a>\
      <div class="gallery-header">\
        <b><h5>'+book.name+'</h5></b>\
      </div>\
      <div class="gallery-body">\
        <div class="title-wrapper">\
          <h3>'+book.name+'</h3>\
          <span class="gj">Por: '+book.autor+'</span><br>\
          <span class="gj">Publicado: '+book.publisher+'</span><br>\
          <span class="gj">Idioma: '+book.language+'</span>\
        </div>\
        <p class="fi">'+book.description+'</p> \
      </div>\
      <div class="gallery-action">\
        <a href="#" onClick="getBorrow('+book.id+')" class="btn-large waves-effect waves-light" style="background-color: #000 !important;"><span style="color: black">PRESTAR</span></a>\
      </div>\
    </div>\
  </div>';
}