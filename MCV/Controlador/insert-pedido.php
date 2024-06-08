<?php
session_start(); //obtengo la sesion
//hago los requires necesarios
require("../Modelo/Usuario.php");
require("../Modelo/Pedido.php");
require("../Modelo/detallesPedido.php");

//recibo los datos por POST de la funcion AJAX de finalizar-pedido.php(vista)
if ($_POST) {
    $productosCarrito = $_POST['productosCarrito']; //recibo los datos del carrito
    $idUser = ""; //inicializo la variable idUser para crear el objeto de Pedido
    
    //obtengo el id del usuario usando la sesion de su correo
    if(isset($_SESSION["correoUser"])){
        $id = Usuario::obtenerIDEmail($_SESSION["correoUser"]);
        $idUser = $id["id_user"];
    }

    $precioTotal = 0; //inicializo la variable del precio total

    //por cada producto del carrito sumo su precio total
    foreach($productosCarrito as $carrito){
        $precioTotal += $carrito["precio"]*$carrito["cantidad"];
    }

    $arrayReps = []; //inicializo el array de repartidores

    //obtengo los repartidores disponibles en esa provincia
    foreach(Usuario::obtenerRepartidorProvincia("$idUser") as $idRepartidores){
        $arrayReps[] = $idRepartidores;
    }

    $indiceAleatorio = array_rand($arrayReps); // obtengo un indice aleatorio del array
    $idRep = $arrayReps[$indiceAleatorio]; // obtengo el id de un repartidor aleatorio de esa provincia
    
    //creo el objeto de Pedido
    $pedido = new Pedido($precioTotal, $idUser, $idRep["id_rep"]);

    //creo el pedido
    if($pedido->crear()){
        //obtengo el id del pedido que acabo de crear para crear sus detalles
        $ultimoID = Pedido::obtenerUltimoID();

        //por cada producto en el carrito
        foreach($productosCarrito as $carrito){
            //obtengo el id del producto
            $idProd = $carrito["id"];

            //creo los detalles del pedido en su tabla(id_pedido, id_producto, cantidad)
            $detallesPedido = new detallesPedido($ultimoID, $idProd, $carrito["cantidad"]);
            $detallesPedido->crear();
        }
    }
} else {
    echo "No llegan los datos por POST";
}
