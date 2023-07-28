



<?php

$conex = mysqli_connect("localhost","root","","proyecto_db");


$id_examen = $_POST['idExamen'];
$carreraa = $_POST['carreraa'];
//$anio = $_POST['anio'];

$sql00="SELECT * from mat where carrera_mat = '$carreraa'";
$result00=mysqli_query($conex,$sql00);

?>

<script type="text/javascript">
			$(document).ready(function(){
				$('#controlBuscador<?php echo $id_examen; ?>').select2({
                    dropdownParent: $("editar<?php echo $id_examen; ?>")
                });
			});
			</script>

<section style="text-align: center;">
        
						<select id="controlBuscador<?php echo $id_examen; ?>" name="espacio_curricular">
							
							<?php 
              

          while ($ver00=mysqli_fetch_row($result00)) { ?>

							<option value="<?php echo $ver00[0] ?>">
								<?php echo $ver00[1] ?>
							</option>

							<?php  }?>
						</select>
					</section>