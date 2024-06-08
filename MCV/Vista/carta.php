<!DOCTYPE html>
<?php require("../Modelo/Producto.php"); ?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS -->
  <link type="text/css" rel="stylesheet" href="../../css/style-carta.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

  <!-- Icono Web -->
  <link rel="shortcut icon" href="../../imagenes/logo-burger.png" />
  <title>Carta</title>
</head>
<body>

    <?php 
    //obtengo el menu
    require("../../html/menu.php");?>

    <main>
        
        <!------------------------>
        <!-- CONTENEDOR BURGERS -->
        <!------------------------>
        <div class="container w-100" style="width: 100%;" id="productos">
            <h1 class="text-center">Hamburguesas</h1>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                <!-- obtengo todas las hamburguesas y muestro su imagen y su nombre -->
                <?php foreach (Producto::obtenerBurgers() as $burger){ ?>
                    <div class="col mb-4" id="burger">
                        <!-- al hacer click en la imagen vamos a la pagina del producto -->
                        <a href="producto.php?name=<?= $burger["nombre"] ?>" class="position-relative d-block">
                            <h2 class="position-absolute"><?= $burger["nombre"] ?></h2>
                            <img src="<?= $burger["imagen"] ?>" class="img-fluid rounded" alt="Burger"/>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!------------------------>
        <!-- CONTENEDOR SNACKS -->
        <!------------------------>
        <div class="container" style="width: 100%;" id="productos">
            <h1 class="text-center">Snacks</h1>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                <!-- obtengo todos los snacks y muestro su imagen y su nombre -->
                <?php foreach (Producto::obtenerSnacks() as $snacks){ ?>
                    <div class="col mb-4" id="snack">
                        <!-- al hacer click en la imagen vamos a la pagina del producto -->
                        <a href="producto.php?name=<?= $snacks["nombre"] ?>" class="position-relative d-block">
                            <h2 class="position-absolute"><?= $snacks["nombre"] ?></h2>
                            <img src="<?= $snacks["imagen"] ?>" class="img-fluid rounded" alt="Burger"/>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!------------------------>
        <!-- CONTENEDOR BEBIDAS -->
        <!------------------------>
        <div class="container" style="width: 100%;" id="productos">
            <h1 class="text-center">Bebidas</h1>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                <!-- obtengo todas las bebidas y muestro su imagen y su nombre -->
                <?php foreach (Producto::obtenerBebidas() as $bebida){ ?>
                    <div class="col mb-4" id="bebida">
                        <!-- al hacer click en la imagen no pasa nada, ya que las bebidas no tienen descripcion y solo muestro la imagen -->
                        <a id="bebidas" class="position-relative d-block">
                            <h2 class="position-absolute"><?= $bebida["nombre"] ?></h2>
                            <img src="<?= $bebida["imagen"] ?>" class="img-fluid rounded" alt="Burger" style="height: 280px; width: 100%;"/>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <?php 
        //obtengo el div desplazable
        require("../../html/railcarta.php") ?>

    </main>

    <?php 
    //obtengo el footer
    require_once("../../html/footer.php"); ?>

</body>
</html>