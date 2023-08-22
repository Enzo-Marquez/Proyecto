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
        $asd = $conex->query( "SELECT carrera, id, nombre, apellido, fk_rol from usuarios where username='$var'");
        while($rowens = $asd->fetch_array()){ 
        
        $idalumno = $rowens['id'];
        $carreraalumno = $rowens['carrera'];
        $cateUser = $rowens['fk_rol'];
        
             }
             

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>


    <header class="header">
        <div>
            <div class="header__logo">
                <a href="#">
                    <img src="img/Escuela.png" alt="logotipo">
                </a>
            </div>
            
            
        </div>
    </a>


    <div class="esc">Escuela Superior De Comercio N43 <br>
        ¡Bienvenido!
      </div>
    </header>




    <nav class="navegacion">
    <?php
                     if($cateUser == 0){
                        ?> 
                         
                         <a class="navegacion__enlace" href="admin/propiedades/admincarreras.php">Administrador</a>

                        <?php
                     
                      }
                     ?> 
                
                    <a class="navegacion__enlace" href="carreras.php">Mesas de Examenes</a>
                    <a class="navegacion__enlace navegacion__enlace--activo" href="informacion.php">Informacion</a>

                       <!-- Modal Salir -->
 
  <a class="navegacion__salir"> </a> <button class="btn btn-danger" data-target=".bs-example-modal-sm" data-toggle="modal">Salir</button>

    
<div tabindex="-1" class="modal bs-example-modal-sm" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="modal-header"><h4>Cerrar Sesion <i class="fa fa-lock"></i></h4></div>
      <div class="modal-body"><i class="fa fa-question-circle"></i>¿Estás seguro que deseas Salir?</div>
      <div class="modal-footer"><a class="btn btn-primary btn-block" href="cerrarSession.php">Salir</a></div>
    </div>
  </div>
</div>
</div>

                </nav> 
                
                

    
    
        <div class="iframe-container">
    <iframe src="https://www.comercio.edu.ar/examenesfinales/" frameborder="0" allowfullscreen></iframe>
</div>
    
    
    </div>

        <style>
.iframe-container {
    height: 800px;
}


iframe {
  
  
 
  width: 100%;
  height: 100%;
  border: 0;
}
</style>
<div>

</body>




<footer class="footer">
    <p class="footer__texto">Sistema creado por y para alumnos de la institucion</p>
</footer>
</html>