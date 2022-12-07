<?php

/* incluimos primeramente el archivo que contiene la clase fpdf */
require 'includes/database.php';
include ('fpdf/fpdf.php');
require_once 'productos/producto.php';
require_once 'productos/modelo.php';

session_start();
$carrito = "                                                                                                                            Tus Productos:"."\n";

$alm = new Producto();
$model = new productoModel(); 



foreach ( $_SESSION["carrito"] as $producto) { 
    $idCatalogo = $producto['id_catalogo'];
    $alm = $model->Obtener($idCatalogo);
    $name = $producto['nombre']?? $producto['nombre_videojuego'] ;//" Nombre: ".
    $price = $producto['precio']; //" Precio: ".
    $cant =  $producto['cantidad']?? $_POST['cantidad']; //" Cantidad: ".
    $alm->__SET('stock',          ($alm->__GET('stock') - $cant));   
    $model->Actualizar($alm);   
    $subtotal = "\n                                                                                                                                                                                                                                               Subtotal: $".$cant*$price;
    $n = 39-strlen($name);
    $carrito .= $name.str_repeat("...",$n)."Precio: "."$".$price."                                                             Cantidad: ".$cant.$subtotal."\n";
}


if(isset($_SESSION['idUsuario'])){
// vaciar carrito
$db = conectarDB();
$idU = $_SESSION["idUsuario"];
$query = "DELETE FROM `carrito` WHERE `id_usuario` = $idU";
mysqli_query($db, $query);
}
//
/* tenemos que generar una instancia de la clase */
class PDF extends FPDF
{
// Cabecera de página. Es como el header de la pagina
function Header()
{
    // Logo
    $this->Image('logoRound.png',165,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(65);
    // Título

    //$this->SetTextColor('52','152','219');

    $this->Cell(60,10,'Tienda Gameshop MX',80,10,'C'); //Ultimos 1,0
    //Largo, ancho del rectangulo, titulo, posicion vert del texto
    // Salto de línea
    $this->Ln(2); //10
    // Movernos a la derecha
    $this->Cell(60);
    $this->SetFont('Arial','B',7);
    $this->SetTextColor('0','0','0');
    $this->Multicell(70,7,'Colonia Centro, C.P 27000, Torreon, Coahuila de Zaragoza'.
                          "\n RFC: GSM011022EM6".
                          "\n Telefono: 555-451-1506".
                          "\n Email: tienda@gameshop.com",1,'C'); //El ultimo centra, "R" es para derecha

}

// Pie de página. Es como el footer de la página
function Footer()
{
    // Posición: a 5.5 cm del final
    $this->SetY(-55);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    //Color del texto Negro
    $this->SetTextColor('0','0','0');
    // Imagen del Codigo QR
    $this->Image('codigoqr.png',165,245,33);
    
    //Texto que simula un código de factura
    $this->Cell(0);
    $this->Write(7,'Sello Digital de la factura:');
    $this->Ln(6);
    $this->Write(7,'g0ZdodX2IIZiVd4DbAZ25CoOPM0e3ZxqF51mLvt9ezXevUe8GnvPmqfH4XPtS8mGDlx60zf41MyeGMUpEMw2m8gP6N');
    $this->Ln(4);
    $this->Write(7,'w1nTZ/6G+1ZXVi+YaH8zvaad63CVL+y77WdgYNF4jYoQPDoLCaA2K4bXq86jInYiWFJL9eN4pEMw2m8gP6NRVwj2d0');
    $this->Ln(4);
    $this->Write(7,'mFVGtyvraKIqYPBEbYbll/8iyxJWBNE+qgM26M5Xh/MI4W82Suhz7CU9WbJgWWoIPp5G5Ixf2ixX2FIaeb1ONJQFJi'); 
    $this->Ln(4);
    $this->Write(7,'UDu6VHFU538wzDRVm8ek1S8thL3DembpNOG0kXitjyE6DdoiGmRAcfLDXxz+XyN4WAiOrO+oANiwcU3xeehvKfj+WS');
    $this->Ln(7);
    $this->Cell(0,10,'Si tienes dudas sobre la factura envianos ',0,0,'L');
    $this->Ln(4);
    $this->Cell(0,10,'un correo a: soporte@gameshop.com.mx ',0,0,'L');
    $this->Ln(7);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}

}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

/* seleccionamos el tipo, estilo y tamaño de la letra a utilizar */


$pdf->Ln(10);

if(isset($_SESSION['idUsuario'])){
$pdf->Cell(22);

$pdf->Cell(0, 0, "Datos del Cliente", 0, 0, 'L');
}
$pdf->Ln(5);

$pdf->SetFont('Arial','B',7);

//Se traen los datos del usuario desde miCuenta.php

//Cambiar el color de los recuadros
//$pdf->SetDrawColor('52','152','219');
if(isset($_SESSION['idUsuario'])){
$pdf->Multicell(80,7," Nombre: ".$_POST['nombredeusuario'].
                   "\n Direccion de entrega: ".$_POST['direcciondeusuario'].
                   "\n Ciudad: ".$_POST['ciudaddeusuario'].
                    //"\n Total: ".$_POST['sumatotaldeusuario']. 
                   "\n C.P: ".$_POST['codpostaldeusuario'],1,'L');

$pdf->Ln(5);
}

$pdf->Multicell(190,7,"                         Descripcion                       |                            Precio                            |                                      Cantidad                                      |        Subtotal (MXN)         ",1,'L');  

$pdf->Ln(5);

$pdf->Multicell(190,7,$carrito,1,'L');  

$pdf->Ln(5);

$pdf->SetFont('Arial','B',12);

$pdf->Multicell(190,7," Total Pagado: $".$_POST['sumatotaldeusuario'].".00 MXN",1,'R');                   

//Esto último es para que se abra un popup y se descargue el pdf
$pdf->Output("Orden De Compra - Gameshop.pdf",'D');

echo "<script language='javascript'>window.open('Orden De Compra - Gameshop.pdf');</script>";//paral archivo pdf generado

exit;

?>