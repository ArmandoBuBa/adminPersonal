<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");



$txtNid2 = isset($_POST['txtNid2']) ? $_POST['txtNid2'] : '';


      
         $con = new SQLite3("adminP.db") or die("problemas para conectar");
         
            $cs = $con -> query("UPDATE solicitud1 SET folio= '1' where id = $txtNid2");
            echo '
            <!DOCTYPE html>
          <html lang="en">
          <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="css/inicio.css">
            <link rel="stylesheet" href="css/index.css">
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <title>Document</title>
          </head>
          <header>
           <div class="overlay"></div>
           <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="vid/utfv.mp4" type="video/mp4">
           </video>
          </header>
          <body>
            <script>
              swal({
                title:"Solicitud Rechazada",
                text : "",
                icon: "warning",
                buttons:"Continuar"
              }).then(respuesta=>{
               if(respuesta){
                  window.location="consul.php"
               }
           })
            </script>
          </body>
          </html>

           ';
      
     
      $con -> close();    
?>