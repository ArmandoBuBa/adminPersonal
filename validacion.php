<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

session_start();

// $id = '';
// $nombre = '';
// $apellidoP = '';
// $apellidoM = '';
$correo = '';
$cont = '';
// $apodo='';
// $tipoUsuario='';



$txtCorreo = isset($_POST['txtCorreo']) ? $_POST['txtCorreo'] : '';
$txtPws = isset($_POST['txtPws']) ? $_POST['txtPws'] : '';


$_SESSION['txtCorreo'] = $txtCorreo;

$hiperCorreo = isset($_SESSION['txtCorreo']) ? $_SESSION['txtCorreo'] : '';



 if (isset($txtCorreo) && !empty($txtCorreo) && isset($txtPws) && !empty($txtPws)){
    $con = new SQLite3("adminP.db") or die("problemas para conectar");
    $cs = $con -> query("SELECT * FROM personal1 WHERE correo='$txtCorreo'");



    while($resul = $cs -> fetchArray()){
        $id = $resul['id'];
        $nombre = $resul['nombre'];
        $apellidoP = $resul['apellidoP'];
        $apellidoM = $resul['apellidoM'];
        $correo = $resul['correo'];
        $cont = $resul['cont'];
        $tipoUsuario = $resul['tipoUsuario'];
        $area = $resul['area'];
        $tipoEmpleado = $resul['tipoEmpleado'];
        $fechaN = $resul['fechaN'];
    }



    if($txtCorreo == $correo &&  $txtPws == $cont){

      switch ($tipoUsuario) {
        case '1':
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
                title:"Bienvenido",
                text : "'.$nombre.' '.$apellidoP.' '.$apellidoM.'",
                icon: "success",
                buttons:"Continuar"
              }).then(respuesta=>{
               if(respuesta){
                  window.location="permiso.php"
               }
           })
            </script>
          </body>
          </html>
       ';
          break;
  
        case '2':
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
                title:"Bienvenido Administrador",
                text : "'.$nombre.' '.$apellidoP.' '.$apellidoM.'",
                icon: "success",
                buttons:"Continuar"
              }).then(respuesta=>{
               if(respuesta){
                  window.location="admin.php"
               }
           })
            </script>
          </body>
          </html>
       ';
          break;
      }

    
  }else{
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
          title:"Los Datos ingresados son Inocrrectos",
          icon: "warning",
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
}else{
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
             <source src="vid/fondo.mp4" type="video/mp4">
         </video>
        </header>
        <body>
          <script>
            swal({              
              title:"Completa todos los campos",
              icon: "warning",
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
?>