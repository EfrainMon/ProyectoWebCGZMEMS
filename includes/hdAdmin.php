<?php 
    
    session_start();
    if(!isset($_SESSION['nombredeusuario'])) {
        $ref = "loginPrincipal.php";
        $nombreCuenta = "Registrarse o Iniciar Sesión";
    } else {
        $ref = "pagar.php";
        $nombreCuenta = $_SESSION['nombredeusuario'];
    }
    //Nuevo
    if(isset($_POST['btncerrar'])) {
        session_destroy();
        header('location: index.php');
        
     }
    //Nuevo 
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!--Precargar-->
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preload" href="css/stylesAdmim.css" as="style">
    <!--Tipografía-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">
    <!--Llamar a styles para que se apliquen los cambios-->
    <link href="css/styles.css" rel="stylesheet">
    

  <!--Registro-->
  <nav class="nav-prin-reg">
    <!--<a href="Registro.php"> ¿Usuario Nuevo? (Registrarse) </a>-->
    <a href= <?php echo htmlspecialchars($ref) ?>> <?php echo htmlspecialchars($nombreCuenta) ?> &#32&#32&#32</a>
    <?php
        if(isset($_SESSION['nombredeusuario'])) { ?>

    <!--Nuevo-->
        <!--<a href=  "cerrarsesion.php">  /  (Cerrar Sesion) </a>-->
    <form method="POST"><br>
    <input type="submit" value= "Cerrar Sesion" name="btncerrar" class ="formulario__submit" />
    </form>            
    <?php   } ?>

    <!--Nuevo-->


</nav>
<a href="index.php" class="imagenLogo"> </a>

<!--Nombre de la Tienda-->
<nav>
    <img src="gameshopLogoHor.png" alt="LogoGameShop" class="centrarLogo">
</nav>

<!--Botones de NavPegación-->
<div class="nav-bg">
    <nav class="navegacion-principal contenedor">
        <a href="index.php"> Inicio </a>
        <a href="catalogo.php"> Catálogo </a>
        <!--Nuevo-->
        <a href="miCuenta.php"> Mi cuenta </a>
        <!--Nuevo-->
        <a href="pagar.php"> Mi carrito </a>
        <a href="Quienes Somos.php"> Quienes Somos </a>
        <a href="index.php #contacto"> Contacto </a>
    </nav>
    <!--Botones de Navegación-->
</div>
</head>