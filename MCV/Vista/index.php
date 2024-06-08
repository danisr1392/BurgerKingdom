<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link type="text/css" rel="stylesheet" href="../../css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Icono Web -->
    <link rel="shortcut icon" href="../../imagenes/logo-burger.png" />
    <title>Burger Kingdom</title>
</head>

<body>
    <?php 
    //obtengo el menu
    require("../../html/menu.php");?>;?>

    <main>
        <!-- banner principal hamburguesa rotatoria -->
        <div class="position-relative" id="main-banner">
            <div class="row justify-content-center align-items-center position-absolute top-50 start-50 translate-middle" style="z-index:2;">
                <div class="col-12 text-center">

                    <video class="burger__360" autoplay="autoplay" loop="loop" style="width: 90%; height: 90%;"> 
                        <source src="https://www.goiko.com/es/wp-content/uploads/2023/07/kb-360x2-1.webm" type="video/webm"> 
                    </video>

                </div>
            </div>

            <div class="content-container" style="z-index: 0; filter: brightness(0.7); ">
                <div class="row" style="z-index: 5;">
                    <?php
                    for ($a = 0; $a < 4; $a++) {
                        require '../../html/rail.php';
                        require '../../html/rail2.php';
                    }
                    ?>
                </div>
            </div>

        </div>
        
        <!-- banner ir a carta -->
        <div class="container-fluid position-relative">
            <h1 class="text-center" id="h1-carta" >MENÚ</h1>
                
            <div class="container-fluid position-relative" id="banner-carta">
                <div class="container">
                    <h2 class="text-center" id="h2-carta">¡Descubre un festín de sabores en un solo click! Explora nuestro irresistible menú y deja que tus antojos se conviertan en realidad.</h2>
                </div>
                <div class="container text-center" style="padding-top: 160px;">
                    <a class="button-carta" href="../Controlador/carta.php">CARTA</a>
                </div>
            </div>

            <?php require("../../html/railcarta.php") ?>

        </div>            

        <!-- banner proximamente -->
        <div class="container-fluid position-relative">
            <h1 class="text-center" id="h1-prox">PRÓXIMAS NOVEDADES</h1>
                
                <div id="img-prox">
                    <img src="../../imagenes/inicio/smash-burger.png"/>
                    <img src="../../imagenes/inicio/bebidas.png"/>
                    <img src="../../imagenes/inicio/ensalada.png"/>
                </div>
        </div>

        <!--efecto ola obtenido de https://getwaves.io/ -->
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 280" style="background-color: black;">
            <path fill="#e9e9eb" fill-opacity="1" d="M0,96L80,90.7C160,85,320,75,480,112C640,149,800,235,960,256C1120,277,1280,235,1360,213.3L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
        </svg>

        <!-- galeria de imagenes -->
        <div class="container-gallery">
            <h1 style="font-family: 'Oswald'; font-size: 50px; padding: 40px 0; text-align: center;">HAMBURGUESAS DE LA CARTA<img src="../../iconos/lupa.png" width="90" height="90" style="margin-left: 15px;"></h1>
            <section>

                    <!-- muestro las imagenes dela galeria -->
                    <?php
                    for($a = 1; $a <= 14; $a++){
                        ?><img src="../../imagenes/productos/burgers/burger<?php echo $a; ?>.png"><?php
                    }
                    ?>
            </section>
        </div>

        <?php require("../../html/rail3.php") ?>


        <!-- galeria de imagenes responisve(en caso de achicar la ventana muestro esta galeria ordenada como un grid) -->
        <div class="container-gallery-responsive">
            <h1 style="font-family: 'Oswald'; font-size: 50px; padding: 40px 0; text-align: center;">HAMBURGUESAS DE LA CARTA<img id="lupa-responsive" src="../../iconos/lupa.png" width="90" height="90" style="margin-left: 15px;"></h1>
            <section class="gallery-responsive">
                    <!-- muestro las imagenes dela galeria (version responsive)-->
                    <?php
                    for($a = 1; $a <= 14; $a++){
                        ?><img src="../../imagenes/productos/burgers/burger<?php echo $a; ?>.png"><?php
                    }
                    ?>
            </section>
        </div>
        
    </main>

    <?php 
    //obtengo el footer
    require_once("../../html/footer.php"); ?>

</body>

</html>