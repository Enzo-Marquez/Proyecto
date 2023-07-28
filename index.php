
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema De Autogestion</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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
               <!-- 
                <nav class="navegacion">
                    <a class="navegacion__enlace navegacion__enlace--activo" href="index.php">Inicio</a>
                    <a class="navegacion__enlace" href="carreras.php">Carreras</a>
                    <a class="navegacion__enlace" href="asistencia.php">Asignaturas</a>
                    <a class="navegacion__enlace" href="informacion.html">Informacion</a>
                    <a class="navegacion__enlace" href="sugerencias.html">Sugerencias</a>
                </nav> -->

                <!-- <nav class="navbar navbar-expand-lg bg-primary">
                    <div class="container-fluid">
                        <div style="margin: 0 auto; color:white;">
                      <a class="navbar-brand" href="#"></a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                          </li>
                          <li class="nav-item" style=>
                            <a class="nav-link" href="#">Carreras</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Asistencia</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link disabled">Informacion</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link disabled">Sugerencias</a>
                          </li>
                        </ul>
                    </div>
                      </div>
                    </div>
                  </nav> -->
            
    <section class="form-login">
        <div class="mb-3">
          <br>
            <br>
                <div class="mb-3">
                    <a>Iniciar Sesión:</a>
                    <input class="boton__ingresar" onclick="location='session.php'" type="submit" name="" value="Ingresar">
                    
                    
                </div>
            </div>
            <p>
            Si no tienes clave personal o te la olvidaste, haz clic en: 'Obtener Clave Personal', y te será enviada a tu casilla de correo electrónico. Ten en cuenta que esto lo corrobora el personal de regencia y puede demorar cierto tiempo, así que no olvides tu clave.</p>
            <p>
            <!-- Botón para abrir la ventana modal -->
<button type="button" id="openModalBtn" class="boton__ingresar">Restablecer Contraseña</button>

<!-- Ventana modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Restablecer Contraseña</h2>
    <form action="restablecer_contrasena.php" method="POST">

      <label for="DNI">DNI:</label><br>
      <input type="number" id="username" name="DNI" required>


      <label for="email">Correo Electrónico:</label>
      <input type="email" id="email" name="email" required>

      <label for="newPassword">Nueva Contraseña:</label>
      <input type="password" id="newPassword" name="newPassword" required>

      <label for="confirmPassword">Confirmar Contraseña:</label>
      <input type="password" id="confirmPassword" name="confirmPassword" required>
      <br>
      <button type="submit">Restablecer</button>
    </form>
  </div>
</div>

<!-- Script para abrir y cerrar la ventana modal -->
<script>
// Obtener la referencia al botón y a la ventana modal
var openModalBtn = document.getElementById("openModalBtn");
var modal = document.getElementById("myModal");

// Obtener la referencia al elemento de cierre de la ventana modal
var closeBtn = document.getElementsByClassName("close")[0];

// Abrir la ventana modal cuando se haga clic en el botón
openModalBtn.onclick = function() {
  modal.style.display = "block";
}

// Cerrar la ventana modal cuando se haga clic en el botón de cierre
closeBtn.onclick = function() {
  modal.style.display = "none";
}

// Cerrar la ventana modal cuando se haga clic fuera de ella
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


<!-- Estilos CSS -->
<style>
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 10% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 400px;
  border-radius: 5px;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.form-group {
  margin-bottom: 20px;
}

label {
  font-weight: bold;
}

input[type="email"],
input[type="username"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #45a049;
}
</style>


    </div>
    </section>

</body>




<footer class="footer">
    <p class="footer__texto">Sistema creado por y para alumnos de la institucion</p>
</footer>
</html>
