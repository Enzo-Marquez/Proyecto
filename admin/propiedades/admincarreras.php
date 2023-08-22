<?php

session_start();
error_reporting(0);
$varsesion = $_SESSION['user'];
if ($varsesion == null || $varsesion == '') {
  header("location: ../../index.php");
  die();
}


                    


$var = $_SESSION['user'];
$conex = mysqli_connect("localhost", "root", "", "proyecto_db");
$asd = $conex->query("SELECT id, nombre, carrera, fk_rol from usuarios where username='$var'");
while ($rowens = $asd->fetch_array()) {
  $idalumno = $rowens['id'];
  $carreraalumno = $rowens['carrera'];
  $cateUser = $rowens['fk_rol'];
}

if($cateUser > 0){
  header("location: ../../carreras.php");
  die();
}


?>

<?php
// $Nombre="";
// if($_POST ){

//     $Nombre= (isset($_POST['Nombre']))?$_POST['Nombre']:"";
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carreras</title>
  <link rel="stylesheet" href="../../css/normalize.css">
  <link rel="stylesheet" href="../../css/admin.css">
  <link rel="stylesheet" href="../../css/tabla.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.js"></script>

  <link rel="stylesheet" href="ruta/a/font-awesome.min.css">


</head>

<body>



  <?php
  include '../../includes/header.php';


  ?>
<nav class="navegacion">

  <!--<a class="navegacion__enlace" href="../../carreras.php">Vista de Alumnos</a> -->
  <a class="navegacion__enlace navegacion__enlace--activo" href="admincarreras.php">Mesas de Examenes</a>
  <a class="navegacion__enlace" href="admininscriptos.php">Inscriptos</a>
  <a class="navegacion__enlace" href="adminusuarios.php">Usuarios</a>
  
    <!-- Modal Salir -->
 
    <a class="navegacion__salir"> </a> <button class="btn btn-primary" data-target=".bs-example-modal-sm" data-toggle="modal">Salir</button>

    
    <div tabindex="-1" class="modal bs-example-modal-sm" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="modal-header"><h4>Cerrar Sesion <i class="fa fa-lock"></i></h4></div>
          <div class="modal-body"><i class="fa fa-question-circle"></i>¿Estás seguro que deseas Salir?</div>
          <div class="modal-footer"><a class="btn btn-primary btn-block" href="../../cerrarSession.php">Salir</a></div>
        </div>
      </div>
    </div>
  </div>
