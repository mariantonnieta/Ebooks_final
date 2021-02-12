<?php require_once('../../config/sys.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="style.css">
    <title><?php echo app_name ?> | Panel</title>
</head>
<body>
<header>
    <nav class="blue-grey darken-4 navbar-fixed ">
        <a href="../../" style="padding-left:25px" class="brand-logo"><?php echo app_name ?></a>
        <ul id="nav-mobile" class="right">
            <li><a id="exit">Salir</a></li>
        </ul>
    </nav>
</header>
<main>
    <div class="container">
    <table id="books_borrow_table" class="striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Dias de prestamo</th>
                <th>Prestado el</th>
                <th>Devuelto</th>
                <th>Devolver Libro</th>
            </tr>
        </thead>
    </table>
    </div>
</main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="../../resource/js/cookies.js"></script>
    <script src="panel.js"></script>
</body>
</html>