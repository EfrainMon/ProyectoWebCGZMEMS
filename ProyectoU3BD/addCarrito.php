<?php
    session_start();
 // agregar a  carrito
    echo var_dump($_SESSION);
  
    require 'includes/database.php';
    $db = conectarDB();

    if (!$db) {
        die("Algo salió mal".mysqli_connect_error());
    }

    $id_p = $_SESSION["idproducto"];
    $id_u = $_SESSION["idUsuario"];
    $version = $_POST["version"];
    $cantidad= $_POST["cantidad"];

    // Consultar para obtener datos
    

    $consulta = "SELECT * FROM catalogo where id_catalogo = '$id_p'";
    $resultado = mysqli_query($db, $consulta);
    $producto =  mysqli_fetch_assoc($resultado);
    echo var_dump($producto);
     
    $nombre = $producto["nombre_videojuego"];
    $precio = $producto["precio"];
    
    $query = "INSERT INTO `carrito` (`id_catalogo`, `id_usuario`, `nombre`, `version`, `precio`, `cantidad`) 
    VALUES ('$id_p,'$id_u','$nombre,'$version', '$precio', '$cantidad');";

    $resultado = mysqli_query($db, $query);
    echo var_dump($producto);
    echo var_dump($usuario);
    
    header('Location: pagar.php');

    
    

?>

