
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
    <meta nombre="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link type="text/css" rel="stylesheet" href="../../css/style-pago.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="shortcut icon" href="../../imagenes/logo-burger.png" />
    <title>Finalizar Pago</title>
</head>
<body>

    <!-- creo el boton para cancelar el producto -->
    <button id="btn-cancelar" onclick="cancelarPedido()">Cancelar Pedido</button>
    <main>
        <div class="detallesCarrito" id="detallesCarrito">
            <h2 class="text-center">Pedido</h2>
            <!-- creo la tabla con los productos del carrito -->
            <table id="tabla-productos">
                <tbody>
                    
                </tbody>
            </table>
        </div>

        <!-- añado el boton de paypal -->
        <div style="width: 100%; display: flex; justify-content: center;">
            <div id="paypal-button-container" style="padding-top: 85px; padding-bottom: 190px; width: 450px;"></div>
        </div>
        <script src="https://www.paypal.com/sdk/js?client-id=AcbNZ-Qj_mWs5Ezz1qP-2fhDHkkA9HGtDad2JtWcTW_jEqOYGyGU4MLugrs6ynwJBZL-PQaY8uXslSGV&currency=EUR"></script>
    </main>

    <script>

        ///////////////////////////
        ///GET PRODUCTOS CARRITO///
        ///////////////////////////

        function getProductosCarrito() {

            const productosCarrito = JSON.parse(sessionStorage.getItem('productosCarrito')) || []; //obtengo los datos guardados en el sesion stoarge
            const listaProductos = document.getElementById('tabla-productos'); //obtengo mediante id la lista de productos para añadirle contenido luego
            let precioTotal = 0; //inicilizo el precio total

            listaProductos.innerHTML = ''; //limpio la lista antes de actualizarla

            //creo los encabezados de la tabla y los agrego
            const tr1 = document.createElement('tr');
            tr1.innerHTML = `<th scope="col">Nombre</th><th scope="col">Cantidad</th><th scope="col">Precio</th>`;
            listaProductos.appendChild(tr1);

            //por cada producto vamos añadiendo 
            productosCarrito.forEach(producto => {
                const li = document.createElement('tr'); //creo una fila
                precioTotal += producto.precio * producto.cantidad; //actualizo la variable de precio total
                li.innerHTML = `<td scope="row">${producto.nombre}</td><td>${producto.cantidad}</td><td>${(producto.precio * producto.cantidad).toFixed(2)}€</td>`; //añado el contenido de la fila
                listaProductos.appendChild(li); //añado la fila a la tabla
            });

            //añado un input oculto con el valor del pedido para usarlo en el pago de la api
            const input = document.createElement('input');
            input.setAttribute("type", "hidden"); //oculto el input
            input.setAttribute("id", "precioTotal");
            input.setAttribute("value", precioTotal.toFixed(2));
            listaProductos.appendChild(input);

            //añado un ultimo valor con el precio total(no uso el de antes porque habia problemas al recibirlo con js)
            const tr2 = document.createElement('tr');
            tr2.innerHTML = `<td scope="row">Total</td><td></td><td>${precioTotal.toFixed(2)}€</td>`;
            listaProductos.appendChild(tr2);
        }

        /////////////////////
        ///CANCELAR PEDIDO///
        /////////////////////

        //al pulsar el boton de cancelar pedido borramos lo que hubiera en el carrito y volvemos a la pagina de pedido
        function cancelarPedido(){
            sessionStorage.removeItem('productosCarrito');
            window.location.href = 'pedido.php';
        }

        /////////////////////
        ///COMPROBAR TOTAL///
        /////////////////////

        //al cargar la pagina compruebo que el precio total del pedido sea de 20€, en caso contrario te devuelvo a
        function comprobarTotal(){
            var precioTotal = document.getElementById('precioTotal').value;

            if(precioTotal < 20){
                window.location.href = 'pedido.php';
            }
        }

        window.onload = getProductosCarrito();
        window.onload = comprobarTotal();



        ////////////////////////////////
        ///CONFIGURACION BOTON PAYPAL///
        ////////////////////////////////

        var precioTotal = document.getElementById('precioTotal').value; //obtengo el valor del precio total para pasarlo en el value de 'amount'

        paypal.Buttons({
            style:{
                label: "paypal",
                color: 'blue',
                shape: 'pill',
                height: 55,
                fundingSource: "paypal"
            },
            //le paso el precio a pagar
            createOrder:function(data, actions){
                return actions.order.create({
                    purchase_units:[{
                        amount:{
                            value:precioTotal //ordeno que se cobre la cantidad establecida
                        }
                    }]
                })
            },
            //al cancelar el pago
            onCancel:function(data_cancel){
                window.location.href = 'pedido.php'; //en caso de cancelar el pago te devuelvo a la pagina de pedido
            },
            //al completar el pago
            onApprove(data) {
                //obtengo los datos del carrito
                const productosCarrito = JSON.parse(sessionStorage.getItem('productosCarrito'));

                //inicio una llamada ajax
                $.ajax({
                    url: 'insert-pedido.php',
                    type: 'POST',
                    data: { productosCarrito: productosCarrito }, //envio los datos por post
                    //en caso de que se realice el pedido correctamente, te devuelvo al index
                    success: function(response) {
                        sessionStorage.removeItem('productosCarrito');
                        window.location.href = 'index.php';
                    },
                    //en caso de error, muestro el erro por consola
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
        }).render("#paypal-button-container"); //el boton se muestra en este contenedor
    </script>
</body>