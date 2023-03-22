<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

//alimentamos el generador de aleatorios
mt_srand (time());
//generamos un número aleatorio
$numero_aleatorio = mt_rand(0,99999);

$txtNid = isset($_POST['txtNid']) ? $_POST['txtNid'] : '';


      
         $con = new SQLite3("adminP.db") or die("problemas para conectar");
         
            $cs = $con -> query("UPDATE solicitud1 SET folio=$numero_aleatorio where id = $txtNid");
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
                title:"Solicitud Aprobada",
                text : "",
                icon: "success",
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