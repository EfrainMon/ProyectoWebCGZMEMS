<?php 

require_once 'carrito/carrito.php';
require_once 'carrito/modelo.php';

$idCatal = $_POST['idcatal'];

        

$modelCarrito = new carritoModel();
$modelCarrito->Eliminar($idCatal);
header('Location: pagar.php'); 



?>