<?php require_once('../../config/sys.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title><?php echo app_name ?> | Login</title>
</head>
<body>
    <nav class="white z-depth-0">
        <div class="nav-wrapper container">
            <a href="../../" class="brand-logo"><i class="material-icons black-text">arrow_back</i><span class="black-text">Atrás</span></a>
        </div>
    </nav>
    <div class="section"></div>
    <main>
        <center>
            <h1><?php echo app_name ?></h1>
            <h4 style="color: <?php echo primary_color ?>;">Bienvenido de nuevo</h4>
            <span id="span" ></span>
            <div class="section"></div>
            <div class="container">
                <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                    <form id="login_form" class="col s12" method="post">
                        <div class='row'>
                            <div class='col s12'><h5>Ingrese su correo y contraseña</h5></div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='email' name='email' id='email' required />
                                <label for='email'>Correo</label>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='password' name='password' id='password' required/>
                                <label for='password'>Contraseña</label>
                            </div>
                            <div><a href="../forgot-password/" class="right-align">¿Olvidaste tu contraseña?</a></div>
                        </div>
                        <br/>
                        <center>
                            <div class='row'>
                                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect' style="background-color: <?php echo primary_color ?>;">ACCEDER</button>
                            </div>
                            <div><a href="#modal_users" class="modal-trigger">¿No tienes cuenta?, Registrate.</a></div>
                            <br>
                        </center>
                    </form>
                </div>
            </div>
        </center>
        <div class="section"></div>
        <div id="modal_users" class="modal modal-fixed-footer">
            <form id="user_form">
            <div class="modal-content">
                <h4>Registrate</h4>
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
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../../resource/js/cookies.js"></script>
    <script src="login.js"></script>
    
</body>
</html>