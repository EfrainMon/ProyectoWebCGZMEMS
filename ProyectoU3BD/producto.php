<?php
// Base de datos
require 'includes/database.php';
//include "includes/header.php";
session_start();

$db = conectarDB();
$id = $_GET['producto'] ;
$_SESSION["idP"] = $id;

// Consultar para obtener los vendedores
$consulta = "SELECT * FROM catalogo where id_catalogo = $id";


$resultado = mysqli_query($db, $consulta);
$producto =  mysqli_fetch_assoc($resultado);

$titulo = $producto["nombre_videojuego"]." - Game Shop";
include "includes/header.php";


?>



<body>
   
    

    
    <main class="contenedor">
        <h3 class = "centrarTexto"> <?php echo $producto['nombre_videojuego'] ?></h3>
        <div class="nosotros">
            <div>
            <img class="img100 imgProducto" src= <?php echo $producto['imgLink'] ?> alt="Imagen del Producto">
            </div>
            
            <div>
                <p class = "fs15 "><?php echo $producto['descripcion'] ?></p>
            <form class="formCompra" onsubmit="return validar(this)" method="POST"   action=
                <?php echo isset($_SESSION["idUsuario"])? "insertarCarr.php" : "pagar.php"; ?> >
                    <table class = 'carrito'>
                        <tr>
                             <th> Selecione Version</th>
                        </tr>
                        <tr>
                            <td><select class="campo2" id = "version" name = "version" onchange = "cambio(<?php echo $producto['id_catalogo']?>)" >
                                
                                <option disabled selected value= "NA">-- Seleccionar Version --</option>
                                <option <?php echo $producto['version'] == "DIGITAL" ? 'selected' : ''; ?> value= "Digital">Digital</option>
                                <option <?php echo $producto['version'] == "FISICA" ? 'selected' : ''; ?> value= "Fisica">Fisica</option>
                                
                            </select></td>
                        <tr>
                    </table>
                    <table class = 'carrito'>
                        <tr>
                             <th> Selecione Cantidad</th>
                        </tr>
                        <tr>
                            <th>
                                <input class="formulario__campo campo2" type="number" name= "cantidad" id = "cantidad" placeholder="Cantidad" min="1">
                            </th>
                        </tr>
                    </table>
                    <input class="formulario__submit titulo" type="submit" value=
                    <?php echo isset($_SESSION["idUsuario"])? "Agregar&#32Al&#32Carrito" : "Comprar&#32Producto"; ?> onclick = <?php $_SESSION['compra'] = true; ?>>
                    
                
            </form>
             </div>
             <div>
                    <h4 class="centrarTexto"> Precio: <?php echo $producto['precio'] ?>  </h4>
                    <h4 class="centrarTexto"> Versiones  <?php echo $producto['version'] ?> disponibles : <?php echo $producto['stock'] ?> </h4>
                    <input type="hidden" value="<?php echo $producto['stock']?>" name="stock" id="stock">
                    <input type="hidden" value="<?php echo $producto['id_catalogo']?>" name="id_catalogo" id="id_catalogo">


                </div>
            </div>
    </main>
   
    </div>
    

    <script language="javascript"> // Validaciones

    function cambio(idCat){
        var version = document.getElementById("version").value;
        idCat = parseInt(idCat);

        //alert(idCat+" "+version);
        if(version == "Digital" && idCat%2 == 0 )
            idCat = idCat-1;
        else if(version == "Fisica" && idCat%2 != 0 )
        {
            idCat = idCat+1;
            document.getElementById("version").value = "Fisica";

        }
        
        //alert(idCat+" "+version);
        window.location.href = "https://gameshoppw.000webhostapp.com/ProyectoU3BD/producto.php?producto="+idCat;
    }
    function validar(){
        
              
       
        var cantidad = parseInt(document.getElementById("cantidad").value);
        var stock = parseInt(document.getElementById("stock").value); //$_SESSION['stock'];
        
        cant = /^[\d]{1,2}$/;
        
        if(document.getElementById("version").selectedIndex==0){
                alert("debe selecionar la version del juego.");
                    document.getElementById("version").focus();
                    return false;
         //validacion del cantidad      
        }else if(! cant.test(cantidad))
        {
            alert("La cantidad no es valida");
            document.getElementById("cantidad").focus();
            return false;
            
        }else if(stock < cantidad){
            alert("No hay suficiente stock disponible por favor elija otra cantidad o espere a que repongamos stock \n !Gracias por su comprencion¡");
            document.getElementById("cantidad").focus();
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

<?php  include "includes/footer.html" ?>

