<?php
include_once("conexion.php");


if(isset($_POST['registrar_usuario'])){
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fk_rol = $_POST["fk_rol"];
    $carrera = $_POST["carrera"];
    $celular = $_POST["celular"];
    $correo = $_POST["correo"];
    if($carrera == 0){
        ?>
        <script>alert("Debe Seleccionar Una Carrera");</script>
        <?php

    }
    else {
    $insertarDatos = "INSERT INTO usuarios(username,pass,nombre,apellido,fk_rol,carrera,celular,correo) VALUES('$username','$pass','$nombre','$apellido','$fk_rol','$carrera','$celular','$correo')";
    
    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

    if($ejecutarInsertar){ ?>
    
        <script>
        var seg = 1;
        function borrar(){
    
                if(seg == 0){
                        location.href="../admin/propiedades/adminusuarios.php";
                }else{
                        seg--;
                        setTimeout("borrar()",1000);
                }
    
        }
    
        </script>
    <div>
    <img src="wait.gif" onload="borrar()" width="200px" height="500px">
    </div> 
    <?php
    }
    
    }
    
    }
    
    ?>