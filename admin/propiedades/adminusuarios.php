
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
        $asd = $conex->query( "SELECT id, nombre from usuarios where username='$var'");
        while($rowens = $asd->fetch_array()){ 
        //echo '<h1>'.$rowens['fk_rol'].'</h1>';
        $cateUser = $rowens['fk_rol'];
        //$sectorId = $rowens['id'];
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
    <title>Usuarios</title>
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
                    <a class="navegacion__enlace" href="../../carreras.php">Vista de Alumnos</a>
                    <a class="navegacion__enlace" href="admincarreras.php">Mesas de Examenes</a>
                    <a class="navegacion__enlace" href="admininscriptos.php">Inscriptos</a>
                    <a class="navegacion__enlace navegacion__enlace--activo" href="adminusuarios.php">Usuarios</a>
                    <a class="navegacion__enlace" href="../../cerrarSession.php">Cerrar Sesión</a>
                </nav> 


             <div class="asignatura">
                

<!-- TABLA CON DATOS -->

<table class="content-table-user">
  
<thead>

  <tr>
      <th>DNI (Nombre de Usuario)</th>
      <th>Contraseña</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Rol</th>
      <th>Carrera</th>
      <th>Editar</th>
      <th>Eliminar</th>
  </tr>
  
</thead>



<!-- CONEXION A LA DB -->
  <?php
$servidor="localhost";
$usuario="root";
$clave="";
$baseDeDatos="proyecto_db";

$enlace = mysqli_connect($servidor,$usuario,$clave,$baseDeDatos);







$sql="SELECT u.username, u.pass, u.nombre, u.apellido, 
CASE WHEN u.fk_rol = 0 THEN 'Administrador' ELSE 'Alumno' END AS Rol,
c.nombre AS nombre_carrera, u.celular, u.correo
FROM usuarios u
JOIN carreras c ON u.carrera = c.id_carreras;";
$result=mysqli_query($enlace,$sql);

while($mostrar=mysqli_fetch_array($result)){
  $botonElimusuario = 'eliminarC'.$mostrar['id'];
  $id = $mostrar['id'];
?>

<!-- FIN DE LA CONEXION -->


<!-- MOSTRAR LOS DATOS DE LA DB -->
<tbody>
<tr>
  <td><?php echo $mostrar['username']?></td>
  <td><?php echo $mostrar['pass']?></td>
  <td><?php echo $mostrar['nombre']?></td>
  <td><?php echo $mostrar['apellido']?></td>
  <td><?php echo $mostrar['Rol']?></td>
  <td><?php echo $mostrar['nombre_carrera']?></td>


<!-- FIN DE LA CONEXION A LA DB -->



<!-- COMIENZO BOTONES -->

  <!-- BOTON EDITAR -->
  <td><form method="post">
  <button type="button" class="asign2 editbtn" data-toggle="modal" data-target="#editar<?php echo $mostrar['id']; ?>">
  Modificar</td>
  </form>


<td>

  <!-- BOTON ELIMINAR -->
<form method="post">

        <input type="submit" class="asign1" name="<?php echo $botonElimusuario; ?>" value="Eliminar">
        <!-- <a href="../../carreras.php"> <button class="asign1">Volver</button></a> -->
        </td>
</form>
</tr>
</tbody>

<!-- FIN BOTONES -->


<!-- Modal Editar-->

<div class="modal fade" id="editar<?php echo $mostrar['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLongTitle">Editar Usuarios</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" style="background-color:#b1bfc2;">

<?php

$editarB = $mostrar['id'];

//$consEditA = "SELECT * FROM examenes where id = '$editarA'";

//$resCon = mysqli_query($conex,$consEditA);

$botonEditusuarios = 'editar'. $mostrar['id']; 


//while($mostrar=mysqli_fetch_assoc($resCon)){
 

?>
             
<div>
    <form method="post">


        <br>
        <div>
        <label align="left">Celular</label>
        <input class="form-control form-control-sm" name="celular" type="number" placeholder="Ingrese su numero Personal sin guiones" 
        value="<?php echo $mostrar['celular'];?>" required>
        </div>
        <br>


        <div>
        <label align="left">Correo Electronico</label>
        <input class="form-control form-control-sm" name="correo" type="email" placeholder="Ingrese su correo de contacto" 
        value="<?php echo $mostrar['correo'];?>"required>
        </div>  
        <br>
    

        <div>
          <br>
        <label align="left">DNI</label>
        <input class="form-control form-control-sm" name="usernamea" type="number" placeholder="Dni Del Alumno"
        value="<?php echo $mostrar['username'];?>" required>
        </div>

        <div>
          <br>
        <label align="left">Contraseña</label>
        <input class="form-control form-control-sm" name="passa" type="text" placeholder="Contraseña" 
        value="<?php echo $mostrar['pass'];?>"required>
        </div>

        <div>
          <br>
        <label align="left">Nombre</label>
        <input class="form-control form-control-sm" name="nombrea" type="text" placeholder="Nombre"
        value="<?php echo $mostrar['nombre'];?>" required>
        </div>

        <div>
          <br>
        <label align="left">Apellido</label>
        <input class="form-control form-control-sm" name="apellidoa" type="text" placeholder="Apellido"
        value="<?php echo $mostrar['apellido'];?>" required>
        </div>


        <div>
          <!-- SELECT DE ROL -->
        <br>
        <p>Seleccionar Rol</p>  
        <select name="fk_rola" class="form-control form-control-sm">
                      <option value="<?php echo $mostrar['fk_rol'];?>">Seleccionar Rol</option>
                      <option value="0">Administrador</option>
                      <option value="1">Alumno</option>
        </select>
        </div>
        <br>
        
        <!-- FIN SELECT DE ROL -->
      
        <!-- SELECT DE CARRERA -->
        <div>
           
      <p>Seleccionar Carrera</p>          
  <select name="carreraa" class="form-control form-control-sm">
    <option value="<?php echo $mostrar['carrera']; ?>"> <?php echo $mostrar['carrera']; ?></option>
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
        </div>
       

<!-- FIN SELECT DE CARRERA -->

    <!-- BOTON DE MODIFICAR USUARIO -->
    
    <div>
        <input type="submit" class="asign2" name="<?php echo $botonEditusuarios; ?>"  value="Modificar Usuario">
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

</div>

</div>
<div class="modal-footer">

</div>
</div>
</div>
</div>
</div>

<!-- FIN MODAL EDITAR -->


<!-- Modal ELIMINAR-->

<div class="modal fade" id="ventana<?php
  echo $mostrar['id'];
  ?>"
tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  echo "Usted se esta inscribiendo a ".$mostrar['espacio_curricular'];
  ?>
</div>
<div class="modal-footer">
<form method="post">
<input class="btn btn-primary" value="Aceptar" type="submit" name="guardar<?php
  echo $mostrar['id'];
  ?>">
  </form>
</div>
</div>
</div>
</div>

<?php
$guardar = 'guardar'.$mostrar['id'];
if(isset($_POST[$guardar])){
$mostrar = $mostrar['id'];
$insert = "INSERT INTO inscriptos(idmesa,idalumno) VALUES('$mostrar','$idalumno')";

$save = mysqli_query($conex, $insert);




if(!$save){
echo"Error en la linea sql";
}
}

 include('../../includes/eliminar_usuario.php');
 include('../../includes/editar_usuarios.php');

}
?>

</table>

</form>



<!-- FIN DE LA MODAL ELIMINAR -->

<!-- BOTON PARA CREAR EL USUARIO -->
<br>
<button class="asign1" type="button" data-toggle="modal" data-target="#agregarusuario">Crear Usuario</button>

<!-- FIN DEL BOTON DE CREAR EL USUARIO-->



<?php
$guardar = 'guardar'.$mostrar['id'];
if(isset($_POST[$guardar])){
$mostrar = $mostrar['id'];
$insert = "INSERT INTO inscriptos(idmesa,idalumno) VALUES('$mostrar','$idalumno')";

$save = mysqli_query($conex, $insert);




if(!$save){
echo"Error en la linea sql";
}
}




?>

</table>

</form>



<!-- FIN DE LA TABAL -->
    



<!-- Modal INSERTAR-->
<div class="carreraa"></div>
<div class="modal fade" id="agregarusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLongTitle">Agregar Usuarios</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" style="background-color:#b1bfc2;">

<form  action="../../includes/insertar_usuarios.php" method="post">
        <fieldset>
        
        
        
        
  <div>
  <select name="carrera" class="form-control form-control-sm">
  <option value="0">Seleccionar Carrera</option>
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
  </div>
    
  <div>
        <label align="left">Celular</label>
        <input class="form-control form-control-sm" name="celular" type="number" placeholder="Ingrese su numero Personal sin guiones" required>
        </div>
        <br>


        <div>
        <label align="left">Correo Electronico</label>
        <input class="form-control form-control-sm" name="correo" type="email" placeholder="Ingrese su correo de contacto" required>
        </div>  
        <br>



  
        <div>
        <br>
        <label>DNI</label>
        <input class="form-control form-control-sm" name="username" type="text" placeholder="DNI Del Alumno" required>
        </div>

        <div>
          <br>
        <label align="left">Contraseña</label>
        <input class="form-control form-control-sm" name="pass" type="text" placeholder="Contraseña" required>
        </div>

        <div>
          <br>
        <label align="left">Nombre</label>
        <input class="form-control form-control-sm" name="nombre" type="text" placeholder="Nombre" required>
        </div>

        <div>
          <br>
        <label align="left">Apellido</label>
        <input class="form-control form-control-sm" name="apellido" type="text" placeholder="Apellido" required>
        </div>

        <div>
          <br>
          <!-- SELECT DE ROL -->
        <form method="post">
        <p>Seleccionar Rol</p>  
        <select name="fk_rol" class="form-control form-control-sm">
                      <option value="<?php echo $mostrar['fk_rol'];?>">Seleccionar Rol</option>
                      <option value="0">Administrador</option>
                      <option value="1">Alumno</option>
                    
                        
                    
                








        </select>
        </div>
        <br>
        </form>
        <!-- FIN SELECT DE ROL -->

        <div>
        <input type="submit" class="asign1" name="registrar_usuario"  value="Agregar Usuario">
        <!-- <a href="../../carreras.php"> <button class="asign1">Volver</button></a> -->
</div>


  

<?php
        $consulta = "SELECT * FROM usuarios";
        $ejecutarConsulta = mysqli_query($enlace, $consulta);
        $verFilas = mysqli_num_rows($ejecutarConsulta);
        $fila = mysqli_fetch_array($ejecutarConsulta);
        ?>
</div>   
      </fieldset>
     </form>
</div>
<div class="modal-footer">

</div>
</div>
</div>
</div>
</div>
                      

                  
  </body>
<?php
                       include '../../includes/footer.php';
                      ?>
                  
                  </html>