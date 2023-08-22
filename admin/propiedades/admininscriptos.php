
<?php

session_start();
error_reporting(0);
$varsesion= $_SESSION['user'];
if($varsesion== null || $varsesion=''){
    header("location: index.php");
    die();
}


$var= $_SESSION['user'];
   $conex = mysqli_connect("localhost","root","","proyecto_db");
        $asd = $conex->query( "SELECT id, nombre, fk_rol from usuarios where username='$var'");
        while($rowens = $asd->fetch_array()){ 
        //echo '<h1>'.$rowens['fk_rol'].'</h1>';
        $cateUser = $rowens['fk_rol'];
        //$sectorId = $rowens['id'];
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
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>



<?php
     include '../../includes/header.php';
     

     
    ?>
                <nav class="navegacion">
                    <?php
                     if($cateUser == 1){
                        ?> 
                         
                         <a class="navegacion__enlace" href="admin/propiedades/admincarreras.php">Administrador</a>

                        <?php
                      } 
                     ?> 
                    <!--<a class="navegacion__enlace" href="../../carreras.php">Vista de Alumnos</a>-->
                    <a class="navegacion__enlace" href="admincarreras.php">Mesas de Examenes</a>
                    <a class="navegacion__enlace navegacion__enlace--activo" href="admininscriptos.php">Incriptos</a>
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

                

<!-- TABLA PARA EDITAR -->
<form  method="post">
         
  <select name="carr" class="form-control form-control-sm">
    <option value="<?php echo $mostrar['carrera']; ?>">SELECCIONAR UNA CARRERA</option>
      <?php
        $consu = "SELECT * FROM carreras";
        $ejecutarconsu= mysqli_query($conex, $consu);
        while($consu2=mysqli_fetch_assoc($ejecutarconsu)){
        ?>
        <option value="<?php echo $consu2['id_carreras']; ?>"><?php echo $consu2['nombre']; ?></option>
        <?php
            }
            ?>
        </select>
          <br>

          <input type="submit" class="btn btn-primary" name="sexo" value="Buscar">

          </form>





</select>






          
<div> </div>

<table class="content-table">
  
<thead>

  <tr>
     
      <th>Carrera</th>
      <th>Espacio Curricular</th>
      <th>Año</th>
      <th>Llamado/s</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>DNI Alumno</th>
      <th>Celular Alumno</th>
      <th>Correo Electronico Alumno</th>
      <th>Condicion</th>
      <th>Año en el cual regularizo la materia
        (Solo si es regular)
      </th>
      <th>ELIMINAR</th>
      
      

  </tr>
  
</thead>

  <?php
$servidor="localhost";
$usuario="root";
$clave="";
$baseDeDatos="proyecto_db";

$enlace = mysqli_connect($servidor,$usuario,$clave,$baseDeDatos);



if(isset($_POST['sexo'])){

  $carr = $_POST['carr'];

  $sql="SELECT id_inscripcion_alumno, u.nombre AS nombre,apellido,username AS DNI,
  condicion, anio_regular, llamado,celular,correo,
  anio, m.descrip_mat, c.nombre AS carrera
  FROM inscripcion_alumno ia
  LEFT JOIN usuarios u ON u.id = ia.id_alumno
  LEFT JOIN examenes e ON e.id_examenes = ia.id_examen
  LEFT JOIN carreras c ON c.id_carreras = e.carrera
  LEFT JOIN mat m ON m.id_mat = e.espacio_curricular where e.carrera = $carr";

}else{

  $sql="SELECT id_inscripcion_alumno, u.nombre AS nombre,apellido,username AS DNI,
  condicion, anio_regular, llamado,celular,correo,
  anio, m.descrip_mat, c.nombre AS carrera
  FROM inscripcion_alumno ia
  LEFT JOIN usuarios u ON u.id = ia.id_alumno
  LEFT JOIN examenes e ON e.id_examenes = ia.id_examen
  LEFT JOIN carreras c ON c.id_carreras = e.carrera
  LEFT JOIN mat m ON m.id_mat = e.espacio_curricular";
}



$result=mysqli_query($enlace,$sql);

while($mostrar=mysqli_fetch_array($result)){
  $botonEliinscripcion = 'eliminarIns'.$mostrar['id_inscripcion_alumno'];
  $id_inscripcion_alumno = $mostrar['id_inscripcion_alumno'];
?>



<tbody>
<tr>
  
<td><?php echo $mostrar['carrera']?></td>

  <td><?php echo $mostrar['descrip_mat']?></td>
  <td><?php echo $mostrar['anio']?></td>
  <td><?php echo $mostrar['llamado']?></td>
  <td><?php echo $mostrar['nombre']?></td>
  <td><?php echo $mostrar['apellido']?></td>
  <td><?php echo $mostrar['DNI']?></td>
  <td><?php echo $mostrar['celular']?></td>
  <td><?php echo $mostrar['correo']?></td>
  <td><?php echo $mostrar['condicion']?></td>
  <td><?php echo $mostrar['anio_regular']?></td>
  
  
  <td>
              <!-- BOTON ELIMINAR -->

              <form method="post">
                <input type="submit" class="btn btn-danger" name="<?php echo $botonEliinscripcion; ?>" value="Eliminar">
            </td>
            </form>
  
  
 

</tr>
</tbody>







<?php
$guardar = 'guardar'.$mostrar['id_inscripcion_alumno'];
if(isset($_POST[$guardar])){
$mostrar = $mostrar['id_inscripcion_alumno'];
$insert = "INSERT INTO inscriptos(idmesa,idalumno) VALUES('$mostrar','$idalumno')";

$save = mysqli_query($conex, $insert);




if(!$save){
echo"Error en la linea sql";
}
}
include('../../includes/eliminar_inscripcion.php');


}
?>

</table>

</form>


</div>

<?php
        $consulta = "SELECT * FROM examenes";
        $ejecutarConsulta = mysqli_query($enlace, $consulta);
        $verFilas = mysqli_num_rows($ejecutarConsulta);
        $fila = mysqli_fetch_array($ejecutarConsulta);
        ?>


</body>






<footer class="footer">
    <p class="footer__texto">Sistema creado por y para alumnos de la institucion</p>
</footer>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#carrera').val(0);
		recargarLista();

		$('#carrera').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"filtro.php",
			data:"carrera=" + $('#carrera').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
</script>
