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
                               
          <a class="navegacion__enlace" href="admin/propiedades/admin.php">Administrador</a>
      
        <?php
         } 
         ?> 
                
                    <a class="navegacion__enlace" href="carreras.php">Mesas de Examenes</a>
                    <a class="navegacion__enlace navegacion__enlace--activo" href="informacion.php">Informacion</a>
                    <a class="navegacion__enlace" href="cerrarSession.php">Cerrar Sesión</a>
                </nav> 
                
        <form class="asistencia" action="asistencia">
            <div clas="mb-3">
            <p><a href="https://www.comercio.edu.ar/" target="_blank">Sitio Web Oficial institucion</a></p>
        </form></div>
</body>




<footer class="footer">
    <p class="footer__texto">Sistema creado por y para alumnos de la institucion</p>
</footer>
</html>