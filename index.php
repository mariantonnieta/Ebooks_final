<?php require_once('config/sys.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="resource/css/materialize.min.opt.css">
    <link rel="stylesheet" href="resource/css/loader.css">
    <title><?php echo app_name ?></title>
</head>
<body onload="loader()" style="margin:0;">
    <nav class="nav-extended" style="background-color: <?php echo primary_color ?>;">
      <div class="nav-background">
        <div class="ea k" style="background-image: url(<?php echo banner_image ?>);"></div>
      </div>
      <div class="nav-wrapper db">
        <a href="#" class="brand-logo"><i class="material-icons">book</i><?php echo app_name ?></a>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="bt hide-on-med-and-down" >
          <li><a onClick="access()">ACCEDER</a></li>
        </ul>
        <div class="nav-header de">
          <h1>Los mejores libros</h1>
          <div class="ge">Para todos</div>
        </div>
      </div>
      <!-- Fixed Masonry Filters -->
      <div class="categories-wrapper">
        <div class="categories-container" id="category_bar">
          <ul class="categories db">
            <li class="k"><a href="#all">Todos</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <ul class="side-nav" id="nav-mobile">
      <li><a onClick="access()"><i class="material-icons">person</i>ACCEDER</a></li>
    </ul>

    <div id="portfolio" class="cx gray">
      <div class="db">
        <div id="loader"></div>
        <div style="display:none;" id="myDiv" class="animate-bottom">
          <div id="content"></div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="resource/js/cookies.js"></script>
    <script src="resource/js/index.js"></script>
    <script src="resource/js/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/materialize/0.98.0/js/materialize.min.js"></script>
  </body>
</html>