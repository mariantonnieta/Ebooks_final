<?php require_once('../../config/sys.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="style.css">
    <title><?php echo app_name ?> | Dashboard</title>
</head>
<body>
<header>
<nav class="blue-grey darken-4 navbar-fixed ">
    
    <a href="#!" style="padding-left:25px" class="brand-logo"><?php echo app_name ?></a>

    <ul id="nav-mobile" class="right">
        <li><a id="exit">Salir</a></li>
      </ul>
  
</nav>
<ul d="slide-out" class="sidenav sidenav-fixed tabs">
    <li><div class="user-view">
      <div class="background" style="background-color: <?php echo primary_color ?>;">
        <img src="../../<?php echo banner_image ?>">
      </div>
      <a><span class="white-text name" id="user_name">John Doe</span></a>
      <a><span class="white-text email" id="user_email">jdandturk@gmail.com</span></a>
    </div></li>
    <li class="tab side text-teal"><a class="waves-effect" href="#test1">Resumen</a></li>
    <li class="tab side text-teal"><a class="waves-effect" href="#test2">Libros</a></li>
    <li class="tab side text-teal"><a class="waves-effect" href="#test3">Usuarios</a></li>
  </ul>
</header>
<main>
  <div class="row">
    <div id="test1" class="col s12"><?php include('resumen.php');?></div>
    <div id="test2" class="col s12"><?php include('books.php');?></div>
    <div id="test3" class="col s12"><?php include('users.php');?></div>          
  </div>
</main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="../../resource/js/cookies.js"></script>
    <script src="dashboard.js"></script>
</body>
</html>