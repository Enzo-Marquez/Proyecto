<?php

include_once 'con_db2.php';

class User extends DB{

    private $nombre;
    private $username;
    

    public function userExists($user, $pass){
       # $md5pass = md5($pass);

        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user AND pass = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['username'];
            
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}






/*include('con_db.php');


if (isset($_POST['ingresar'])) {

    $user =trim($_POST['user']);
    $pass =trim($_POST['pass']);

    $userCons = "SELECT * FROM usuarios WHERE userName = '$user' AND userPass ='$pass'";

    $resConsUser = mysqli_query($conex, $userCons);
    $filasUser = mysqli_num_rows($resConsUser);

    if($filasUser > 0){?>
        <script>
                    var segundos = 2;
                    function contador(){
                        document.getElementById('tiempo').innerHTML = "INGRESANDO...";
                        if(segundos == 0){
                            location.href="buscador.php";
                        }else{
                            segundos--;
                            setTimeout("contador()",1000);
                        }
                    }

                </script>
                <img src="wait.gif" onload="contador()" width="100" height="100">
                <h3 id="tiempo"></h3>
            <?php
    }else{
        ?>
        <script>
                    var segundos = 2;
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
        <img src="lock2.gif" onload="contadorDen()" width="75" height="75">
        <h3 id="denegado"></h3>
        <?php
    }

    mysqli_free_result($resConsUser);
    mysqli_close($conex);
}else{
    ?><h3>INGRESE SUS DATOS</h3><?php
}*/
?>