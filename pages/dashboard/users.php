<div style="margin: 15px">
    <table id="users_table" class="striped" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th></th>
            </tr>
        </thead>
    </table>


  <div class="fixed-action-btn">
    <a href="#modal_users" class="btn-floating btn-large modal-trigger" style="background-color: <?php echo primary_color ?>;">
      <i class="large material-icons">add</i>
    </a>
  </div>

  <div id="modal_users" class="modal modal-fixed-footer">
    <form id="user_form">
      <div class="modal-content">
        <h4>Agregar nuevo usuario</h4>
        <p>Todos los campos son requeridos</p>
        <div class="row">
          <div class="row">
            <div class="input-field offset-s1 col s5">
              <input id="name" name="name" type="text" class="validate" required>
              <label for="name">Nombre</label>
            </div>
            <div class="input-field col s5">
              <input id="last_name" name="last_name" type="text" class="validate" required>
              <label for="last_name">Apellidos</label>
            </div>
          </div>
          
          <div class="row">
            <div class="input-field inline offset-s1 col s3">
              <input id="email" name="email" type="email" class="validate" required>
              <label for="email">Correo</label>
              <span class="helper-text" data-error="Correo no valido" data-success=""></span>
            </div>

            <div class="input-field col s3">
              <input id="password" name="password" type="password" class="validate" required>
              <label for="password">Contraseña</label>
            </div>
            <div class="input-field col s3">
              <select id="type" name="type" required>
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="1">Administrador</option>
                <option value="2">Normal</option>
              </select>
              <label>Tipo de usuario</label>
            </div>
          </div>
          <div id="loader_users" class="container hide">
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