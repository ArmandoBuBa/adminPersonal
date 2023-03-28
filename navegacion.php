<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

session_start();


//variable hiperglobal
$hiperCorreo = isset($_SESSION['txtCorreo']) ? $_SESSION['txtCorreo'] : '';

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
    <title>Navegacion</title>
    <style>
        body{
            background-color: white;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-light  fixed-top" style="background-color: #3E9647;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php" style=" font-family: 'Jaldi'; color: white;  text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-size: 23px; ">Administracion de Personal</a>
             
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="background-color: white">
                <p style="margin-top: 5px; color: #3E9647;">Menu</p>
              </button>
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header" style="background-color: #3E9647">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="font-family: Jaldi; color: white; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);  font-size: 30px;">Admistracion de Personal</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                
                <div class="offcanvas-body" style="background-color: white;">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <?php
                    if ($hiperCorreo === '') {
                    echo '
                     <a class="nav-link" href="index.php" style="color: white;">iniciar sesion</a>
                     ';
                    }else{
                        echo '
                        <li class="nav-item">
                            <div class="card" style="background-color: #3E9647">
                                <a class="nav-link active" aria-current="page" href="index.php"><p style="color: aliceblue; text-align: center; font-size: 40px;">Cerrar Sesion</p></a>
                            </div>
                        </li>
                        ';
                    }
                    ?>
                    <br>
                    <li class="nav-item">
                        <div class="card" style="background-color: #3E9647">
                            <a class="nav-link active" aria-current="page" href="navegacion.php"><p style="color: aliceblue; text-align: center; font-size: 40px;">Seleccionar Tramite</p></a>
                        </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto" style="margin-top: 230px; margin-left: 1500px;">
               <div class="card" style="background-color: withe ; border-color: black; border-radius: 5%;">
                  <div class="card-body text-center"> 
                     <div class="mx-auto" style=" width: 230px; height: 230px; border-radius: 50%; margin-top: -150px;">
                         <img src="img/frase.png" style="width: 200px; height: 200px; border-radius: 50%; margin-top: -1px;">
                      </div>
                     
                      <?php
                      $con = new SQLite3("adminP.db") or die("problemas para conectar");
                      $cs = $con -> query("SELECT * FROM personal1 WHERE correo='$hiperCorreo'");
                  
                      while($resul = $cs -> fetchArray()){
                        $id = $resul['id'];
                        $nombre = $resul['nombre'];
                        $apellidoP = $resul['apellidoP'];
                        $apellidoM = $resul['apellidoM'];
                        $correo = $resul['correo'];
                        $cont = $resul['cont'];
                        $tipoUsuario = $resul['tipoUsuario'];
                        $empleado = $resul['empleado'];
                        $area = $resul['area'];
                        $tipoEmpleado = $resul['tipoEmpleado'];
                        $fechaN = $resul['fechaN'];
                    
                    
                
                      echo' 
                      <form action="misolicitud.php" method="POST">
                        <input type="hidden" class="form-control"  aria-label="nombre" name="txtNid3" value="'.$empleado.'" >
                        <button  type="submit" style="width: 200px; margin-left: 5px; background-color: #0C1735; border-color: #3E9647;"><p style="color: aliceblue; font-size: 25px;">Mis Solicitudes</p></button>
                      </form>  
                      <br>
                      <h2>'.$nombre.' '.$apellidoP.' '.$apellidoM.'</h1>
                        
                      <h1 style="color:#3E9647">Selecione su Tramite</h1>
                      <form action="permiso1.php">
                        <button style="width: 250px;"><p style="color: aliceblue; font-size: 25px;">Solicitud de permiso</p></button>
                      </form>
                      ';
                   }  
                 $con -> close();
                ?>
                  </div>
            </div>
        </div>
    </div>
</body>
</html>