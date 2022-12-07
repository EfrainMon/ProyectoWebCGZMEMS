
<?php
include "includes/hdAdmin.php";


 if(  $_SESSION["idUsuario"] == 0):
 
require_once 'productos/producto.php';
require_once 'productos/modelo.php';

 
// Logica
$alm = new Producto();
$model = new productoModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('id_catalogo',               $_REQUEST['id_catalogo']);
			$alm->__SET('nombre_videojuego',         $_REQUEST['nombre_videojuego']);
			$alm->__SET('version',                   $_REQUEST['version']);
			$alm->__SET('precio',                    $_REQUEST['precio']);
			$alm->__SET('stock',                     $_REQUEST['stock']);
            $alm->__SET('imgLink',                   $_REQUEST['imgLink']);
            $alm->__SET('descripcion',               $_REQUEST['descripcion']);

			$model->Actualizar($alm);
			echo "<script>location.href='adminProductos.php';</script>";
             die();
			//header('Location: adminProductos.php');
			break;

		case 'registrar':
			$alm->__SET('nombre_videojuego',         $_REQUEST['nombre_videojuego']);
			$alm->__SET('version',                   $_REQUEST['version']);
			$alm->__SET('precio',                    $_REQUEST['precio']);
			$alm->__SET('stock',                     $_REQUEST['stock']);
            $alm->__SET('imgLink',                   $_REQUEST['imgLink']);
            $alm->__SET('descripcion',               $_REQUEST['descripcion']);

			$model->Registrar($alm);
			echo "<script>location.href='adminProductos.php';</script>";
             die();
			//header('Location: adminProductos.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['id_catalogo']);
			echo "<script>location.href='adminProductos.php';</script>";
             die();
			//header('Location: adminProductos.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['id_catalogo']);
			break;
	}
}

?>

<!--<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>  -->
    <body style="padding:15px;">

        <div  style="overflow-x: auto;" class = "centrarTextoNos ">
            <div class="pure-u-1-12">
                
                <form onsubmit="return valida(this)" action="?action=<?php echo $alm->id_catalogo > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="id_catalogo" value="<?php echo $alm->__GET('id_catalogo'); ?>" />
                    
                    
                    <table class="pure-table pure-table-horizontal" style="width:500px;">
                        <tr>
                            <th style="text-align:left;">nombre_videojuego</th>
                            <td><input type="text" name="nombre_videojuego"  id="nombre" value="<?php echo $alm->__GET('nombre_videojuego'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">precio</th>
                            <td><input type="number" name="precio" id="precio" value="<?php echo $alm->__GET('precio'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">version</th>
                            <td>
                                <select name="version" id="version" style="width:100%;">

                                    <option value="FISICA" <?php echo $alm->__GET('version') == "FISICA" ? 'selected' : ''; ?>>Fisica</option>
                                    <option value= "DIGITAL" <?php echo $alm->__GET('version') == "DIGITAL" ? 'selected' : ''; ?>>Digital</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">stock</th>
                            <td><input type="number" name="stock" id="stock" value="<?php echo $alm->__GET('stock'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Imagen Link</th>
                            <td><input type="text" name="imgLink" id="imgLink" value="<?php echo $alm->__GET('imgLink'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">descripcion</th>
                            <td><textarea id="descripcion" name="descripcion" rows="4" cols="50" ><?php echo $alm->__GET('descripcion'); ?></textarea></td>
                            <!--<td><input type="text" name="descripcion" value="<?php // echo $alm->__GET('descripcion'); ?>" style="width:100%;" /></td> -->
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="formulario__submit">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal carrito">
                    <thead>
                        <tr>
                            <th style="text-align:left;">nombre_videojuego</th>
                            <th style="text-align:left;">version</th>
                            <th style="text-align:left;">precio</th>
                            <th style="text-align:left;">stock</th>
                            <th style="text-align:left;">Imagen</th>
                            <th style="text-align:left;">descripcion</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('nombre_videojuego'); ?></td>
                            <td><?php echo $r->__GET('version'); ?></td>
                            <td><?php echo $r->__GET('precio'); ?></td>
                            <td><?php echo $r->__GET('stock');  ?></td>
                            <?php $a = str_split($r->__GET('imgLink'), 15); // explode("/", $r->__GET('imgLink')); ?>
                            <td><?php foreach($a as $a): echo $a."<br>"; endforeach; ?></td>
                            <td><?php echo $r->__GET('descripcion');  ?></td>
                            <td>
                                <a href="?action=editar&id_catalogo=<?php echo $r->id_catalogo; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id_catalogo=<?php echo $r->id_catalogo; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>
        <script language="javascript"> // Validaciones
    function valida(){
         
        var nombre = document.getElementById("nombre").value;
        var precio = document.getElementById("precio").value;
       
        var stock = document.getElementById("stock").value;
        var imgLink = document.getElementById("imgLink").value;
        var descripcion = document.getElementById("descripcion").value;
        
        
        

        varia = /^\d+\d$/;
        numero = /^[\d]{1,6}$/;
        
        
         //validacion del nombre      
        if(nombre.length <= 0)
        {
            alert("El nombre esta vacio");
             document.getElementById("nombre").focus();
            return false;
            
        }else if(! numero.test(precio)) // validacion de precio
        {
            alert("El precio no es valido");
             document.getElementById("precio").focus();
            return false;
            
        }else if(! numero.test(stock)) // validacion de stock
        {
            alert("El stock no es valido");
             document.getElementById("stock").focus();
            return false;
        }else if(imgLink.length <= 0) // validacion de imgLink
        {
            alert("Es nesesario establecer una imgLink");
             document.getElementById("imgLink").focus();
            return false;
        
        }else if(descripcion.length <= 0) // validacion de descripcion
        {
            alert("La descripcion no es valida");
            document.getElementById("descripcion").focus();
            return false;
            
        }
        else
        {
            alert("Enviado");
            return true;
        }

    }
   
</script>

    </body>
    <?php include "includes/footer.html" ;

else:
    
    echo "<script>location.href='index.php';</script>";
             die();
		
    //header('location: index.php');
endif;
?>