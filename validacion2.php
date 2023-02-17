<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$txtNombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : '';
$txtAp = isset($_POST['txtAp']) ? $_POST['txtAp'] : '';
$txtAm = isset($_POST['txtAm']) ? $_POST['txtAm'] : '';
$txtCorreo = isset($_POST['txtCorreo']) ? $_POST['txtCorreo'] : '';
$txtPws = isset($_POST['txtPws']) ? $_POST['txtPws'] : '';
$txtEmpleado = isset($_POST['txtEmpleado']) ? $_POST['txtEmpleado'] : '';
$txtArea = isset($_POST['txtArea']) ? $_POST['txtArea'] : '';
$txtTipEm= isset($_POST['txtTipEm']) ? $_POST['txtTipEm'] : '';
$txtFechaN= isset($_POST['txtFechaN']) ? $_POST['txtFechaN'] : '';
$txtTpu= isset($_POST['txtTpu']) ? $_POST['txtTpu'] : '';

$con = new SQLite3("adminP.db") or die("problemas para conectar");
$cs = $con -> query("SELECT correo FROM personal1 WHERE correo='$txtCorreo'");


$correo = '';

while($resul = $cs -> fetchArray()){
    $correo = $resul['correo'];
}
if ($txtCorreo == $correo) {
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
          title:"El Correo ya se encuentra en uso",
          icon: "warning",
          buttons:"Continuar"
        }).then(respuesta=>{
         if(respuesta){
            window.location="formulario.html"
         }
     })
      </script>
    </body>
    </html>
      ';
}else{

    if(isset($txtNombre) && !empty($txtNombre) && isset($txtAp) && !empty($txtAp) &&  isset($txtAm) && !empty($txtAm) && isset($txtCorreo) && !empty($txtCorreo) && isset($txtPws) && !empty($txtPws)){
        $con = new SQLite3("adminP.db") or die("problemas para conectar");
        
           $cs = $con -> query("INSERT INTO personal1(nombre,apellidoP,apellidoM,correo,cont,empleado,area,tipoEmpleado,fechaN,tipoUsuario) VALUES('$txtNombre','$txtAp','$txtAm','$txtCorreo','$txtPws','$txtEmpleado','$txtArea','$txtTipEm','$txtFechaN','$txtTpu');");
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
                 title:"Registro Exitoso",
                 icon: "success",
                 buttons:"Continuar"
               }).then(respuesta=>{
                if(respuesta){
                   window.location="index.php"
                }
            })
             </script>
           </body>
           </html>
          ';
      
     }else{
        echo' <<!DOCTYPE html>
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
              title:"Warning",
              text : "Intentalo de nuevo",
              icon: "success",
              buttons:"Continuar"
            }).then(respuesta=>{
             if(respuesta){
                window.location="index.php"
             }
         })
          </script>
        </body>
        </html>
        ';
     }
     $con -> close(); 
}
?>