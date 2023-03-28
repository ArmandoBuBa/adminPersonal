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
                <a class="navbar-brand" href="navegacion.php" style=" font-family: 'Jaldi'; color: white;  text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-size: 23px; ">Administracion de Personal</a>
             
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
            <div class="col-md-9 mx-auto" style="margin-top: 230px;">
               <div class="card" style="background-color: withe ; border-color: black; width: 1015px;">
                  <div class="card-body text-center"> 
                    <div class="container" style="display: flex; justify-content: center;">
                        <img src="img/gobierno.png" style="width: 250px; height: 70px; margin-right: 100px;"> 
                        <img src="img/utfvf.png" style="width: 200px; height: 80px; margin-left: 100px;">
                    </div>
                    <h1>Solicitud de permiso</h1>
                     
                     
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
                      <form action="validacionP.php" method="POST">
                      <div class="container" style="display: flex; justify-content: center;">
                        <h5>Nombre del empleado : '.$nombre.' '.$apellidoP.' '.$apellidoM.'</h4>
                          <input type="hidden" class="form-control"  aria-label="nombre" name="txtSN" value="'.$nombre.' '.$apellidoP.' '.$apellidoM.'" >
                        <h5 style="margin-left: 50px;">No. De Empleado: '.$empleado.'  </h4>
                          <input type="hidden" class="form-control"  aria-label="nombre" name="txtSNum" value="'.$empleado.'" >
                      </div>
                      <div class="container" style="display: flex; justify-content: center;">
                        <h5>Area de adscripción : '.$area.'</h4>
                          <input type="hidden" class="form-control"  aria-label="nombre" name="txtSArea" value="'.$area.'" >
                        <h5 style="margin-left: 50px;">Puesto : '.$tipoEmpleado.'  </h4>
                          <input type="hidden" class="form-control"  aria-label="nombre" name="txtSTi" value="'.$tipoEmpleado.'" >
                      </div>
                      <div class="container" style="display: flex; justify-content: center;">
                          <div style="margin-right: 60px;">
                            <p>Tipo de Permiso</p>
                            <div class="col">
                              <select class="form-select" aria-label="Default select example" name="txtTiAur" required >
                                <option disabled >Tipo de Permiso</option desable>
                                <option value="Autorizacion de Salida">Autorizacion de Salida</option>
                                <option value="Autorizacion de Entrada">Autorizacion de Entrada</option>
                                
                              </select>
                            </div>
                          </div>
                          <div style="margin-left: -50px;">
                            <p>Apartir de (Hrs)</p>
                            <input type="time"  class="form-control" placeholder="hora" aria-label="area" name="txtT1" >
                            <br>
                            
                          </div>
                          <div style="margin-left: 10px;">
                            <p>Hasta (Hrs)</p>
                            <input type="time"  class="form-control" placeholder="hora2" aria-label="area" name="txtT2" >
                            <br>
                           
                          </div>
                          <div style="margin-left: 10px;">
                            <p >fecha</p>
                            <input type="date"  class="form-control" placeholder="fecha1" aria-label="fecha1" name="txtFecha1" >
                            <br>
                            
                          </div>
                          <div style="margin-left: 10px;">
                            <p>observaciones</p>
                            <input type="text"   class="form-control" placeholder="observaciones" aria-label="area" name="txtOb"  >
                            <br>
                            <button type="submit" style="width: 230px; " name="registrar">
                              <p style="font-size: 23px; color: aliceblue;"> Solicitar </p>
                          </button>
                          
                          </div>
                       </div>
                       
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