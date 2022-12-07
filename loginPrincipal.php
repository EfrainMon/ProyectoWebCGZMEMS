<?php 
 $titulo = " login - Game Shop";

include "includes/header.php" ?>
<body>
    <section>
        <div>
            <h2 class="titulo"> Iniciar Sesion</h2>
        </div>
        <form id="form2" name="form2" method="post" action="login.php" class="formulario">
            <fieldset>


                <div>
                    <div class="campo   reg100">
                        <label> Usuario </label>
                        <input class="input-text" type="text" placeholder="Ingresa tu Nombre" name="nombre" id="nombre">
                    </div><br>


                    <div class="campo  reg100">
                        <label> Contraseña </label>
                        <input type="password" placeholder="Ingresa tu contraseña" name="contrasena" id="contrasena"></textarea>
                    </div><br>


                    <div class="alinearVertHorReg">
                        <input type="submit" value="Iniciar Sesion" onclick="login.php">
                        <p class="titulo"> Si aún no tienes una cuenta puedes registrarte aqui abajo.</p>
                        <a href="registroPrincipal.php" class="botont">Registrarse</a>
                    </div>

                </div>
            </fieldset>
        </form>
    </section>
    <br>
    <!--Apartado Final de contacto-->
    
    
    
    <!--Páginas extras del producto-->
</body>
    <?php include "includes/footer.html" ?>

