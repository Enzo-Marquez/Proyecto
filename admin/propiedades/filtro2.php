<script type="text/javascript">
	$(document).ready(function() {
		$('#controlBuscador4<?php echo $id_examen; ?>').select2({
			dropdownParent: $("#editar<?php echo $id_examen; ?>")
		});
	});
</script>

<?php
// Permitir cualquier origen
header("Access-Control-Allow-Origin: *");

$conex = mysqli_connect("localhost", "root", "", "proyecto_db");

$id_examen = $_POST['idExamena'];
$carreraa = $_POST['carreraa'];
$anioa = $_POST['anioa'];

$sql3 = "SELECT * FROM mat WHERE carrera_mat = '$carreraa' AND anio_mat = '$anioa'";
$result00 = mysqli_query($conex, $sql3);
?>

<section style="text-align: center;">
	<select id="controlBuscador4<?php echo $id_examen; ?>" class="form-control form-control-sm" name="espacio_curriculara">

		<?php
		while ($ver3 = mysqli_fetch_row($result00)) {
		?>
			<option value="<?php echo $ver3[0]; ?>">
				<?php echo $ver3[1]; ?>
			</option>
		<?php
		}
		?>
	</select>
</section>
