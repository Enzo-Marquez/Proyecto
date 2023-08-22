<?php


if(isset($_POST[$botonEdit])){
        $carrera = $_POST["carreraa"];
        $anio = $_POST["anioa"];
        $espacio_curricular = $_POST["espacio_curriculara"];
        $llamado_1 = $_POST["llamado_1a"];
        $llamado_2 = $_POST["llamado_2a"];
        $hora = $_POST["horaa"];
        $presidente = $_POST["presidentea"];
        $vocal_1 = $_POST["vocal_1a"];
        $vocal_2 = $_POST["vocal_2a"];
        if($carrera == 0){
            ?>
            <script>alert("Debe Seleccionar Una Carrera");</script>
            <?php
    
        }



        else {
                $editarDatos = "UPDATE examenes SET 
                carrera = '$carrera',
                anio = '$anio',
                espacio_curricular = '$espacio_curricular',
                llamado_1 = '$llamado_1',
                llamado_2 = '$llamado_2',
                hora = '$hora',
                presidente ='$presidente',
                vocal_1 = '$vocal_1',
                vocal_2 = '$vocal_2' 
                WHERE id_examenes = '$editarA'";
                
                $ejecutaredicion = mysqli_query($conex, $editarDatos);
            
                if($ejecutaredicion){ ?>
    
                    <script>
                    var seg2 = 1;
                    function editar(){
                
                            if(seg2 == 0){
                                    location.href="admincarreras.php";
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
