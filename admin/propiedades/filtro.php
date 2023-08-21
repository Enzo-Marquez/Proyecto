<script type="text/javascript">
	$(document).ready(function() {
		$('#controlBuscador3').select2({
			dropdownParent: $("#agregarcarrera")
		});
	});
</script>

<?php


// Permitir cualquier origen
header("Access-Control-Allow-Origin: *");


$conex = mysqli_connect("localhost", "root", "", "proyecto_db");




$carrera = $_POST['carrera'];
$anio = $_POST['anio'];



?>



<section style="text-align: center;">

	<select id="controlBuscador3" name="espacio_curricular">

		<?php

		$sql3 = "SELECT * from mat where carrera_mat = '$carrera' AND anio_mat = '$anio'";
		$result3 = mysqli_query($conex, $sql3);

		while ($ver3 = mysqli_fetch_row($result3)) { ?>

			<option value="<?php echo $ver3[0] ?>">
				<?php echo $ver3[1] ?>
			</option>

		<?php  } ?>
	</select>
</section>