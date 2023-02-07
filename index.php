<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

session_start();
session_destroy();

//variable hiperglobal
$hiperNum = isset($_SESSION['txtNumEm']) ? $_SESSION['txtNumEm'] : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Adminsitracion de Personal</title>
    <style>
        body{
            background-color: white;
        }
    </style>
    
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:#3E9647;">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php" style=" font-family: 'Jaldi'; color: white;  text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-size: 23px; ">Administracion de Personal</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" style="background-color: white" aria-expanded="false" aria-label="Toggle navigation">
                <p style="margin-top: 5px; color: #3E9647;">Menu</p>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">     
         <li class="nav-item">
    </header>
    <div class="container">
      <div class="row">
          <div class="col-md-5 mx-auto" style="margin-top: 230px;">
             <div class="card" style="background-color: withe ; border-color: black; border-radius: 5%;">
                <div class="card-body text-center"> 
                   <div class="mx-auto" style=" width: 230px; height: 230px; border-radius: 50%; margin-top: -150px;">
                       <img src="img/frase.png" style="width: 200px; height: 200px; border-radius: 50%; margin-top: -1px;">
                    </div>
                   
                    <form action="validacion.php" method="POST" class="my-3">
                      <div class="input-group mb-3">
                          <input type="email" class="form-control" placeholder="Correo Electronico" name="txtCorreo" onKeypress="validacion()" required>
                      </div>
                      <div class="input-group mb-3">
                          <input type="password" class="form-control" placeholder="contraseña" name="txtPws" required>
                      </div>
                      <div class="form-group mb-3">
                          <button style="width: 230px;">
                              <p style="font-size: 28px; color: white;"> Acceder </p>
                          </button>
                      </div>
                  </form>
                  <div class="form-group mb-3">
                    <form action="formulario.html">
                      <button style="width: 230px;">
                        <p style="font-size: 22px; color: white;"> Regitrarse </p>
                      </button>
                    </form>
                  </div>
                  <a href="olvidar.html" style="color: black; font-family: Jaldi ; font-size: 20px;">¿Olvidaste tu Contraseña?</a>
                </div>
          </div>
      </div>
  </div>
</body>
</html>