</nav>



  <div class="asignatura">



    <!-- TABLA -->

    <form method="post">

      <select name="carr" class="form-control form-control-sm">
        <option value="<?php echo $mostrar['carrera']; ?>">SELECCIONAR UNA CARRERA</option>
        <?php
        $consu = "SELECT * FROM carreras";
        $ejecutarconsu = mysqli_query($conex, $consu);
        while ($consu2 = mysqli_fetch_assoc($ejecutarconsu)) {
        ?>
          <option value="<?php echo $consu2['id_carreras']; ?>"><?php echo $consu2['nombre']; ?></option>
        <?php
        }
        ?>
      </select>
      <br>

      <input type="submit" class="btn btn-primary" name="sexo" value="Buscar">

    </form>

    <table class="content-table">

      <thead>

        <tr>

          <th>Carrera</th>
          <th>Año</th>
          <th>Espacio Curricular</th>
          <th>Primer Llamado</th>
          <th>Segundo Llamado</th>
          <th>Hora</th>
          <th>Presidente</th>
          <th>Vocal 1</th>
          <th>Vocal 2</th>
          <th>Editar Mesa</th>
          <th>Eliminar Mesa</th>
        </tr>

      </thead>
      <tbody>
        <!-- CONEXION A LA DB -->
        <?php


        if (isset($_POST['sexo'])) {

          $carr = $_POST['carr'];

          $sql = "SELECT e.id_examenes,c.id_carreras, c.nombre as carrera, anio, desc_anios, m.descrip_mat, DATE_FORMAT( llamado_1 ,  '%d-%m-%Y' ) AS llamado_1,
llamado_1 as llamado1, llamado_2 as llamado2,
DATE_FORMAT( llamado_2 ,  '%d-%m-%Y' ) AS llamado_2, hora, presidente, vocal_1, vocal_2
from examenes e 
LEFT JOIN mat m ON m.id_mat = e.espacio_curricular
LEFT JOIN carreras c ON c.id_carreras = e.carrera
LEFT JOIN anios ON id_anios = anio
where carrera = '$carr' ";
        } else {

          $sql = "SELECT e.id_examenes,c.id_carreras, c.nombre as carrera, anio, desc_anios, m.descrip_mat, DATE_FORMAT( llamado_1 ,  '%d-%m-%Y' ) AS llamado_1,
llamado_1 as llamado1, llamado_2 as llamado2,
DATE_FORMAT( llamado_2 ,  '%d-%m-%Y' ) AS llamado_2, hora, presidente, vocal_1, vocal_2
from examenes e
LEFT JOIN mat m ON m.id_mat = e.espacio_curricular
LEFT JOIN carreras c ON c.id_carreras = e.carrera
LEFT JOIN anios ON id_anios = anio";
        }

        $result = mysqli_query($conex, $sql);

        while ($mostrar = mysqli_fetch_array($result)) {
          $botonElim = 'eliminarB' . $mostrar['id_examenes'];
          $id_examenes = $mostrar['id_examenes'];
        ?>

          <!-- FIN CONEXION -->

          <!-- MOSTRAR LOS DATOS DE LA DB -->

          <tr>
            <td><?php echo $mostrar['carrera'] ?></td>
            <td><?php echo $mostrar['anio'] ?></td>
            <td><?php echo $mostrar['descrip_mat'] ?></td>
            <td><?php echo $mostrar['llamado_1'] ?></td>
            <td><?php echo $mostrar['llamado_2'] ?></td>
            <td><?php echo $mostrar['hora'] ?></td>
            <td><?php echo $mostrar['presidente'] ?></td>
            <td><?php echo $mostrar['vocal_1'] ?></td>
            <td><?php echo $mostrar['vocal_2'] ?></td>
            <td>

              <!-- BOTON EDITAR -->
              <form method="post">

                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo $mostrar['id_examenes']; ?>">
                  Modificar
                  <!-- <a href="../../carreras.php"> <button class="asign1">Volver</button></a> -->
            </td>



            <td>
              <!-- BOTON ELIMINAR -->

              <form method="post">
                <input type="submit" class="btn btn-danger" name="<?php echo $botonElim; ?>" value="Eliminar">
                <!-- <a href="../../carreras.php"> <button class="asign1">Volver</button></a> -->
            </td>
            </form>
          </tr>


          <!-- Modal EDITAR -->

          <div class="modal fade" id="editar<?php echo $mostrar['id_examenes']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Editar Mesa de Examen</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="background-color:#b1bfc2;">


                  <?php

                  $editarA = $mostrar['id_examenes'];

                  //$consEditA = "SELECT * FROM examenes where id = '$editarA'";

                  //$resCon = mysqli_query($conex,$consEditA);

                  $botonEdit = 'editar' . $mostrar['id_examenes'];


                  //while($mostrar=mysqli_fetch_assoc($resCon)){


                  ?>
                  <div>
                    <form method="post">
                      <p>Seleccionar Carrera</p>
                      <input style="display:none;" id="idExamena" name="idExamen" type="text" value="<?php echo $mostrar['id_examenes'] ?>">
                      <select id="carreraas" name="carreraa" class="form-control form-control-sm">
                        <option value="<?php echo $mostrar['id_carreras']; ?>" selected><?php echo $mostrar['carrera']; ?></option>
                        
                        <?php
                        $carreraElegida = $mostrar['id_carreras'];
                        $consu = "SELECT * FROM carreras";
                        $ejecutarconsu = mysqli_query($conex, $consu);
                        while ($consu2 = mysqli_fetch_assoc($ejecutarconsu)) {
                          $opcion = $consu2['id_carreras'];
                          if($opcion != $carreraElegida){
                        ?>
                          <option value="<?php echo $consu2['id_carreras']; ?>"><?php echo $consu2['nombre']; ?></option>
                        <?php
                        }
                        }
                        ?>
                      </select>
                      <br>

                      



                      <div>

                      
                        <br>
                        <label align="left">Seleccionar Año de la Carrera</label>
                        <select id="anioa" name="anioa" class="form-control form-control-sm">
                          <option selected value="<?php echo $mostrar['anio']; ?>"><?php echo $mostrar['desc_anios']; ?></option>
                          <?php
                          $carreraElegida2 = $mostrar['anio'];
                          $anio = 'SELECT * from anios';
                          $queryanio = mysqli_query($conex, $anio);
                        while ($anios = mysqli_fetch_assoc($queryanio)) {
                          $opcion2 = $anios['id_anios'];
                          if($opcion2 != $carreraElegida2){
                          ?>
                          <option value="<?php echo $anios['id_anios']; ?>"><?php echo $anios['desc_anios']; ?></option>
                          <?php
                        }
                      }
                          ?>

                        </select>
                      </div>
                      <br>

                      <div>

                         <script type="text/javascript">
                          $(document).ready(function() {
                            $('#carreraas').val();
                            recargarLista2();

                            $('#carreraas').change(function() {
                              recargarLista2();
                            });
                          })

                          $(document).ready(function() {
                            $('#anioa').val();
                            recargarLista2();

                            $('#anioa').change(function() {
                              recargarLista2();
                            });
                          })
                        </script>

                        <script type="text/javascript">
                          function recargarLista2() {
                            $.ajax({
                              type: "POST",
                              url: "filtro2.php",
                              data: "carreraa=" + $('#carreraas').val() + "&anioa=" + $('#anioa').val() + "&idExamena=" + $('#idExamena').val(),
                              
                              success: function(g) {
                                $('#select3lista').html(g);
                              }
                            });
                          }
                        </script>





                        <label>Espacio Curricular</label>
                        <div id="select3lista"></div>



                      </div>

                      <div>
                        <label align="left">Primer Llamado</label>
                        <input class="form-control form-control-sm" id="llamado_1" name="llamado_1a" type="date" placeholder="<?php echo $mostrar['llamado_1']; ?>" value="<?php echo $mostrar['llamado1']; ?>" required>
                      </div>

                      <div>
                        <label align="left">Segundo Llamado</label>
                        <input class="form-control form-control-sm" id="llamado_2" name="llamado_2a" type="date" placeholder="<?php echo $mostrar['llamado_2']; ?>" value="<?php echo $mostrar['llamado2']; ?>" required>
                      </div>

                      <div>
                        <label align="left">Hora</label>
                        <input class="input-text" id="hora" name="horaa" type="time" placeholder="Hora" value="<?php echo $mostrar['hora']; ?>" required>
                      </div>

                      <div>
                        <label align="left">Presidente</label>
                        <input class="form-control form-control-sm" id="presidente" name="presidentea" type="text" placeholder="Presidente" value="<?php echo $mostrar['presidente']; ?>" required>
                      </div>

                      <div>
                        <label align="left">Primer Vocal</label>
                        <input class="form-control form-control-sm" id="vocal_1" name="vocal_1a" type="text" placeholder="Vocales" value="<?php echo $mostrar['vocal_1']; ?>" required>
                      </div>

                      <div>
                        <label align="left">Segundo Vocal</label>
                        <input class="form-control form-control-sm" id="vocal_2" name="vocal_2a" type="text" placeholder="Vocales" value="<?php echo $mostrar['vocal_2']; ?>" required>
                      </div>
                          <br>
                  </div> <!--.contenedor-campos-->

                  <div>
                    <input type="submit" class="btn btn-info" name="<?php echo $botonEdit; ?>" value="Modificar la Mesa">
                    <!-- <a href="../../carreras.php"> <button class="asign1">Volver</button></a> -->
                  </div>

                  </form>

                  <?php


                  // $consulta = "SELECT * FROM examenes";
                  // $ejecutarConsulta = mysqli_query($enlace, $consulta);
                  // $verFilas = mysqli_num_rows($ejecutarConsulta);
                  // $fila = mysqli_fetch_array($ejecutarConsulta);

                  // if(!$ejecutarConsulta){
                  // echo"Error en la consulta";
                  // }else{
                  // if($verFilas<1){
                  // echo"<tr><td>Sin Registros</td></tr>";
                  // }

                  ?>

      </tbody>

  </div>













  </div>


  </div>
  </div>
  </div>
  </div>
  </div>


  <!-- Modal ELIMINAR-->

  <div class="modal fade" id="ventana<?php
                                      echo $mostrar['id_examenes'];
                                      ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formulario de Inscripcion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php
          echo "Usted se esta inscribiendo a " . $mostrar['espacio_curricular'];
          ?>
        </div>
        <div class="modal-footer">
          <form method="post">
            <input class="btn btn-primary" value="Aceptar" type="submit" name="guardar<?php
                                                                                      echo $mostrar['id_examenes'];
                                                                                      ?>">
          </form>
        </div>
      </div>
    </div>
  </div>




<?php
          $guardar = 'guardar' . $mostrar['id_examenes'];
          if (isset($_POST[$guardar])) {
            $mostrar = $mostrar['id_examenes'];
            $insert = "INSERT INTO inscriptos(idmesa,idalumno) VALUES('$mostrar','$idalumno')";

            $save = mysqli_query($conex, $insert);




            if (!$save) {
              echo "Error en la linea sql";
            }
          }

          include('../../includes/eliminar.php');
          include('../../includes/editar.php');
        }
