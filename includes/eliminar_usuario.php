<?php

if(isset($_POST[$botonElimusuario])) {


$eliminarpersona= "DELETE from usuarios where id= '$id'";
$ejecutareliminacionpersona = mysqli_query($conex,$eliminarpersona);

if($ejecutareliminacionpersona){ ?>
    
    <script>
    var segu = 2;
    function borrarUser(){

            if(segu == 1){
                    location.href="adminusuarios.php";
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