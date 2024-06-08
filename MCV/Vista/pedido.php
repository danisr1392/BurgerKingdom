<!DOCTYPE html>
<html lang="es">
<?php 

//hago un require del objeto Producto
require("../Modelo/Producto.php"); 

//si no has iniciado sesion e intentas entrar la pagina te devuelvo al inicio de sesion
if (!isset($_SESSION["nombreUser"])) {
    header("Location: ../Controlador/inicio-sesion.php");
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link type="text/css" rel="stylesheet" href="../../css/style-pedido.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Icono Web -->
    <link rel="shortcut icon" href="../../imagenes/logo-burger.png" />
    <title>Realizar Pedido</title>
</head>
<body>

    <?php require("../../html/menu.php");?>

    <main>

        <!------------------------>
        <!-- CONTENEDOR SNACKS -->
        <!------------------------>
        <div class="container-fluid" id="container-all">
            <h1 class="text-center">Snacks</h1>
            <div class="productos">
                <?php foreach (Producto::obtenerSnacks() as $snack){ ?>
                    <div id="producto">
                        <a href="producto.php?name=<?= $snack['nombre'] ?>">
                            <img src="<?= $snack["imagen"] ?>" class="img-fluid rounded" alt="<?php echo $snack["nombre"]; ?>"/>
                        </a>
                        <div id="info-producto">
                            <h3><?php echo $snack["nombre"]; ?></h3>
                            <div class="button-container">
                                <p style="font-size: 18px;"><b><?php echo $snack["precio"]."€"; ?></b></p>
                                <button class="boton-compra" onclick='addCarrito("<?php echo $snack["id_prod"]; ?>","<?php echo $snack["nombre"]; ?>", <?php echo $snack["precio"]; ?>)' >
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>


        <!------------------------>
        <!-- CONTENEDOR BURGERS -->
        <!------------------------>
        <div class="container-fluid" id="container-all">
            <h1 class="text-center">Hamburguesas</h1>
            <div class="productos">
                <?php foreach (Producto::obtenerBurgers() as $burger){ ?>
                    <div id="producto">
                        <a href="producto.php?name=<?= $burger['nombre'] ?>">
                            <img src="<?= $burger["imagen"] ?>" class="img-fluid rounded" alt="<?php echo $burger["nombre"]; ?>"/>
                        </a>
                        <div id="info-producto">
                            <h3><?php echo $burger["nombre"]; ?></h3>
                            <div class="button-container">
                                <p style="font-size: 18px;"><b><?php echo $burger["precio"]."€"; ?></b></p>
                                <button class="boton-compra" onclick='addCarrito("<?php echo $burger["id_prod"]; ?>","<?php echo $burger["nombre"]; ?>", <?php echo $burger["precio"]; ?>)' >
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!------------------------>
        <!-- CONTENEDOR BEBIDAS -->
        <!------------------------>
        <div class="container-fluid" id="container-all">
            <h1 class="text-center">Bebidas</h1>
            <div class="productos">
                <?php foreach (Producto::obtenerBebidas() as $bebida){ ?>
                    <div id="producto" class="bebida">
                        <img src="<?= $bebida["imagen"] ?>" class="img-fluid rounded" alt="<?php echo $bebida["nombre"]; ?>" />
                        <div id="info-producto">
                            <h3><?php echo $bebida["nombre"]; ?></h3>
                            <div class="button-container">
                                <p style="font-size: 18px;"><b><?php echo $bebida["precio"]."€"; ?></b></p>
                                <button class="boton-compra" onclick='addCarrito("<?php echo $bebida["id_prod"]; ?>","<?php echo $bebida["nombre"]; ?>", <?php echo $bebida["precio"]; ?>)' >
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="contenedor-carrito">
            <button id="btn-reiniciar" onclick="limpiarCarrito()">Reiniciar Pedido</button>
            <div id="cantidad-carrito-container" onclick="visualizarPedido()">
                <span id="cantidad-carrito">0</span><br>
                <div class="detallesCarrito" id="detallesCarrito">
                    <h2 class="text-center">Carrito</h2>
                    <table id="tabla-productos">
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- input oculto con el precio total -->
            <span id="precio-carrito" hidden>0</span>
            <button id="btn-final" onclick="finalizarPedido()">Finalizar</button>
        </div>

        <!-- alerta precio minimo -->
        <div class="alert-container" id="alert-container">
            <div class="alert alert-warning " role="alert">
                <p>Debes alcanzar un precio mínimo de 20€</p>
            </div>
        </div>
        <!-- efecto overlay al mostrar la lista de productos -->
        <div class="overlay" id="overlay" onclick="visualizarPedido()"></div>

    </main>

    <?php require_once("../../html/footer.php") ?>

    <script>
        //recupero los items del carrito desde el sessionStorage o inicializo como un array vacío si no hay nada
        let productosCarrito = JSON.parse(sessionStorage.getItem('productosCarrito')) || []; 

        ////////////////////////
        ///ACTUALIZAR CARRITO///
        ////////////////////////

        function actualizarCarrito(){
            let contadorProductos = 0; //contador de productos
            let contadorPrecioTotal = 0; //total del carrito

            for (let item of productosCarrito) { //se recorre cada item en el carrito
                contadorProductos += item.cantidad; //se va sumando la cantidad de cada producto
                contadorPrecioTotal += item.precio * item.cantidad; //calculo el precio total multiplicando precio por cantidad
            }

            document.getElementById('cantidad-carrito').innerText = contadorProductos; //actualizo el contador de productos
            document.getElementById('precio-carrito').innerText = contadorPrecioTotal.toFixed(2); //actualiza el precio total del carrito(2 decimales max)


            // actualizo el contenido del desplegable del carrito para visualizar los productos que hayamos añadido
            const tablaProds = document.getElementById('tabla-productos');
            tablaProds.innerHTML = '';

            //creo los encabezados de la tabla
            const th = document.createElement('tr');
            th.innerHTML = `<th scope="col">Nombre</th><th scope="col">Cantidad</th><th scope="col">Precio</th>`;
            tablaProds.appendChild(th);

            productosCarrito.forEach(item => { //por cada item distinto que contenga el carrito añado otro <tr> a la tabla
                //creo el elemento tr y lo relleno de valores
                const tr = document.createElement('tr');
                tr.innerHTML = `<td scope="row">${item.nombre}</td><td scope="row">${item.cantidad}</td><td scope="row">${item.precio}€</td>`;
                tablaProds.appendChild(tr); //lo añado a la tabla
            });


            //añado un ultimo valor con el precio total
            const tr2 = document.createElement('tr');
            tr2.innerHTML = `<td scope="row">Total</td><td></td><td>${contadorPrecioTotal.toFixed(2)}€</td>`;
            tablaProds.appendChild(tr2);
        }


        /////////////////
        ///ADD CARRITO///
        /////////////////

        function addCarrito(idProd, nombreProducto, precioProducto){
            precioProducto = parseFloat(precioProducto); //convierto el precio a número flotante(a veces peta y lo detecta como text)

            const existingItem = productosCarrito.find(item => item.nombre === nombreProducto); //busco si el producto ya está en el carrito usando su nombre

            if (existingItem) {
                existingItem.cantidad++; //si existe, incrementa la cantidad
            } else {
                productosCarrito.push({ id: idProd, nombre: nombreProducto, precio: precioProducto, cantidad: 1 }); //si no existe, lo agrego con cantidad 1
            }

            sessionStorage.setItem('productosCarrito', JSON.stringify(productosCarrito)); //guardo el carrito actualizado en sessionStorage

            actualizarCarrito(); //actualizo el carrito
        }


        /////////////////////
        ///LIMPIAR CARRITO///
        /////////////////////
        function limpiarCarrito() {
            productosCarrito = []; //vacio el carrito
            sessionStorage.removeItem('productosCarrito'); //elimino los items del carrito de sessionStorage
            actualizarCarrito(); //actualizo el carrito
        }

        //////////////////////
        ///FINALIZAR PEDIDO///
        //////////////////////
        function finalizarPedido() {
            const precioCarrito = parseFloat(document.getElementById('precio-carrito').innerText); //obtengo el precio

            //en caso de que se intente finalizar el pedido con menos de 20€, muestro una alerta
            if (precioCarrito <= 20) {
                return mostrarAlertaPrecio();
            }else{
                window.location.href = 'finalizar-pago.php'; //te mando a la pagina para acabar con el pago
            }
        }

        ////////////////////////
        ///MOSTRAR ALERTA 10€///
        ////////////////////////

        function mostrarAlertaPrecio(){
            //cuando se llama a la fucion se muestra la alerta
            const alertContainer = document.getElementById('alert-container');
            alertContainer.style.display = 'block';

            //muestro la alerta 3 segundos y desaparece
            setTimeout(() => {
                alertContainer.style.display = 'none';
            }, 3000);

            return false;
        }

        ///////////////////////
        ///VISUALIZAR PEDIDO///
        ///////////////////////

        function visualizarPedido() {
            //obtengo el id de la tabla y del overlay
            const detallesCarrito = document.getElementById('detallesCarrito');
            const overlay = document.getElementById('overlay');

            //cuando no se este mostrando la tabla y el overlay
            if (detallesCarrito.style.display === 'none' || detallesCarrito.style.display === '') {
                //procedo a mostrarlos
                detallesCarrito.style.display = 'block';
                overlay.style.display = 'block';
            } else {
                //al hacer click fuera de la tabla o del overlay volvemos a la vision original de la pagina
                detallesCarrito.style.display = 'none';
                overlay.style.display = 'none';
            }
        }

        //actualizo la visualización del carrito cuando se carga la página(si has añadido 2 productos, reinicias y añades otro, en lugar de 1 aparecia un 3)
        window.onload = actualizarCarrito;
    </script>
</body>

</html>