<?php

session_start();
error_reporting(0);
$varsesion= $_SESSION['user'];
if($varsesion== null || $varsesion=''){
    header("location: index.php");
    die();
}

$var= $_SESSION['user'];
   $conex = mysqli_connect("localhost","root","","proyecto_db");
        $asd = $conex->query( "SELECT carrera, id, nombre, apellido, fk_rol from usuarios where username='$var'");
        while($rowens = $asd->fetch_array()){ 
        
        $idalumno = $rowens['id'];
        $carreraalumno = $rowens['carrera'];
        $cateUser = $rowens['fk_rol'];
        
             }
             

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carreras</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tabla.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<body>
    


<header class="header">
  <div>
    <div class="header__logo">
      <a href="#">
        <img src="img/Escuela.png" alt="logotipo">
          </a>
    </div>
    </div>

    </a>
    <div class="esc">Escuela Superior De Comercio N43 <br>
        ¡Bienvenido!
      </div>

</header>

<nav class="navegacion">
  <?php
    if($cateUser == 0){
    ?> 
                         
    <a class="navegacion__enlace" href="admin/propiedades/admin.php">Administrador</a>

  <?php
   } 
   ?> 
                    
  <a class="navegacion__enlace navegacion__enlace--activo" href="carreras.php">Mesas de Examenes</a>
  <a class="navegacion__enlace" href="informacion.php">Informacion</a>
  <a class="navegacion__enlace" href="cerrarSession.php">Cerrar Sesión</a>
  </nav> 

  <div class="carrera">
  <div class="mb-3">
            <!-- <h5>Selecciona la carrera para conocer las fechas de Examenes</h5> -->
        <!-- <select class="carreras" name="select"> -->
            <!-- <option value="value1">Analista en Medio Ambiente</option> -->
            <!-- <option value="value2">Tecnico Superior en Infraestructura de tecnologia de la informacion</option> -->
            <!-- <option value="value3">Tecnico Superior en Desarrollo de Software</option> -->
            <!-- <option value="value4">Tecnico Superior en gestion Industrial</option> -->

            <!-- imprimir la mesa segun la materia -->
  
    <table class="content-table">
                        
    <thead>
    <tr>
                           
      <th>carrera</th>
      <th>año</th>
      <th>espacio curricular</th>
      <th>primer llamado</th>
      <th>segundo llamado</th>
      <th>hora</th>
      <th>presidente</th>
      <th>vocal 1</th>
      <th>Vocal 2</th>
      <th>Inscribirse</th>

    </tr>                 
    </thead>
                    
  <?php
  
  $sql="SELECT e.id_examenes as idExamen,carrera,
  anio,m.descrip_mat,
  llamado_1,llamado_2,hora,
  presidente,vocal_1,vocal_2,
  nombre from examenes e
  LEFT JOIN mat m ON m.id_mat = e.espacio_curricular
  left join carreras c on c.id_carreras = e.carrera
  where e.carrera = '$carreraalumno'";
  $result=mysqli_query($conex,$sql);

  while($mostrar=mysqli_fetch_array($result)){

  $id_examen = $mostrar['idExamen'];

  $btnsend = 'btnsend'. $mostrar['idExamen']; 

  

  // CONSULTA PARA SABER SI EL USUARIO ESTA INSCRIPTO O NO //
  $inscripto = "SELECT COUNT(id_inscripcion_alumno) as num_insc FROM inscripcion_alumno WHERE id_alumno = $idalumno
  AND id_examen = $id_examen ";

  $btninsc=mysqli_query($conex,$inscripto);

  while($mostrarboton=mysqli_fetch_array($btninsc)){
  $num_insc = $mostrarboton['num_insc'];

  }

// FIN DE LA CONSULTA //






//TEXTO DE TERMINOS Y CONDICIONES //

  ?>


<style>
    h1 {
      font-size: 24px;
      text-align: center;
    }
    h2 {
      font-size: 18px;
      text-align: left;
    }
    h3 {
      color: blue;
      font-size: 18px;
      text-align: left;
    }
    li {
      font-size: 18px;
      text-align: left;
    }
</style>

<head>
    <title>Botón Mostrar/Ocultar</title>
    <style>
        #terms {
            display: none;
        }

        #toggleButton {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #toggleButton:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <button id="toggleButton" onclick="toggleTerms()">Mostrar/Ocultar Términos y Condiciones</button>
    <div id="terms">
    <br>
    
<h1>TERMINOS Y CONDICIONES PARA RENDIR UNA ASIGNATURA</h1>

<h2>Los exámenes se realizarán de forma PRESENCIAL. Las Asignaturas ya estan cargadas en su usuario vinculadas a su respectiva carrera.
  Solo debe completar su condicion de alumno, el año regular(solo si corresponde) y a los llamados que desea inscribirse.
</h2> 

<h3>Para completar el proceso de inscripción, se requiere que cada estudiante complete el formulario correspondiente para cada materia en la que desee rendir. Es fundamental que cada estudiante asuma la responsabilidad de inscribirse en las materias correctas. Tenga en cuenta que no se considerarán las inscripciones en materias que no correspondan al año y la carrera que esté cursando actualmente (es decir, en calidad de estudiante regular). Asimismo, es importante destacar que se respetará el llamado que usted seleccione al momento de la inscripción. En caso de que se inscriba únicamente en el primer llamado, no será posible rendir en el segundo llamado. Le rogamos que tenga esto en cuenta y tome las decisiones de inscripción de manera consciente y precisa.</h3>

