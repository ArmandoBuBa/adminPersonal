<?php
 header("Content-Type: application/xls");
 header("content-disposition: attachment; filename= Solicitudes-Aprobadas.xls");
?>



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
                     Area
                 </th>
    
                 <th>
                       Puesto
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
                    Folio
                </th>
    
                 </tr>
         </thead>
                <tbody>
                <?php
             
              
                $con = new SQLite3("adminP.db") or die("problemas para conectar");
                $cs = $con -> query("SELECT * FROM solicitud1 WHERE folio >= 2");
            
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
              
              
                      echo' 
                      <tr> 
                       <td class="align-middle"> '.$id.' </td>
                       <td class="align-middle"> '.$nombre.'</td>
                       <td class="align-middle"> '.$numEmpleado.'</td>
                       <td class="align-middle"> '.$area.'</td>
                       <td class="align-middle"> '.$puesto.'</td>
                       <td class="align-middle"> '.$tipoPermiso.'</td>
                       <td class="align-middle"> '.$hora1.'</td>
                       <td class="align-middle"> '.$hora2.'</td>
                       <td class="align-middle"> '.$fecha1.'</td>
                       <td class="align-middle"> '.$observaciones.'</td>
                       <td class="align-middle"> '.$folio.'</td>
                        
                            
                       
                       </td>
                       </td>
                      </tr>';
                   }  
                 $con -> close();
                ?>
                </tbody>
               </table>
