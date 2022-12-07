<?php
    
    session_start();

    if(isset($_SESSION['nombredeusuario'])) { //Si se tiene sesion activa, devuelve al index
        header('location: index.php');
    }

    $dbhost="localhost";
    $dbname="tienda_gs";
    $dbuser="root";
    $dbpass= "";

    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$connect) {
        die("Algo salió mal, verifica que estén bien tus datos, o si no tienes una cuenta, creala, ¡Es gratis!".mysqli_connect_error());
    }

    $nombre=$_POST["nombre"];
    $contrasena=$_POST["contrasena"];

    $sql = mysqli_query($connect,"SELECT * FROM usuario WHERE nombre = '$nombre' AND contrasena = '$contrasena'");
    $usuario =  mysqli_fetch_assoc($sql);
    $numberRow = mysqli_num_rows($sql);

    if(!isset($_SESSION['nombredeusuario'])) {

    if($numberRow == 1) {
        //echo "<div align=\"center\"><br>¡Bienvenido de vuelta ".$nombre."!</div><br>";
        //include "index.html";
        $_SESSION['nombredeusuario']=$nombre; //AQUÍ SE LE DICE QUE A LA VARIABLE SESION DE NOMBREDEUSUARIO ES EL NOMBRE QUE SAQUE DEL QUERY
        $_SESSION['idUsuario'] = $usuario['id_usuario'];
        //Nuevo
        $_SESSION['telefonodeusuario'] = $usuario['telefono'];
        $_SESSION['correodeusuario'] = $usuario['correo'];
        $_SESSION['direcciondeusuario'] = $usuario['direccion'];
        $_SESSION['ciudaddeusuario'] = $usuario['ciudad'];
        $_SESSION['codpostaldeusuario'] = $usuario['cod_postal'];
        //Nuevo
        header('location: index.php');
    }

    else if($numberRow == 0) {
        
        
        echo "<div align=\"center\"><br>No se encontró la cuenta. Verifica los datos e intenta de nuevo.</div><br>";
        //Nuevo
        // quitar warning ************************+++*********************************+
        include "loginPrincipal.php";
        include "includes/footer.html";
        //Nuevo
    }

}
