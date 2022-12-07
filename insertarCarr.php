<?php
    session_start(); 
    if(isset($_SESSION["idUsuario"])){
    require_once 'productos/producto.php';
    require_once 'productos/modelo.php';
    require_once 'carrito/carrito.php';
    require_once 'carrito/modelo.php';
        
    // Logica
    $product = new Producto();
    $modelProducto = new productoModel();   
    $product = $modelProducto->Obtener($_SESSION["idP"]);

    $carrito = new Carrito();
    $modelCarrito = new carritoModel();

    $carrito->__SET('id_catalogo',  $product->__GET('id_catalogo'));
    $carrito->__SET('id_usuario',   $_SESSION["idUsuario"]);
    $carrito->__SET('nombre',       $product->__GET('nombre_videojuego'));
    $carrito->__SET('version',       $_POST["version"]);
    $carrito->__SET('precio',       $product->__GET('precio'));
    $carrito->__SET('cantidad',     $_POST["cantidad"]);


    $modelCarrito->Registrar($carrito);
    
   ?>
    <script languaje = "JavaScript">
        alert("¡Producto Agregado!");
    </script>
<?php
        
        header('location: pagar.php');
    
    }else{
        echo "<div align=\"center\"><br>¡Algo Salio Mal!.</div><br>";
        header('location: index.php');
    }
    
    

  
    
    ?>
    

    
