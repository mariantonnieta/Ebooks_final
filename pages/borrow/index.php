<?php require_once('../../config/sys.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../resource/css/loader.css">
    <title><?php echo app_name ?> | Borrow</title>
</head>
<body onload="loader()" style="margin:0;">
    <div id="loader"></div>
    <div style="display:none;" id="myDiv" class="animate-bottom">

    </div>
    <script src="../../resource/js/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../../resource/js/cookies.js"></script>

    <script>
      $.ajax({
        type: "GET",
        url: "../../core/controller/book_controller.php",
        data: { 
          event : "fetch",
          book_id : Cookies.get('book_id')
        },
        success: function (response) {
          console.log(response)
          if(response.success){
            console.log(response)
          }
        }
      });
    </script>
</body>
</html>