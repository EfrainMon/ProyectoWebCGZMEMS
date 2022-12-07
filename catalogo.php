<?php 
$titulo = "Catalogo - GameShop";
include "includes/header.php" ;
?>

<body>

    <h1 class="centrarTexto"> Catálogo </h1>

    <!--Banner con fondo de imagen sobre videojuegos y texto-->

    <!--<section class="imagenBannerOferta">
        <div class="sombreadoBanner alinearVertHor centrarTexto">
            <h1> Tenemos montones de ofertas para tu consola
                preferida! Consulta más abajo. </h1>
            <h2>
                Con ofertas de hasta el 90%, sí, hasta el 90%
                de descuento.
            </h2>
        </div>

    </section>
    -->
    
    <!--20 NOV JAVASCRIPT BANNER-->

    <div class="slideshow">
        <ul class="slider">
            <li>
                <img src="img/banners/bannerSecundario1.png" alt="">
                <section class="caption">
                    <h1> Tenemos montones de ofertas para tu consola
                         preferida! </h1>
                    <p>  Consulta más abajo. </p>
                </section>
            </li>

            <li>
                <img src="img/banners/bannerSecundario2.png" alt="">
                <section class="caption">
                    <h1> ¡Los nuevos juegos de Nintendo ya están aquí! </h1>
                    <p>  Pokémon Escarlata/Purpura y Mario + Rabidds: Sparks of Hope ya disponibles. </p>
                </section>
            </li>

            <li>
                <img src="img/banners/bannerSecundario3.png" alt="">
                <section class="caption">
                    <h1> ¡La temporada 2 Lone Wolves ha llegado! </h1>
                    <p>  ¡Compra Halo Infinite a un precio espectacular y obtendrás
                         el Pase de batalla de la temporada 2 totalmente gratis!  </p>
                </section>
            </li>

            <li>
                <img src="img/banners/bannerSecundario4.png" alt="">
                <section class="caption">
                    <h1> Conoce la continuación del gran aclamado juego The Last Of Us ahora. </h1>
                    <p>  Después de 7 años, la parte II de The Last Of Us ya está aquí, ¡Cómpralo ahora!  </p>
                </section>
            </li>

            <li>
                <img src="img/banners/bannerSecundario5.png" alt="">
                <section class="caption">
                    <h1> ¡Ahora con hasta 319 bloques de altura! </h1>
                    <p>  Disfruta de la última actualización de Minecraft: Caves & Cliffs
                        parte 2, comprándola aquí.  </p>
                </section>
            </li>
        </ul>

        <ol class="pagination">
            
        </ol>

        <div class="left">
            <span class="fa fa-chevron-left"></span>
        </div>

        <div class="right">
            <span class="fa fa-chevron-right"></span>
        </div>

    </div>        

    <!--20 NOV JAVASCRIPT BANNER-->

    <!--Banner con fondo de imagen sobre videojuegos y texto-->

    <!--SCRIPT 2, Parpadeo del texto para que se llame la atención del usuario-->
    
    <script>
    window.setInterval (BlinkIt, 500);
    var color = "#8d3e3e";
    function BlinkIt () {
    var blink = document.getElementById ("blink");
    color = (color == "#ffffff")? "#8d3e3e" : "#ffffff";
    blink.style.color = color;
    blink.style.fontSize='3.2rem';}
    </script>

    <!--SCRIPT 2, Parpadeo del texto para que se llame la atención del usuario-->
    
    <!--SCRIPT 1, Cuenta regresiva para próximas ofertas-->
        
        <div class="divCountdown">
        <h2 class="centrarTexto" id="blink"> ¡Atento! Nuestras próximas ofertas llegaran en: <h2>
        <p class="centrarTexto" id="TOfertas"></p>
        </div>

    <script>
    // Colocar la fecha a la que vamos a contar
    var countDownDate = new Date("Dec 23, 2022 00:00:00").getTime();

    // Actualizar el contador cada segundo
    var x = setInterval(function() {

    // Obtener la fecha y hora actual
    var now = new Date().getTime();
        
    // Colocar el tiempo entre la fecha actual y a la que se va a llegar
    var distance = countDownDate - now;
        
    // Calcular los días, horas, minutos, segundos..
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
    // Mostrar el resultado con los que tengan el id="TOfertas"
    document.getElementById("TOfertas").innerHTML = days + " Días " + hours + " Horas "
    + minutes + " Min y " + seconds + " Seg. ";
        
    // Poner texto cuando llegue ese tiempo
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("TOfertas").innerHTML = "¡Checa Nuestras nuevas Ofertas de Navidad!";
    }
    }, 1000);
    </script>

    <!--SCRIPT 1, Cuenta regresiva para próximas ofertas-->


    <section class="titulo">
        <h2> Puedes consultar las categorías de consolas más abajo </h2>
    </section>

    <div class="gridBannersCatalogo">
        <section class="imgCatNintendo alinearVertHor">
            <a href="#nintendo">
                <h1> Nintendo </h1>
            </a>
        </section>

        <section class="imgCatXbox alinearVertHor">
            <a href="#xbox">
                <h1> XBOX </h1>
            </a>
        </section>

        <section class="imgCatPlayStation alinearVertHor">
            <a href="#playstation">
                <h1> PlayStation </h1>
            </a>
        </section>

        <section class="imgCatPC alinearVertHor">
            <a href="#PC">
                <h1> PC </h1>
            </a>
        </section>
    </div>

    <!-- PARTE DE GRID DE JUEGOS DE NINTENDO -->

    <!-- Se agregaron colores a los fondos de los section 21 Nov 22 -->

    <section class="colorFonNint">

        <div class="centrarTexto">
            <a name="nintendo">
                <h1 class="colorNint"> Nintendo </h1>
            </a>
        </div>

        <div class="gridNintendoCatalogo">

            <section class="smashbrosLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=2" >
                    <h3> Super Smash Bros Ultimate </h3>
                    <h4> Precio: $1199</h4>
                </a>
            </section>

            <section class="tlozbotwLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=4">
                    <h3> The Legend Of Zelda: <br> Breath of The Wild </h3>
                    <h4> Precio: $1199</h4>
                </a>
            </section>

            <section class="mariopartyLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=6">
                    <h3> Super Mario Party </h3>
                    <h4> Precio: $1099</h4>
                </a>
            </section>

            <section class="persona5Logo alinearVertHor centrarTexto">
                <a href="producto.php?producto=8">
                    <h3> Persona 5 </h3>
                    <h4> Precio: $799</h4>
                </a>
            </section>

            <section class="pokemonLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=10">
                    <h3> Pokemon Escarlata/Púrpura </h3>
                    <h4> Precio: $1299</h4>
                </a>
            </section>

            <section class="marioodysseyLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=12">
                    <h3> Super Mario Oddysey </h3>
                    <h4> Precio: $1199</h4>
                </a>
            </section>

        </div>

    </section>

    <!-- PARTE DE GRID DE JUEGOS DE XBOX -->

    <section class="colorFonXBOX">

        <div class="centrarTexto">
            <a name="xbox">
                <h1 class="colorXbox"> Xbox </h1>
            </a>
        </div>

        <div class="gridXBOXCatalogo">

            <section class="haloinfiniteLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=14">
                    <h3> Halo Infinite </h3>
                    <h4> Precio: $999</h4>
                </a>
            </section>

            <section class="forzahorizon5Logo alinearVertHor centrarTexto">
                <a href="producto.php?producto=16">
                    <h3> Forza Horizon 5 </h3>
                    <h4> Precio: $799</h4>
                </a>
            </section>

            <section class="codmw2Logo alinearVertHor centrarTexto">
                <a href="producto.php?producto=18">
                    <h3> Call Of Duty: Modern Warfare 2 (2022)</h3>
                    <h4> Precio: $1299</h4>
                </a>
            </section>

            <section class="oriLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=20" onclick="">
                    <h3> Ori and the Will of the Wisps </h3>
                    <h4> Precio: $299</h4>
                </a>
            </section>

        </div>

    </section>

    <!-- PARTE DE GRID DE JUEGOS DE PLAYSTATION -->

    <section class="colorFonPS">

        <div class="centrarTexto">
            <a name="playstation">
                <h1 class="colorPS"> PlayStation </h1>
            </a>
        </div>

        <div class="gridPSCatalogo">

            <section class="horizonfwLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=22">
                    <h3> Horizon: Forbidden West </h3>
                    <h4> Precio: $1099</h4>
                </a>
            </section>

            <section class="gowragnarokLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=24">
                    <h3> God of War: Ragnarok </h3>
                    <h4> Precio: $1299</h4>
                </a>
            </section>

            <section class="spidermanLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=26">
                    <h3> Spider Man: Miles Morales </h3>
                    <h4> Precio: $1099</h4>
                </a>
            </section>

            <section class="tlou2Logo alinearVertHor centrarTexto">
                <a href="producto.php?producto=28">
                    <h3> The Last Of Us 2 </h3>
                    <h4> Precio: $1299</h4>
                </a>
            </section>

            <section class="ratchetLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=30">
                    <h3> Ratchet & Clank: Rift Apart </h3>
                    <h4> Precio: $1099</h4>
                </a>
            </section>

            <section class="detroitbhLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=32">
                    <h3> Detroit: Become Human </h3>
                    <h4> Precio: $399</h4>
                </a>
            </section>

        </div>

    </section>

    <!-- PARTE DE GRID DE JUEGOS DE PC -->

    <section class="colorFonPC">

        <div class="centrarTexto">
            <a name="PC">
                <h1 class="colorPC"> PC </h1>
            </a>
        </div>

        <div class="gridPCCatalogo">

            <section class="minecraftLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=34">
                    <h3> Minecraft for Windows </h3>
                    <h4> Precio: $299</h4>
                </a>
            </section>

            <section class="etgLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=36">
                    <h3> Enter The Gungeon </h3>
                    <h4> Precio: $99</h4>
                </a>
            </section>

            <section class="inscryptionLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=38">
                    <h3> Inscryption </h3>
                    <h4> Precio: $109</h4>
                </a>
            </section>

            <section class="tboirLogo alinearVertHor centrarTexto">
                <a href="producto.php?producto=40">
                    <h3> The Binding Of Isaac: Repentance </h3>
                    <h4> Precio: $259</h4>
                </a>
            </section>

        </div>
        
    </section>

    <h2 class="centrarTexto"> ¡Recuerda que actualizamos nuestro catálogo todas las semanas! </h2>

    
</body>

<?php include "includes/footer.html" ?>
