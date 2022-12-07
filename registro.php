<?php
    $dbhost="localhost";
    $dbname="tienda_gs";
    $dbuser="root";
    $dbpass= "";

    //$ide=$_POST["ide"];
    //$id_p = $_SESSION["idproducto"];
    //$id_u = $_SESSION["idUsuario"];
    //$version = $_POST["version"];
    //$cantidad= $_POST["cantidad"];

    $nombre=$_POST["nombre"];
    $telefono=$_POST["telefono"];
    $correo=$_POST["correo"];
    $direccion=$_POST["direccion"];
    $ciudad=$_POST["ciudad"];
    $cod_postal=$_POST["cod_postal"];
    $contrasena=$_POST["contrasena"];
    $contrasenaC=$_POST["contrasenaC"];
    


    //Nuevo
    if(($nombre!="") && ($telefono!="") && ($correo!="")  && ($direccion!="") && ($ciudad!="") && ($cod_postal!="") && ($contrasena!="") && ($contrasena==$contrasenaC)) 
    {
        $ide="";
        $sql="INSERT INTO `usuario` (`id_usuario`, `nombre`, `telefono`, `correo`, `contrasena`, `activo`, `fecha_mod`, `direccion`, `ciudad`, `cod_postal`) 
                             VALUES (NULL, '$nombre', '$telefono', '$correo', '$contrasena', 1, CURRENT_DATE,'$direccion','$ciudad','$cod_postal');";
    //Nuevo                         
        $sql2="";
        $conexion=mysqli_connect($dbhost, $dbuser,$dbpass, $dbname) or
        die("Problemas con la conexión");
        mysqli_query($conexion, "SELECT * FROM usuario");
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        echo "<div align=\"center\"><br>¡Usuario Registrado! Ahora puedes loguearte en tu cuenta.</div><br>";
        //echo "<div align=\"center\">Por favor, completa todos los campos.</div><br>"; 
        include "login.php";
    }

    else if (($contrasena!=$contrasenaC)) {
        echo "<div align=\"center\"><br>La contraseña y la confirmación de la contraseña no son las mismas, intenta de nuevo.</div><br>";
        include "registro.php";
    }

    else {
        echo "<div align=\"center\"><br>Ocurrió algun error. Vuelve a intentar registrarte.</div><br>";
        include "registroPrincipal.php";
    }
    
    ?>