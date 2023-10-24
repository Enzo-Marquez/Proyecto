

<?php
// Permitir cualquier origen
header("Access-Control-Allow-Origin: *");

$conex = mysqli_connect("localhost", "root", "", "proyecto_db");

$carreraa = $_POST['carreraa'];
$anioa = $_POST['anioa'];

$sql3 = "SELECT * FROM mat WHERE carrera_mat = '$carreraa' AND anio_mat = '$anioa'";
$result00 = mysqli_query($conex, $sql3);
$selectHTML = '';
		while ($ver3 = mysqli_fetch_row($result00)) {
			$selectHTML .= '
			
			<option value="' . $ver3[0] . '">' . $ver3[1] . '</option>';
		}
		
		echo $selectHTML;
		
		?>





