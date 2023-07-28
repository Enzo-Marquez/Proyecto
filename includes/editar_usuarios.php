<?php


if(isset($_POST[$botonEditusuarios])){
        $username = $_POST["usernamea"];
        $pass = $_POST["passa"];
        $nombre = $_POST["nombrea"];
        $apellido = $_POST["apellidoa"];
        $fk_rol = $_POST["fk_rola"];
        $carrera = $_POST["carreraa"];
        if($carrera == 0){
            ?>
            <script>alert("Debe Seleccionar Una Carrera");</script>
            <?php
    
        }



        else {
                $editarUsuarios = "UPDATE usuarios SET 
                username = '$username',
                pass = '$pass',
                nombre = '$nombre',
                apellido = '$apellido',
                fk_rol = '$fk_rol',
                carrera = '$carrera'
                WHERE id = '$editarB'";
                
                $ejecutaredicionUser = mysqli_query($conex, $editarUsuarios);
            
                if($ejecutaredicionUser){ ?>
    
                    <script>
                    var seg2 = 10;
                    function editar(){
                
                            if(seg2 == 0){
                                    location.href="adminusuarios.php";
                            }else{
                                    seg2--;
                                    setTimeout("editar()",1000);
                            }
                
                    }
                
                    </script>
                <div>
                <img src="../../includes/wait2.gif" onload="editar()" width="200px" height="500px">
                </div> 
                <?php
                }
            }
            }
            ?>
