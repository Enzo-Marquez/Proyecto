<?php
include_once("conexion.php");


if(isset($_POST['registrarse'])){
    $carrera = $_POST["carrera"];
    $anio = $_POST["anio"];
    $espacio_curricular = $_POST["espacio_curricular"];
    $llamado_1 = $_POST["llamado_1"];
    $llamado_2 = $_POST["llamado_2"];
    $hora = $_POST["hora"];
    $presidente = $_POST["presidente"];
    $vocal_1 = $_POST["vocal_1"];
    $vocal_2 = $_POST["vocal_2"];
    if($carrera == 0){
        ?>
        <script>alert("Debe Seleccionar Una Carrera");</script>
        <?php

    }
    else {
    $insertarDatos = "INSERT INTO examenes(carrera,anio,espacio_curricular,llamado_1,llamado_2,hora,presidente,vocal_1,vocal_2) VALUES('$carrera','$anio','$espacio_curricular','$llamado_1','$llamado_2','$hora','$presidente','$vocal_1','$vocal_2')";
    
    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

    


if($ejecutarInsertar){ ?>
    
    <script>
    var seg = 1;
    function borrar(){

            if(seg == 0){
                    location.href="../admin/propiedades/admincarreras.php";
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