<li> Los alumnos regulares rinden de acuerdo a la planificación de la materia del año de la regularidad y los alumnos libres según planificación del 2022. Las regularidades de espacios curriculares con formato "materia", duran 3 años que se cuentan a partir del próximo año del cursado. </li>
<br>
<li> Tener en cuenta las CORRELATIVIDADES para inscribirse, Esto se controlará y en el caso de no cumplir, la inscripción no será válida. </li>
<br>
<li> Recordar que los "Talleres" no se pueden rendir como LIBRE y solo permite rendirse dos turnos consecutivos a partir de la regularidad (Ej: si regularizó en NOVIEMBRE, puede rendir en el turno NOVIEMBRE / DICIEMBRE y FEBRERO / MARZO, si no aprueba debe recursar). (Por esta razón en este turno no figura COMUNICACIÓN (1er. cuatrimestre)).</li>
<br>
<li> Los "Proyectos / Seminarios" tienen regularidad de un año, que se cuentan a partir del próximo año de cursada la materia. No se puede rendir como LIBRE.</li>
<br>
<li> Si rinde PRACTICA PROFESIONALIZANTE II debe enviar el informe final al docente 15 días antes de la fecha de la mesa de exámen para ser aprobado por el mismo y visado por el Consejo Académico. </li>
<br>
<h3>LA INSCRIPCION NO SE PUEDE ELIMINAR UNA VEZ ENVIADA POR FAVOR VERIFICAR LOS DATOS ANTES DE ENVIAR</h3>
<br>
<p>(Cualquier duda o inconveniente consultar por mail a regencia@comercio.edu.ar)</P>


<script>
        function toggleTerms() {
            var termsDiv = document.getElementById("terms");
            if (termsDiv.style.display === "none") {
                termsDiv.style.display = "block";
            } else {
                termsDiv.style.display = "none";
            }
        }
    </script>

    </div>

   








  
<tbody>
<tr>
                        
    <td><?php echo $mostrar['nombre']?></td>
    <td><?php echo $mostrar['anio']?></td>
    <td><?php echo $mostrar['descrip_mat']?></td>
    <td><?php echo $mostrar['llamado_1']?></td>
    <td><?php echo $mostrar['llamado_2']?></td>
    <td><?php echo $mostrar['hora']?></td>
    <td><?php echo $mostrar['presidente']?></td>
    <td><?php echo $mostrar['vocal_1']?></td>
    <td><?php echo $mostrar['vocal_2']?></td>
    <td>
    <!-- CICLO IF para eliminar el boton de inscripcion -->

    <?php 
    if ($num_insc < 1) {
    ?>

      <!-- BOTON -->
      <button type="button" class="cuatri1" data-toggle="modal" data-target="#ventana<?php
      echo $mostrar['idExamen'];
      ?>">
        Inscribirse
      
    
    <?php
      }
      else
      {
        echo "<font color=\"BLUE\">INSCRIPTO</font>";
      }
  ?>  </button></td>

</tr>
</tbody>




  <!-- Modal -->



<div class="modal fade" id="ventana<?php echo $mostrar['idExamen']; ?>">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLongTitle">Enviar Inscripcion</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" style="background-color:#b1bfc2;">
<fieldset>
<form method="post" id="myForm">
        
        

        
        
<div>
      

        <div>
        <label align="left">Condicion</label>

        <select name="condicion" align="left" class="form-control form-control-sm">
        <option value="Alumno Regular">Regular</option>
        <option value="Alumno Libre">Libre</option>
        </div>
        </select>
        <br>


        <div>
          <br>
        <label align="left" >Año En el Cual Usted Regularizo la Asignatura</label><p style="color: red;">(Opcional) Si Usted No es Regular No Seleccione Año</p>
        <select class="form-control form-control-sm" name="anio_regular"  placeholder="Sino es Regular Deje el Campo en blanco">
        <option selected="true" disabled="disabled">SELECCIONAR AÑO</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        </div>
        </select>
        <br>

        
        <label>Seleccione a los llamados que quiere Inscribirse</label>
        <br>  
        <select class="form-control form-control-sm" name="select_1[]" data-placeholder="Llamado/s">
        <option value="Ambos Llamados">Ambos Llamados</option>
        <option value="Primer Llamado">Primer Llamado</option>
        <option value="Segundo Llamado">Segundo Llamado</option>
        </select>
        <br>

        <label for="terms">
      <input type="checkbox" id="terms" required> 
      Confirmo que he leído los términos y condiciones estipulados por la institución y que acepto cumplir con los mismos. Además, certifico que los datos proporcionados en este formulario son precisos y correctos.
    </label>
</div>
      

<div>
<input type="submit" class="asign1" name="<?php echo $btnsend; ?>"  value="Enviar Inscripcion">     
</div>


        
</div>   
</fieldset>
</form>
</div>
<div class="modal-footer">



<?php
  include 'includes/insertar_inscripcion.php';
  ?>              


  <?php
    

    

  }
  ?>
                
        
</table> 

 
  </div>
  </div>
  <?php
  
  include 'includes/footer.php';
    ?>

<script>
    document.querySelector("#myForm").addEventListener("submit", function(event) {
      var checkbox = document.querySelector("#terms");
      if (!checkbox.checked) {
        alert("Debes aceptar los términos y condiciones antes de enviar el formulario.");
        event.preventDefault();
      }
    });
  </script>







</body>


</html>
    

<!-- SOLUCION AL SELECT2 EN LA MODAL -->
<!-- <script>
$('body').on('shown.bs.modal', '.modal', function() {
  $(this).find('select').each(function() {
    var dropdownParent = $(document.body);
    if ($(this).parents('.modal.in:first').length !== 0)
      dropdownParent = $(this).parents('.modal.in:first');
    $(this).select2({
      dropdownParent: dropdownParent
      // ...
    });
  });
});
</script> -->
<!-- ---------------------------------- -->



  










