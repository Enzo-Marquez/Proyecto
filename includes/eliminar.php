<?php

if(isset($_POST[$botonElim])) {


$eliminarmesa= "DELETE from examenes where id_examenes= '$id_examenes'";
$ejecutareliminacion = mysqli_query($conex,$eliminarmesa);
if($ejecutareliminacion){ 
        ?>
    
    <script>
    var seg = 1;
    function borrar(){

            if(seg == 0){
                    location.href="admincarreras.php";
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



