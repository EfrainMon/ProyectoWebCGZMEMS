<?php
    $dbhost="localhost";
    $dbname="tienda_gs";
    $dbuser="root";
    $dbpass= "";

    $nombreMod=$_POST["nombreMod"];
    $telefonoMod=$_POST["telefonoMod"];
    $correoMod=$_POST["correoMod"];
    $direccionMod=$_POST["direccionMod"];
    $ciudadMod=$_POST["ciudadMod"];
    $cod_postalMod=$_POST["cod_postalMod"];
    $contrasenaMod=$_POST["contrasenaMod"];
    $contrasenaCMod=$_POST["contrasenaCMod"];

    $idusuario=$_POST["idUsuario"];
    
    if(($nombreMod!="") && ($telefonoMod!="") && ($correoMod!="")  && ($direccionMod!="") && ($ciudadMod!="") && ($cod_postalMod!="") && ($contrasenaMod!="") && ($contrasenaMod==$contrasenaCMod)) 
    {
        $ide="";
        $sql="UPDATE `usuario` SET `nombre` = '$nombreMod', `telefono` = '$telefonoMod', `correo` = '$correoMod',
         `contrasena` = '$contrasenaMod', `fecha_mod` = CURRENT_DATE, `direccion` = '$direccionMod', `ciudad` = ' $ciudadMod', `cod_postal` = '$cod_postalMod' 
         WHERE `usuario`.`id_usuario` = '$idusuario'; ";                      
        $sql2="";
        $conexion=mysqli_connect($dbhost, $dbuser,$dbpass, $dbname) or
        die("Problemas con la conexión");
        mysqli_query($conexion, "SELECT * FROM usuario");
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        echo "<div align=\"center\"><br>¡Modificaste tus datos!</div><br>";
        //echo "<div align=\"center\">Por favor, completa todos los campos.</div><br>"; 
        include "miCuenta.php";
    }

    else if (($contrasenaMod == "" && $contrasenaCMod == "")) {
        $ide="";
        $sql="UPDATE `usuario` SET `nombre` = '$nombreMod', `telefono` = '$telefonoMod', `correo` = '$correoMod',
        `fecha_mod` = CURRENT_DATE, `direccion` = '$direccionMod', `ciudad` = ' $ciudadMod', `cod_postal` = '$cod_postalMod' 
         WHERE `usuario`.`id_usuario` = $idusuario; ";                       
        $sql2="";
        $conexion=mysqli_connect($dbhost, $dbuser,$dbpass, $dbname) or
        die("Problemas con la conexión");
        mysqli_query($conexion, "SELECT * FROM usuario");
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        echo "<div align=\"center\"><br>¡Modificaste tus datos!</div><br>";
        include "index.php";
    }

    else {
        echo "<div align=\"center\"><br>Ocurrió algun error. Vuelve a intentar registrarte.</div><br>";
        include "miCuenta.php";
    }
    
    ?>