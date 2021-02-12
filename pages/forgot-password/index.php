<?php require_once('../../config/sys.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title><?php echo app_name ?> | Restore Password</title>
</head>
<body>
    <header>
        <nav class="white z-depth-0">
            <div class="nav-wrapper container">
                <a href="../login" class="brand-logo"><i class="material-icons black-text">arrow_back</i><span class="black-text">Atrás</span></a>
            </div>
        </nav>
    </header>
    <main>
        <center>
            <h1><?php echo app_name ?></h1>
            <h4 style="color: <?php echo primary_color ?>;">Todos nos olvidamos de algo alguna vez.</h4>
            <span id="span" ></span>
            <div class="section"></div>
            <div class="container">
                <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                    <form id="restore_form" class="col s12" method="post">
                        <div class='row'>
                            <div class='col s12'><h5>Ingrese su correo registrado a su cuenta.</h5></div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='email' name='email' id='email' required />
                                <label for='email'>Correo</label>
                            </div>
                        </div>
                        <div id="loader_email" class="hide">
                            <div class="progress"><div class="indeterminate"></div></div>
                        </div>
                        <br/>
                        <center>
                            <div class='row'>
                                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect' style="background-color: <?php echo primary_color ?>;">RECUPERAR CONTRASEÑA</button>
                            </div>
                        </center>
                        <br>
                    </form>

                </div>
            </div>
        </center>
        <div class="section"></div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../../resource/js/cookies.js"></script>
    <script src="restore.js"></script>
</body>
</html>