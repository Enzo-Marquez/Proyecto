<?php

if(isset($_POST[$botonElimusuario])) {


$eliminarpersona= "DELETE from usuarios where id= '$id'";
$ejecutareliminacionpersona = mysqli_query($conex,$eliminarpersona);

if($ejecutareliminacionpersona){ ?>
    
    <script>
    var seg = 1;
    function borrar(){

            if(seg == 0){
                    location.href="adminusuarios.php";
            }else{
                    seg--;
                    setTimeout("borrar()",1000);
            }

    }

    </script>
<div>
<img src="../../includes/wait.gif" onload="borrar()" width="200px" height="500px">
</div> 
<?php
}

}
?>