<?php

include_once 'user.php';
include_once 'userSession.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    echo "Hay sesión";
    $user->setUser($userSession->getCurrentUser());?>

	<script>
		location.href="carreras.php";
  </script>
	<?php
    
}else if(isset($_POST['username']) && isset($_POST['pass'])){
    echo "Validación de login";

    $userForm = $_POST['username'];
    $passForm = $_POST['pass'];

    if($user->userExists($userForm, $passForm)){
        echo "usuario validado";
        $userSession->setCurrentUser($userForm);


		
        $user->setUser($userForm);?>

<h3 id="username" style="color: #817b7b;"></h3>
        




<link rel="stylesheet" href="css/master.css">
<body class="body">




<section class="vh-100 bg-dark gradient-custom ">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100 ">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">




			<script>
                    var segundos = 3;
                    
                    function contador(){
                        document.getElementById('tiempo').innerHTML = "INGRESANDO...";
                        if(segundos == 0){
                            location.href="./admin/propiedades/admincarreras.php";
                        }else{
                            segundos--;
                            setTimeout("contador()",1000);
                        }
                    }

                </script>

                <img src="img/wait.gif" onload="contador()" width="300px" height="300px">
                <h3 id="tiempo" style="color: #817b7b;"></h3>



            </div>
          </div>
        </div>
      </div>
	  
    </div>
  </div>
</section>

</body>


<?php

    }else{?>
  <link rel="stylesheet" href="css/master.css">
  <body class="body">    







		<section class="vh-100 bg-dark gradient-custom ">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100 ">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">




			<script>
                    var segundos = 3;
                    function contadorDen(){
                        document.getElementById('denegado').innerHTML = "USUARIO Y/O CONTRASEÑA INCORRECTOS";
                        if(segundos == 0){
                            location.href="session.php";
                        }else{
                            segundos--;
                            setTimeout("contadorDen()",1000);
                        }
                    }

                </script>
        <img src="img/p3.gif" onload="contadorDen()" width="400px" height="400px"><br><br>
        <h3 id="denegado" style="color: #817b7b;"></h3>



            </div>
          </div>
        </div>
      </div>
	  
    </div>
  </div>
</section>













   <?php }

}else{
    //echo "Login";
    include_once 'login.php';
}


?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Autogestión</title>
	<link rel="icon" href="logoPagBlack.png">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link rel="stylesheet" type="text/css" href="loginstyle.css">
    <script src="bootstrap.bundle.js"></script>
	<style>
	
	/*@import url('https://fonts.googleapis.com/css2?family=Asap:wght@500&family=Secular+One&display=swap');*/


* {
	padding: 0;
	margin: 0;
	/font-family: century gothic !important;/
	font-family: 'Asap', sans-serif !important;
	text-align: center;
}

	
	
	body{
	
	background: url(fondo.jpg);
	background-repeat: no-repeat;
 	background-attachment: fixed;
	background-size: cover;
}</style>
</head>