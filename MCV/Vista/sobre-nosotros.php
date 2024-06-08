<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS -->
  <link type="text/css" rel="stylesheet" href="../../css/style-SN.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

  <!-- Icono Web -->
  <link rel="shortcut icon" href="../../imagenes/logo-burger.png" />
  <title>Sobre Nosotros</title>

  <!-- funcion js carrusel -->
  <script>
    $(function(){
        //oculto las imagenes y dejo visible solo la primera
        $(".carrusel-item").css("display", "none");
        $(".carrusel-item:first").show();

        let img = 1;

        //controlo la imagen que se va a mostrar al pasar atras
        $("#back").click(function(){
            img--;
            //como son 3 imagenes, al llegar a 0, vuelve a pasar a la ultima
            if(img <= 0){
                img = 3;
            }

            //oculto las imagenes y muestro la que toca ahora
            $(".carrusel-item").css("display", "none");
            $(".carrusel-item:nth-child(" + img + ")").fadeIn(500);
        });

        //controlo la imagen que se va a mostrar al pasar hacia delante
        $("#next").click(function(){
            img++;
            //como son 3 imagenes, al llegar a 3, vuelve a pasar a la primer imagen
            if(img > 3){
                img = 1;
            }

            //oculto las imagenes y muestro la que toca ahora
            $(".carrusel-item").css("display", "none");
            $(".carrusel-item:nth-child(" + img + ")").fadeIn(500);
            
        });
    });
        
  </script>
</head>
<body>

    <?php 
    //obtengo el menu
    require("../../html/menu.php");?>

    <main>
        <div class="hero-wrapper" id="hero-wrapper">
            <div class="container" id="container">
                
                <img class="logo-png" src="../../imagenes/sobre-nosotros/logo-SN.png" width="240" height="200">
                
                <img data-stellar-ratio="2" src="../../imagenes/sobre-nosotros/cebolla-banner.png" alt="Cebolla" width="375" style="left: -15vw; top: 88px;">
                <img data-stellar-ratio="1.5" src="../../imagenes/sobre-nosotros/pan1-banner.png" alt="Pan" width="739" style="left: 58vw;transform: rotate(22deg) scale(0.7);">
                <img data-stellar-ratio="1.5" src="../../imagenes/sobre-nosotros/tomate-banner.png" alt="Tomate" width="378" style="left: -15vw; top: 388.967px;">
                <img data-stellar-ratio="2" src="../../imagenes/sobre-nosotros/carne-banner.png" alt="Carne" width="480" style="left: 65vw; top: 473.75px; bottom: 4vh;transform: rotate(38deg);">
                <img data-stellar-ratio="1.5" src="../../imagenes/sobre-nosotros/pan2-banner.png" alt="Pan" width="520" style="left: -18vw; top: 527px;">

                <div class="home-hero-title aos-init aos-animate" data-aos="fade-up" id="texto-SN">
                    <h1>LOS INGREDIENTES MÁS TOP, AHORA EN TU COCINA</h1>
                    <h3>¡Prepárate para chuparte los dedos!</h3>
                </div>

                <a href="https://youtu.be/SDWKpPYNiIw?si=JflBkKxuPVsXs9E2" target="_blank"><button class="btn btn-primary me-2" id="btn-video">Ver Vídeo</button></a>
            </div>
        </div>

        <div class="productos-wrapper">
            <div class="fade-in-up-on-scroll" id="container-prods">
                <div class="container-item">
                    <h1>NUESTROS PRODUCTOS</h1>
                </div>
                <div class="carrusel">
                    <div class="carrusel-item">
                        <img id="img-carrusel" src="../../imagenes/sobre-nosotros/carne-grande.png" width="761.2" height="516">
                        <p style="text-align: center; font-family: 'Oswald'; width: 550px">Burger Kingdom</p>
                    </div>
                    <div class="carrusel-item">
                        <img id="img-carrusel" src="../../imagenes/sobre-nosotros/pan-grande.png" width="761.2" height="516">
                        <p style="text-align: center; font-family: 'Oswald'; width: 550px">Burger Kingdom</p>
                    </div>
                    <div class="carrusel-item">
                        <img id="img-carrusel" src="../../imagenes/sobre-nosotros/salsas.png" width="761.2" height="516">
                        <p style="text-align: center; font-family: 'Oswald'; width: 550px">Burger Kingdom</p>
                    </div>
                </div>
                <div class="btn-carrusel">
                    <span id="back" style="cursor: pointer;"><img src="../../iconos/back.png" width="60" height="60"></span>
                    <span id="next" style="cursor: pointer;"><img src="../../iconos/next.png" width="60" height="60"></span>
                </div>
            </div>
            
        </div>

        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="background-color:black;">
            <path fill="#ee2737" fill-opacity="1" d="M0,96L80,90.7C160,85,320,75,480,112C640,149,800,235,960,256C1120,277,1280,235,1360,213.3L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
        </svg>

        <div class="info-wrapper">
            <div class="fade-in-up-on-scroll" id="container-info">
                <div class="container-item">

                    <h1 style="text-shadow: 7px 7px black">NUESTRA HISTORIA</h1>

                    <img src="../../imagenes/sobre-nosotros/fondo-deco.png">
                    <img src="../../imagenes/sobre-nosotros/fondo-deco-responsive.png" id="fondo-deco-responsive">

                    
                    <div id="div-jefe">
                        <h1>THE BIG BOSS</h1>
                        <div id="jefe-info">

                            <picture>
                                <img src="../../imagenes/jefe.png" style="width: 560px; height: 560px;">
                            </picture>
                        
                            <p>
                                En el corazón de nuestra historia está Meet Matt, un apasionado amante de la buena comida y visionario emprendedor que dio vida a nuestra cadena de hamburguesas. Desde los humildes comienzos en su pequeño local hasta convertirse en la fuerza motriz detrás de una próspera cadena de restaurantes, Meet ha dedicado su vida a ofrecer experiencias gastronómicas únicas.
    
                                Con un paladar refinado y una visión clara, Meet creó un espacio donde la calidad, la creatividad y el servicio excepcional se fusionan para deleitar a nuestros clientes. Su dedicación a ingredientes frescos, recetas auténticas y un ambiente acogedor ha dado forma a la esencia de lo que somos hoy.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <?php 
        //hago un require del div desplazable
        require_once("../../html/rail.php"); ?>
    </main>

    <?php 
    //obtengo el footer
    require_once("../../html/footer.php"); ?>
</body>
</html>
