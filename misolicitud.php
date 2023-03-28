?php

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
    <div class="contrainer " style="margin-top: 20px;">
        <div class="row">
        <div class="col-md-8 mx-auto my-5">
            <div class ="container" style="display: flex; ">
                <h1 class= " p-3 rounded" style="font-size: 300%; margin-left: 100px; color: #3E9647; "> Mis Solicitudes  </h1>
                <img src="img/edomexu.png" style="margin-left: 100px;">
            </div>
       
        
          <table class= "table text-center" style="background-color: white; border: solid 1px black;">
          <thead class= " text-white" style="background-color: #3E9647;">
                <tr>
                <th>
                       Id
                 </th>
                
                   <th>
                        Nombre
                 </th>
    
                 <th>
                      Numero de Empleado
                 </th>
    
                 <th>
                     Tipo de Permiso
                 </th>
                 <th>
                    Entre (hora)
                </th>
                <th>
                    Hasta (hora)
                </th>
                <th style="width: 100px;">
                    Fecha
                </th>
                <th>
                    observaciones
                </th>
                <th>
                    Estado 
                </th>
    
                 </tr>
         </thead>
                <tbody>
                <?php
                
                $txtNid3 = isset($_POST['txtNid3']) ? $_POST['txtNid3'] : '';

                $con = new SQLite3("adminP.db") or die("problemas para conectar");
                $cs = $con -> query("SELECT * FROM solicitud1 Where numEmpleado = '$txtNid3'  ");
            
                while($resul = $cs -> fetchArray()){
                  $id = $resul['id'];
                  $nombre = $resul['nombre'];
                  $numEmpleado = $resul['numEmpleado'];
                  $area = $resul['area'];
                  $puesto = $resul['puesto'];
                  $tipoPermiso = $resul['tipoPermiso'];
                  $hora1 = $resul['hora1'];
                  $hora2 = $resul['hora2'];
                  $fecha1 = $resul['fecha1'];
                  $observaciones = $resul['observaciones'];
                  $folio = $resul['folio'];

                 if($folio == 1){
                    echo' 
                    <tr style="background-color: #FC5B5B;"> 
                     <td class="align-middle"> '.$id.'</td>
                     <td class="align-middle"> '.$nombre.'</td>
                     <td class="align-middle"> '.$numEmpleado.'</td>
                     
                     <td class="align-middle"> '.$tipoPermiso.'</td>
                     <td class="align-middle"> '.$hora1.'</td>
                     <td class="align-middle"> '.$hora2.'</td>
                     <td class="align-middle"> '.$fecha1.'</td>
                     <td class="align-middle"> '.$observaciones.'</td>
                     <td class="align-middle">       Rechazado              </td>
                     </td>
                    </tr>';
                 }else{
                    if($folio >= 2){
                        echo' 
                        <tr style="background-color: #72F177;"> 
                         <td class="align-middle"> '.$id.'</td>
                         <td class="align-middle"> '.$nombre.'</td>
                         <td class="align-middle"> '.$numEmpleado.'</td>
                         
                         <td class="align-middle"> '.$tipoPermiso.'</td>
                         <td class="align-middle"> '.$hora1.'</td>
                         <td class="align-middle"> '.$hora2.'</td>
                         <td class="align-middle"> '.$fecha1.'</td>
                         <td class="align-middle"> '.$observaciones.'</td>
                         <td class="align-middle">  Aprobado </td>
                         </td>
                        </tr>';

                    }else{
                        echo' 
                        <tr style="background-color: #FCA85B;"> 
                        <td class="align-middle"> '.$id.'</td>
                         <td class="align-middle"> '.$nombre.'</td>
                         <td class="align-middle"> '.$numEmpleado.'</td>
                         
                         <td class="align-middle"> '.$tipoPermiso.'</td>
                         <td class="align-middle"> '.$hora1.'</td>
                         <td class="align-middle"> '.$hora2.'</td>
                         <td class="align-middle"> '.$fecha1.'</td>
                         <td class="align-middle"> '.$observaciones.'</td>
                         <td class="align-middle">  En Proceso </td>
                         </td>
                        </tr>';
                    }
                    

                 }
              
                      
                   }  
                 $con -> close();
                ?>
                </tbody>
               </table>
            </div>
         </div>
     </div>
</body>
</html>