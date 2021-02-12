<div style="margin: 15px">
    <table id="books_table" class="striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Idioma</th>
                <th>Categoría</th>
                <th>Publicado en</th>
                <th></th>
            </tr>
        </thead>
    </table>

  <div class="fixed-action-btn">
    <a href="#modal_books" class="btn-floating btn-large modal-trigger" style="background-color: <?php echo primary_color ?>;">
      <i class="large material-icons">add</i>
    </a>
  </div>

  <div id="modal_books" class="modal modal-fixed-footer">
  <form id="book_form">
      <div class="modal-content">
        <h4>Agregar nuevo usuario</h4>
        <p>Todos los campos son requeridos</p>
        <div class="row">
          <div class="row">
            <div class="input-field offset-s1 col s3">
              <input id="name" name="name" type="text" class="validate" required>
              <label for="name">Nombre del libro</label>
            </div>
            <div class="input-field col s3">
              <input id="author" name="author" type="text" class="validate" required>
              <label for="author">Autor</label>
            </div>
            <div class="input-field col s3">
              <input id="isbn" name="isbn" type="text" class="validate" required>
              <label for="isbn">ISBN</label>
            </div>
          </div>
          
          <div class="row">
              <div class="input-field offset-s1 col s3">
                <input id="description" name="description" type="text" class="validate" required>
                <label for="description">Descripción</label>
              </div>

              <div class="input-field col s3">
                <input id="publisher" name="publisher" type="text" class="validate" required>
                <label for="publisher">Fecha de publicación</label>
              </div>
              <div class="input-field col s3">
                <select id="language" name="language" required>
                  <option value="" disabled selected>Selecciona una opción</option>
                  <option value="Español">Español</option>
                  <option value="Ingles">Ingles</option>
                </select>
                <label>Idioma del libro</label>
              </div>
            </div>
            <div class="row">
            <div class="offset-s1 input-field col s3">
                <select id="category" name="category" required>
                  <option value="" disabled selected>Selecciona una opción</option>
                </select>
                <label>Categoría</label>
              </div>
              <div class="col s6">
                <div class="file-field input-field">
                  <div class="btn white">
                    <span class="black-text">Portada</span>
                    <input type="file" name="file" id="file" accept="image/*">
                  </div>
                  <div id="x" class="file-path-wrapper">
                    <input class="file-path validate" type="text" required >
                  </div>
                </div>
              </div>
              <div class="col s2"></div>
            </div>
          <div id="loader_book" class="container hide">
            <div class="progress"><div class="indeterminate"></div></div>
            <p class="center-align">Guardando los datos por favor espere...</p>
          </div>
        </div>
      </div>
      <div class="modal-footer container">
        <a href="#!" class="modal-close waves-effect waves-red btn-flat">Cancelar</a>
        <button type='submit' class='waves-effect btn-flat' style="color:white; background-color: <?php echo primary_color ?>;">GUARDAR</button>
      </div>
    </form>
  </div>
      
</div>