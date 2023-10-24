<?php
$conex = mysqli_connect("localhost", "root", "", "proyecto_db");

if($_SERVER["REQUEST_METHOD"] == "POST"){
        $idExamen = $_POST['idExamen'];
        $carrera = $_POST["carreraa"];
        $anio = $_POST["anioa"];
        $espacio_curricular = $_POST["espacio_curriculara"];
        $llamado_1 = $_POST["llamado_1a"];
        $llamado_2 = $_POST["llamado_2a"];
        $hora = $_POST["horaa"];
        $presidente = $_POST["presidentea"];
        $vocal_1 = $_POST["vocal_1a"];
        $vocal_2 = $_POST["vocal_2a"];

       
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
                 WHERE id_examenes = '$idExamen'";
                
                 $ejecutaredicion = mysqli_query($conex, $editarDatos);
            
                 if ($ejecutaredicion) {
                        header("refresh:2;url=../admin/propiedades/admincarreras.php");
                    } else {
                        echo "Error en la consulta: " . mysqli_error($conex);
                    }
                    
                
            }
            
            ?>
