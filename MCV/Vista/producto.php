<!DOCTYPE html>
<?php 
//hago un require de la clase Producto
require("../Modelo/Producto.php"); 

//en caso de no recibir un producto por get te devuelvo al index
if(!$_GET["name"]){
    header("Location: index.php");
    exit();
}else if($_GET["name"]){
    //uso el nombre del producto para obtener sus datos
    $datosProducto = Producto::obtenerUno($_GET["name"]);

    //en caso de introducir un nombre manual que no exista en la bdd te mando a la carta 
    if($datosProducto == "" || $datosProducto == null){
        header("Location: carta.php");
        exit();
    }
}

?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS -->
  <link type="text/css" rel="stylesheet" href="../../css/style-producto.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

  <!-- Icono Web -->
  <link rel="shortcut icon" href="../../imagenes/logo-burger.png" />
  <title><?php echo $_GET["name"]; ?></title>
</head>
<body>

    <?php 
    //obtengo el menu
    require("../../html/menu.php");?>

    <main>
        <?php
        //recibo por GET el nombre del producto
        if (isset($_GET["name"])) {
            //uso el nombre del producto para obtener sus datos
            $datosProducto = Producto::obtenerUno($_GET["name"]);

        ?>
            <div class="container">
                <div class="row align-items-center">
                    <!-- una vez que tengo los datos del producto muestro todos sus datos -->
                    <div class="col-md-6">
                        <img src="<?= $datosProducto[0]["imagen"] ?>" alt="Imagen <?= $_GET["name"] ?>" class="img-fluid rounded" style="border: 4px solid white; border-radius: 100%;">
                    </div>
                    <div class="col-md-6" id="texto">
                        <div class="text-start">
                            <h1 style="font-size: 55px;"><?php echo $_GET["name"]; ?></h1>
                            <hr>
                            <p><?= $datosProducto[0]["descripcion"] ?></p>
                            <h3><?= $datosProducto[0]["precio"]; ?> €</h3>
                            
                            <?php
                                if(isset($_SESSION["nombreUser"])){
                                ?><form action="pedido.php">
                                        <button type="submit">INICIAR PEDIDO</button>
                                    </form> <?php
                                }else{
                                ?><form action="inicio-sesion.php">
                                        <button type="submit">INICIAR PEDIDO</button>
                                    </form> <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </main>

    <?php 
    //obtengo el footer
    require_once("../../html/footer.php"); ?>
</body>
</html>