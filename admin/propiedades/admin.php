
<?php

session_start();
error_reporting(0);
$varsesion = $_SESSION['user'];
if ($varsesion == null || $varsesion == '') {
  header("location: ../../index.php");
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
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


<body>



<?php
     include '../../includes/header.php';

     
    ?>
                <nav class="navegacion">
                    <?php
                     if($cateUser != 0){
                        header("location: ../../carreras.php");
                        die();
                      }
                     ?> 
                    <a class="navegacion__enlace" href="../../carreras.php">Vista de Alumnos</a>  
                    <a class="navegacion__enlace" href="admincarreras.php">Mesas de Examenes</a>
                    <a class="navegacion__enlace" href="admininscriptos.php">Inscriptos</a>
                    <a class="navegacion__enlace" href="adminusuarios.php">Usuarios</a>
                    <a class="navegacion__enlace" href="../../cerrarSession.php">Cerrar Sesión</a>
                </nav> 


<form  action="../../includes/insertar.php" method="post">
        <fieldset class="asignatura">
        
        <legend class="asignatura__titulo">Panel de Administrador</legend>
        
        




        </div>   











      </fieldset>
     </form>


    
</body>



    


    <?php
     include '../../includes/footer.php';
    ?>



</html>