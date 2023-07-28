<?php

$conex = mysqli_connect("localhost","root","","proyecto_db");

 if(isset($_POST[$btnsend])){
     $condicion = trim($_POST['condicion']);
     $anio_regular = trim($_POST['anio_regular']);
     $llamado = $_POST['select_1'];

     foreach($llamado as $key => $value){

        $insertarDatos = "INSERT INTO inscripcion_alumno(id_alumno, id_examen, condicion, anio_regular, llamado)
        VALUES('$idalumno','$id_examen','$condicion','$anio_regular','$value')";
        
         $ejecutarInsertar = mysqli_query($conex, $insertarDatos);

         $comprobar = $ejecutarInsertar;

     }





     if($comprobar){
      
    

        ?>
    
        <script>
        var seg = 1;
        function borrar(){
    
                if(seg == 0){
                        location.href="carreras.php";
                }else{
                        seg--;
                        setTimeout("borrar()",1000);
                }
    
        }
    
        </script>
    <div>
    <img src="includes/wait.gif" onload="borrar()" width="200px" height="500px">
    </div> 
    <?php

       
    // JESUS COMPROBADOR 
    
      
    
     }

 }
     






?>
