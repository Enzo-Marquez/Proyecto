<?php

if(isset($_POST[$botonEliinscripcion])) {



$eliminarinscripcion= "DELETE from inscripcion_alumno where id_inscripcion_alumno= '$id_inscripcion_alumno'";
$ejecutareliminacioninscripto = mysqli_query($conex,$eliminarinscripcion);

if($ejecutareliminacioninscripto){ ?>
    
    <script>
    var segu = 2;
    function borrarUser(){

            if(segu == 1){
                    location.href="admininscriptos.php";
            }else{
                    segu--;
                    setTimeout("borrarUser()",1000);
            }

    }

    </script>
<div>
<img src="../../includes/wait.gif" onload="borrarUser()" width="200px" height="500px">
</div> 
<?php
}

}
?>