?>

</table>

</form>



<!-- FIN DE LA MODAL ELIMINAR -->



<!-- BOTON PARA CREAR LA MESA DE EXAMEN -->
<br>
<button class="btn btn-success" type="button" data-toggle="modal" data-target="#agregarcarrera"> Crear Mesa</button>

<!-- FIN DEL BOTON DE CREAR LA MESA DE EXAMEN -->








<!-- Modal INSERTAR-->
<div class="carrera"></div>
<div class="modal fade" id="agregarcarrera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Mesa De Examen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color:#b1bfc2;">

        <form action="../../includes/insertar.php" method="post">
          <fieldset>




            <div>
              <label align="left">Seleccionar Carrera</label>
              <select id="carrera" name="carrera" class="form-control form-control-sm">
                <option value="0">Seleccionar Carrera</option>
                <?php
                $consu = "SELECT * FROM carreras";

                $ejecutarconsu = mysqli_query($conex, $consu);
                while ($consu2 = mysqli_fetch_assoc($ejecutarconsu)) {

                ?>
                  <option value="<?php echo $consu2['id_carreras']; ?>"><?php echo $consu2['nombre']; ?></option>
                <?php
                }
                ?>
              </select>






              <div>

                <br>
                <label align="left">Seleccionar Año de la Carrera</label>
                <select id="anio" name="anio" class="form-control form-control-sm">
                  <option disabled>Seleccionar Año</option>
                  <option value="1">Primero</option>
                  <option value="2">Segundo</option>
                  <option value="3">Tercero</option>

                </select>
              </div>
              <br>

              <!-- <div>
        <label align="left">Espacio Curricular</label>
        <input class="form-control form-control-sm" name="espacio_curricular" type="text" placeholder="Espacio Curricular" required>
        </div>-->


              <script type="text/javascript">
                $(document).ready(function() {
                  $('#carrera').val(0);
                  recargarLista();

                  $('#carrera').change(function() {
                    recargarLista();
                  });
                })

                $(document).ready(function() {
                  $('#anio').val(0);
                  recargarLista();

                  $('#anio').change(function() {
                    recargarLista();
                  });
                })
              </script>

              <script type="text/javascript">
                function recargarLista() {
                  $.ajax({
                    type: "POST",
                    url: "filtro.php",
                    data: "carrera=" + $('#carrera').val() + "&anio=" + $('#anio').val(),
                    success: function(r) {
                      $('#select2lista').html(r);
                    }
                  });
                }
              </script>





              <label>Espacio Curricular</label>
              <div id="select2lista"></div>



              <br>
              <div>
                <label align="left">Primer Llamado</label>
                <input class="form-control form-control-sm" name="llamado_1" type="date" placeholder="Fecha" required>
              </div>

              <div>
                <label align="left">Segundo Llamado</label>
                <input class="form-control form-control-sm" name="llamado_2" type="date" placeholder="Fecha" required>
              </div>

              <div>
                <label align="left">Hora</label>
                <input class="input-text" name="hora" type="time" placeholder="Hora" required>
              </div>

              <div>
                <label align="left">Presidente</label>
                <input class="form-control form-control-sm" name="presidente" type="text" placeholder="Presidente" required>
              </div>

              <div>
                <label align="left">Primer Vocal</label>
                <input class="form-control form-control-sm" name="vocal_1" type="text" placeholder="Vocales" required>
              </div>

              <div>
                <label align="left">Segundo Vocal</label>
                <input class="form-control form-control-sm" name="vocal_2" type="text" placeholder="Vocales" required>
              </div>

            </div>
                <br>
            <div>
              <input type="submit" class="btn btn-success" name="registrarse" value="Agregar Mesa de Examen">
              <!-- <a href="../../carreras.php"> <button class="asign1">Volver</button></a> -->
            </div>

            <?php
            $consulta = "SELECT * FROM examenes";
            $ejecutarConsulta = mysqli_query($enlace, $consulta);
            $verFilas = mysqli_num_rows($ejecutarConsulta);
            $fila = mysqli_fetch_array($ejecutarConsulta);
            ?>
      </div>
      </fieldset>
      </form>
    </div>


  </div>
</div>
</div>
</div>
</div>











<script>
  // $('.editbtn').on('click',function () {

  //   $tr=$(this).closest('tr');
  //   var datos=$tr.children("td").map(function () {
  //     return $(this).text();
  //   });

  //   $('#carrera').val(datos[0]);
  //   $('#anio').val(datos[1]);
  //   $('#espacio_curricular').val(datos[2]);
  //   $('#llamado_1').val(datos[3]);
  //   $('#llamado_2').val(datos[4]);
  //   $('#hora').val(datos[5]);
  //   $('#presidente').val(datos[6]);
  //   $('#vocal_1').val(datos[7]);
  //   $('#vocal_2').val(datos[8]);

  // });





  // https://ejemplo.com/ruta?variable1=valor1&variable2=valor2
  // data:"carrera=" + $('#carrera').val() + "&variable2=" + $('#idExaem').val(),
</script>













</body>
<?php
include '../../includes/footer.php';
?>

</html>