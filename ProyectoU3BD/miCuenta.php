<?php 
 $titulo = "Cuenta - Game Shop";
 include "includes/header.php" ?>

<?php 

if(!isset($_SESSION['nombredeusuario'])) {
    //Nuevo
    header('location: loginPrincipal.php');
    //Nuevo
} else {
        $nombreCuenta = $_SESSION['nombredeusuario'];
        $telefonoCuenta = $_SESSION['telefonodeusuario'];
        $correoCuenta = $_SESSION['correodeusuario'];
        $direccionCuenta = $_SESSION['direcciondeusuario'];
        $ciudadCuenta = $_SESSION['ciudaddeusuario'];
        $codpostalCuenta = $_SESSION['codpostaldeusuario'];
        $idusuarioCuenta = $_SESSION['idUsuario'];
       }

?>
    <!--Llamar a styles para que se apliquen los cambios
    <link href="css/styles.css" rel="stylesheet">-->
<body>

<section>
        <div>
            <h2 class="titulo"> Bienvenido a tu cuenta, ¿necesitas ver tus datos o modificarlos? ¡Puedes hacerlo aquí! </h2>
        </div>
        <form id="form1" name="form1" method="post" onsubmit="return valida(this)" action="modDatosUser.php" class="formulario">
            <fieldset>

                <div>
                    <div class="campo   reg100">
                        <label> Nombre </label>
                        <input class="input-text" type="text" placeholder="Ingresa tu Nombre" value="<?php echo htmlspecialchars($nombreCuenta) ?>" name="nombreMod" id="nombreMod">
                    </div><br>

                    <div class="campo   reg100">
                        <label> Teléfono </label>
                        <input class="input-text" type="tel" placeholder="Ingresa tu Teléfono" value="<?php echo htmlspecialchars($telefonoCuenta) ?>" name="telefonoMod" id="telefonoMod">
                    </div><br>

                    <div class="campo   reg100">
                        <label> Correo </label>
                        <input class="input-text" type="email" placeholder="Ingresa tu Email" value="<?php echo htmlspecialchars($correoCuenta) ?>" name="correoMod" id="correoMod">
                    </div><br>

                    <div class="campo   reg100">
                        <label> Direcion de entrega </label>
                        <input class="input-text" type="text" placeholder="Ingresa la Direcion de entrega del producto"
                         value="<?php echo htmlspecialchars($direccionCuenta) ?>" name="direccionMod" id="direccionMod">
                    </div><br>

                    <div class="campo   reg100">
                        <label> Ciudad </label>
                        <input class="input-text" type="text" placeholder="Ingresa la ciudad de entrega."
                         value="<?php echo htmlspecialchars($ciudadCuenta) ?>" name="ciudadMod" id="ciudadMod">
                    </div><br>

                    <div class="campo   reg100">
                        <label> Código Postal </label>
                        <input class="input-text" type="text" placeholder="Ingresa el C.P "
                        value="<?php echo htmlspecialchars($codpostalCuenta) ?>" name="cod_postalMod" id="cod_postalMod">
                    </div><br>

                    <div class="campo  reg100">
                        <label> Contraseña </label>
                        <input type="password" placeholder="Ingresa tu nueva contraseña" value="" name="contrasenaMod" id="contrasenaMod"></textarea>
                    </div><br>
                    <div class="campo  reg100">
                        <label> Confirma Contraseña </label>
                        <input type="password" placeholder="Confirma tu nueva contraseña" value="" name="contrasenaCMod" id="contrasenaCMod"></textarea>
                    </div><br>

                    <!--Se crea un type hidden para guardar el id del usuario pero que no se pueda ver ni modificar. Se usa para
                        que php conozca el id del usuario y hacer querys con él.-->
                    <input type="hidden" value="<?php echo htmlspecialchars($idusuarioCuenta) ?>" name="idUsuario" id="idUsuario">


                    <div class="enviar alinearVertHorReg">
                        <input type="submit" value="Modificar mis datos" onclick="modDatosUser.php">
                    </div>
                    <br>
                </div>
            </fieldset>
        </form>
    </section>


    <script language="javascript"> // Validaciones
    function valida(){
        var nombre = document.getElementById("nombreMod").value;
        var telefono = document.getElementById("telefonoMod").value;
        var correo = document.getElementById("correoMod").value;
        var direccion = document.getElementById("direccionMod").value;
        var ciudad = document.getElementById("ciudadMod").value;
        var cod_postal = document.getElementById("cod_postalMod").value;
        var contrasena = document.getElementById("contrasenaMod").value;
        var contrasenaC = document.getElementById("contrasenaCMod").value;



        varia = /^\d+\d$/;
        nomb = /^[a-zñA-ZÑ]{3,20}[\s]{1,2}[a-zñA-ZÑ]{3,20}[\s]{0,2}[a-zñA-ZÑ]{0,20}[\s]{0,2}[a-zñA-ZÑ]{0,20}$/;
        numero = /^[\d]{10}$/;
        mail = /^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,63}$/;
         ///^[a-zñA-ZÑ]{3,20}[@][a-zñA-ZÑ]{3,10}[.][a-zñA-ZÑ]{2,10}$/;
        city = /^[a-zñA-ZÑ]{2,20}[\s]{0,2}[a-zñA-ZÑ]{0,20}[\s]{0,2}[a-zñA-ZÑ]{0,20}[\s]{0,2}[a-zñA-ZÑ]{0,20}$/;
        codP = /^[\d]{4,6}$/;
        pass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&=])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/; //contraseña ********
        
        
         //validacion del nombre      
        if(! nomb.test(nombre))
        {
            alert("El nombre no es valido");
             document.getElementById("nombreMod").focus();
            return false;
            
        }   else if(! numero.test(telefono)) // validacion de telefono
        {
            alert("El telefono no es valido");
             document.getElementById("telefonoMod").focus();
            return false;
            
        }else if(! mail.test(correo)) // validacion de correo
        {
            alert("El correo no es valido");
             document.getElementById("correoMod").focus();
            return false;
        }else if(direccion.length <= 10) // validacion de direccion
        {
            alert("Es nesesario establecer una direccion");
             document.getElementById("direccionMod").focus();
            return false;
        
        }else if(! city.test(ciudad)) // validacion de ciudad
        {
            alert("La ciudad no es valida");
            document.getElementById("ciudadMod").focus();
            return false;
            
        }else if(! codP.test(cod_postal)) // validacion de cod_postal
        {
            alert("La cod_postal no es valido");
            document.getElementById("cod_postalMod").focus();
            return false;

        }else if(! pass.test(contrasena)) // validacion de contrasena
        {
            alert("La contrasena no es valida  requiere \n Minimo 8 caracteres \n Maximo 15 \n Al menos una letra mayúscula \nAl menos una letra minucula\n Al menos un dígito\n No espacios en blanco\n Al menos 1 caracter especial");
            document.getElementById("contrasenaMod").focus();
            return false;
            
        
        }else if(contrasenaC !== contrasena) // validacion de contrasenaC
        {
            alert("Las contraseñas deben  coincidir ");
            document.getElementById("contrasenaCMod").focus();
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


<?php include "includes/footer.html" ?>