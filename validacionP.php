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
$txtT3= isset($_POST['txtT3']) ? $_POST['txtT3'] : '';
$txtT4= isset($_POST['txtT4']) ? $_POST['txtT4'] : '';
$txtFecha1= isset($_POST['txtFecha1']) ? $_POST['txtFecha1'] : '';
$txtFecha2= isset($_POST['txtFecha2']) ? $_POST['txtFecha2'] : '';
$txtOb= isset($_POST['txtOb']) ? $_POST['txtOb'] : '';



if(isset($txtT1) && !empty($txtT1) && isset($txtFecha1) && !empty($txtFecha1)){
    $con = new SQLite3("adminP.db") or die("problemas para conectar");
    
       $cs = $con -> query("INSERT INTO solicitud1(nombre,numEmpleado,area,puesto,tipoPermiso,hora1,hora2,hora3,hora4,fecha1,fecha2,observaciones,folio) VALUES('$txtSN','$txtSNum','$txtSArea','$txtSTi','$txtTiAur','$txtT1','$txtT2','$txtT3','$txtT4','$txtFecha1','$txtFecha2','$txtOb',0);");
       echo '
       <script>alert("Registro Exitoso!");</script>
       <script>window.location="buscador.html";</script>
      ';
   $con -> close();
 }else{
    echo' <script>alert("Completa los parametros correctamente");</script>
    <script>window.location="permiso1.php";</script>
    ';
 }
   

?>