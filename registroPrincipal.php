<?php 
 $titulo = " !Registrate¡ - Game Shop";

include "includes/header.php" ?>
<body>


    <section>
        <div>
            <h2 class="titulo"> Registrarse </h2>
        </div>
        <form id="form1" name="form1" method="post" onsubmit="return valida(this)"  action="registro.php" class="formulario">
            <fieldset>


                <div>
                    <div class="campo   reg100">
                        <label> Nombre </label>
                        <input  class="input-text" type="text" placeholder="Ingresa tu Nombre" name="nombre" id="nombre">
                    </div><br>

                    <div class="campo   reg100">
                        <label> Teléfono </label>
                        <input class="input-text" type="tel" placeholder="Ingresa tu Teléfono" name="telefono" id="telefono">
                    </div><br>

                    <div class="campo   reg100">
                        <label> Correo </label>
                        <input class="input-text" type="email" placeholder="Ingresa tu Email" name="correo" id="correo">
                    </div><br>

                    <div class="campo   reg100">
                        <label> Direccion de entrega </label>
                        <input class="input-text" type="text" placeholder="Ingresa la Direccion de entrega del producto"
                        name="direccion" id="direccion">
                    </div><br>
                <!--Nuevo-->
                    <div class="campo   reg100">
                        <label> Ciudad </label>
                        <input class="input-text" type="text" placeholder="Ingresa la ciudad de entrega."
                        name="ciudad" id="ciudad">
                    </div><br>

                    <div class="campo   reg100">
                        <label> Código Postal </label>
                        <input class="input-text" type="text" placeholder="Ingresa el C.P "
                        name="cod_postal" id="cod_postal">
                    </div><br>
                <!--Nuevo-->    

                    <div class="campo  reg100">
                        <label> Contraseña </label>
                        <input  type="password" placeholder="Ingresa tu contraseña" name="contrasena" id="contrasena"></textarea>
                    </div><br>
                    <div class="campo  reg100">
                        <label> Confirma Contraseña </label>
                        <input type="password" placeholder="Ingresa nuevamente tu contraseña" name="contrasenaC" id="contrasenaC"></textarea>
                    </div><br>


                    <div class="enviar alinearVertHorReg">
                        <input type="submit" value="Registrarse" onclick="registro.php">
                        <p class="titulo"> Si ya tienes una cuenta puedes iniciar sesión aqui abajo. </p>
                        <a href="login.php" class="botont">Iniciar Sesion</a>
                    </div>
                    <br>
                </div>
            </fieldset>
        </form>
    </section>
    <br>

    <script language="javascript"> // Validaciones
    function valida(){
        var nombre = document.getElementById("nombre").value;
        var telefono = document.getElementById("telefono").value;
        var correo = document.getElementById("correo").value;
        var direccion = document.getElementById("direccion").value;
        var ciudad = document.getElementById("ciudad").value;
        var cod_postal = document.getElementById("cod_postal").value;
        var contrasena = document.getElementById("contrasena").value;
        var contrasenaC = document.getElementById("contrasenaC").value;



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
             document.getElementById("nombre").focus();
            return false;
            
        }else if(! numero.test(telefono)) // validacion de telefono
        {
            alert("El telefono no es valido");
             document.getElementById("telefono").focus();
            return false;
            
        }else if(! mail.test(correo)) // validacion de correo
        {
            alert("El correo no es valido");
             document.getElementById("correo").focus();
            return false;
        }else if(direccion.length <= 10) // validacion de direccion
        {
            alert("Es nesesario establecer una direccion");
             document.getElementById("direccion").focus();
            return false;
        
        }else if(! city.test(ciudad)) // validacion de ciudad
        {
            alert("La ciudad no es valida");
            document.getElementById("ciudad").focus();
            return false;
            
        }else if(! codP.test(cod_postal)) // validacion de cod_postal
        {
            alert("La cod_postal no es valido");
            document.getElementById("cod_postal").focus();
            return false;

        }else if(! pass.test(contrasena)) // validacion de contrasena
        {
            alert("La contrasena no es valida  requiere \n Minimo 8 caracteres \n Maximo 15 \n Al menos una letra mayúscula \nAl menos una letra minucula\n Al menos un dígito\n No espacios en blanco\n Al menos 1 caracter especial");
            document.getElementById("contrasena").focus();
            return false;
            
        
        }else if(contrasenaC !== contrasena) // validacion de contrasenaC
        {
            alert("Las contraseñas deben  coincidir ");
            document.getElementById("contrasenaC").focus();
            return false;
            
        }
        else
        {
            alert("Enviado");
            return true;
        }

    }
   
</script>
 
    <!--Páginas extras del producto-->
    
</body>
    <?php include "includes/footer.html" ?>
