<?php
 // Base de datos
 $titulo = "Carrito - Game Shop";

require 'includes/database.php';
include "includes/header.php";
require_once 'carrito/carrito.php';
require_once 'carrito/modelo.php';



 $db = conectarDB();
 $_SESSION["carrito"] = array();

 if(isset( $_SESSION["idUsuario"])  &&  $_SESSION["idUsuario"]==0){
    header('location: adminProductos.php');
}else if(isset( $_SESSION["idUsuario"])){
    $idU = $_SESSION["idUsuario"];

    //NUEVO
    $nombreCuenta = $_SESSION['nombredeusuario'];
    $telefonoCuenta = $_SESSION['telefonodeusuario'];
    $correoCuenta = $_SESSION['correodeusuario'];
    $direccionCuenta = $_SESSION['direcciondeusuario'];
    $ciudadCuenta = $_SESSION['ciudaddeusuario'];
    $codpostalCuenta = $_SESSION['codpostaldeusuario'];
    $idusuarioCuenta = $_SESSION['idUsuario'];
     
    
    //NUEVO

     // Consultar para obtener los productos del carrito del usuario
    $consulta = "SELECT * FROM carrito where id_usuario = $idU";
    } else{
        if($_SESSION['compra']){
            $idP= $_SESSION["idP"];
            $version = $_POST["version"];
            $cantidad= $_POST["cantidad"];

            // Consultar para obtener los datos del producto
            $consulta = "SELECT * FROM catalogo where id_catalogo = $idP";
            $_SESSION['compra'] = false;
        }else{
            header('location: loginPrincipal.php');
            
                       
        }
    }

 $resultado = mysqli_query($db, $consulta);
 


   
?>

 

<body>
    

    <div   style="overflow-x: auto;" class = "centrarTextoNos pagar ">
        <table class = "carrito">
            <tr>
              <th>Productos</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Total</th>
              <th>Eliminar<th>
            </tr>

            <?php $suma = 0 ; $sumaTotal = 0; ?>
           
            

            <?php while($producto = mysqli_fetch_assoc($resultado)):?>
                <?php array_push( $_SESSION["carrito"], $producto );?>
              <tr>
                <td><?php echo $producto['nombre']?? $producto['nombre_videojuego']; ?>  </td>
                <td><?php echo "$".$producto['precio']; ?></td>
                <td><!--<input  class="formulario__campo campo2" type="number" 
                name= "cantidad" name ="cantidad"  
                 value =--> <?php echo $producto['cantidad']?? $cantidad; ?> <!-- min="1" action = "pagar.php"> --></td>
                <?php $cantidad = $producto['cantidad']?? $cantidad;
                 $suma = $cantidad*$producto['precio'];  
                $sumaTotal += $suma; ?>
                <td><?php  echo "$".$suma; ?></td>
                <td> 
                 
                  <input type="button" value="Borrar" onclick="del(<?php echo($producto['id_catalogo']);?>)"> 
                  
                </td>
              </tr>
                
            <?php endwhile; ?>
            
           

        </table>

        <table class = "carrito">
            <tr>
              <th> Total a Pagar</th>
              <th>Maneras de Pagar</th>
            </tr>
            <tr>
                <td ><?php echo "$".$sumaTotal.".00 MXN";?></td>

                <td> <script src="https://www.paypal.com/sdk/js?client-id=Aac9h5VIcjh6D4MXK9kZZMFrgrDV5plAhC3ehOevHazn7zGgVZJADxL9Dr90ZFzvkJPjdJXxe8IgW4YV&currency=USD"></script>
                     <div id="paypal-button-container"></div> </td>
            </tr>
          
        </table>
        
    </div>
    
    <!--NUEVO-->
    <!--Se crean variables hidden que guardan los datos del usuario para usarse en el PHP del PDF-->
    <form name='pdf' method='post' action='reciboPDF.php'><br>
    <input type="submit"  style="display: none;" value= "Pagar Prueba" name="generarRecibo" id ="generarRecibo" class ="formulario__submit" />
    <input type="hidden" value="<?php echo htmlspecialchars($nombreCuenta) ?>" name="nombredeusuario" id="nombredeusuario">
    <input type="hidden" value="<?php echo htmlspecialchars($telefonoCuenta) ?>" name="telefonodeusuario" id="telefonodeusuario">
    <input type="hidden" value="<?php echo htmlspecialchars($CorreoCuenta) ?>" name="correodeusuario" id="correodeusuario">
    <input type="hidden" value="<?php echo htmlspecialchars($direccionCuenta) ?>" name="direcciondeusuario" id="direcciondeusuario">
    <input type="hidden" value="<?php echo htmlspecialchars($ciudadCuenta) ?>" name="ciudaddeusuario" id="ciudaddeusuario">
    <input type="hidden" value="<?php echo htmlspecialchars($codpostalCuenta) ?>" name="codpostaldeusuario" id="codpostaldeusuario">
    <input type="hidden" value="<?php echo htmlspecialchars($codpostalCuenta) ?>" name="codpostaldeusuario" id="codpostaldeusuario">
    <input type="hidden" value="<?php echo htmlspecialchars($cantidad) ?>" name="cantidad" id="cantidad">

    


    <input type="hidden" value="<?php echo htmlspecialchars($sumaTotal) ?>" name="sumatotaldeusuario" id="sumatotaldeusuario">
    </form>

    <form method='post' action='eliminarCarr.php'>
      <input type="hidden"  name="idcatal" id="idcatal">
      <input type="submit"  style="display: none;" name="del" id ="del"  />

    </form>

    <!--NUEVO-->
     
    <script>
      paypal.Buttons({

        style:{
          color: 'silver',
          shape: 'pill',
          label: 'pay'
        },

        
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value:  '<?php echo $sumaTotal ?>'// Can also reference a variable or function
              }
            }]
          });
        },
        onCancel: function(data){
          alert("Cancelado");
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            //alert(`  !Gracias por su  compra¡\n Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            document.getElementById("generarRecibo").click();
            // When ready to go live, remove the alert and show a success message within this page. For example:
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '<h3>Gracias por su compra!</h3>'; //Thank you for your payment 
            
          });
        }
      }).render('#paypal-button-container');
    </script>

    <script>
     function del(idCatal)
     {
        alert("Se eliminara el producto de tu carrito");
        document.getElementById("idcatal").value = idCatal;
        document.getElementById("del").click();

        
        return 0;
     }
    </script>
</body>


<?php include "includes/footer.html"?>

