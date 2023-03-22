<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$txtSN = isset($_POST['txtSN']) ? $_POST['txtSN'] : '';
$txtSNum = isset($_POST['txtSNum']) ? $_POST['txtSNum'] : '';
$txtSArea= isset($_POST['txtSArea']) ? $_POST['txtSArea'] : '';
$txtSTi= isset($_POST['txtSTi']) ? $_POST['txtSTi'] : '';
$txtTiAur = isset($_POST['txtTiAur']) ? $_POST['txtTiAur'] : '';
$txtT1 = isset($_POST['txtT1']) ? $_POST['txtT1'] : '';
$txtT2 = isset($_POST['txtT2']) ? $_POST['txtT2'] : '';
$txtFecha1= isset($_POST['txtFecha1']) ? $_POST['txtFecha1'] : '';
$txtOb= isset($_POST['txtOb']) ? $_POST['txtOb'] : '';



if(isset($txtT1) && !empty($txtT1) && isset($txtFecha1) && !empty($txtFecha1)){
    $con = new SQLite3("adminP.db") or die("problemas para conectar");
    
       $cs = $con -> query("INSERT INTO solicitud1(nombre,numEmpleado,area,puesto,tipoPermiso,hora1,hora2,fecha1,observaciones,folio) VALUES('$txtSN','$txtSNum','$txtSArea','$txtSTi','$txtTiAur','$txtT1','$txtT2','$txtFecha1','$txtOb',0);");
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
                title:"Solicitud Enviada",
                text : "Para Consultar el Proceso de Tu solicitud Accede al apartado de Mis solicitudes",
                icon: "success",
                buttons:"Continuar"
              }).then(respuesta=>{
               if(respuesta){
                  window.location="navegacion.php"
               }
           })
            </script>
          </body>
          </html>
      ';
   $con -> close();
 }else{
    echo' <!DOCTYPE html>
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
          title:"Los Datos ingresados son Inocrrectos",
          icon: "warning",
          buttons:"Continuar"
        }).then(respuesta=>{
         if(respuesta){
            window.location="navegacion.php"
         }
     })
      </script>
    </body>
    </html>
    ';
 }
   

?>