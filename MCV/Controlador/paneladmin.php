<?php
session_start();
//hago los requires necesarios
require("../../funciones.inc.php");
require("../Modelo/Producto.php");
require("../Modelo/Usuario.php");
require("../Modelo/Pedido.php");
require("../Modelo/Repartidor.php");
require("../Modelo/detallesProducto.php");
require("../Modelo/detallesPedido.php");

//////////////////////
/////ADD PRODUCTO/////
//////////////////////

//compruebo que se pulso el boton de subir un producto
if(isset($_POST["subir-producto"])){
    //compruebo que se han rellenado todos los campos
    if(!empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"]) && !empty($_POST["tipo"]) &&
        !empty($_POST["url-img"]) && !empty($_POST["id-user"]) && !empty($_POST["ingredientes"])){

            //obtengo los valores del producto
            $nombre = validar_cadena($_POST["nombre"]);
            $descripcion = validar_cadena($_POST["descripcion"]);
            $precio = validar_cadena($_POST["precio"]);
            $tipo = validar_cadena($_POST["tipo"]);
            $url = validar_cadena($_POST["url-img"]);
            $id_user = validar_cadena($_POST["id-user"]);

            //creo el objeto de Producto
            $producto = new Producto($nombre, $descripcion, $precio, $id_user, $tipo, $url);
            
            //compruebo que no se introduzca un nombre repetido
            if(!Producto::nombreExiste($nombre)){
                //creo el producto
                if($producto->crear()){
                    //informo de que se ha creado el producto
                    ?> <script>alert('Se ha creado el producto');</script> <?php
    
                    //luego de crear el producto procedo a asociarle sus ingredientes en la tabla 'detallesproducto'
                    $ingredientes = $_POST["ingredientes"];
    
                    //al llegar aqui el objeto ya se ha creado y obtengo su id para usarlo en los inserts
                    $id = Producto::obtenerUltimoID();
    
                    foreach($ingredientes as $ingrediente){ 
                        //creo un objeto por cada ingrediente y procedo a insertar valores(id_producto, id_ingrediente)
                        try{
                            $detalleProd = new detallesProducto($id, $ingrediente);
                            $detalleProd->crear();
                        }catch (Exception $ex) {
                            die("Error inesperado: " . $ex->getMessage());
                        }
                        
                    }
    
                } else {
                    //informo de que ha habido un error al crear el producto
                    ?> <script>alert('Ha habido un error al crear el producto');</script> <?php
                }
            }else {
                //informo de que el nombre de producto introducido ya existe
                ?> <script>alert('Introduzca un nombre de producto diferente');</script> <?php
            }
    }else{
        //en caso de que se envie el form sin algun campo
        ?> <script>alert('Error inesperado');</script> <?php
    }
}


/////////////////////////
/////BORRAR PRODUCTO/////
/////////////////////////

//compruebo que se pulso el boton de borrar un producto
if(isset($_POST["borrar-prod"])){
    //compruebo que se seleccionó algo en los selects
    if(!empty($_POST["producto"]) && !empty($_POST["tipoProducto"])){

            //obtengo el id del producto seleccionado
            $producto = validar_entero($_POST["producto"]);
            
            //primero tengo que eliminar los valores que tengan el id del producto en la tabla 'detallesproducto'(cuando sea tipo Hamburguesa, ya que los snacks y bebidas no tienen detalles)
            if($_POST["tipoProducto"] == "Hamburguesa"){
                
                //si el producto a eliminar es una hamburguesa, primero elimino sus detalles
                if(detallesProducto::eliminarPorProd($producto)){
                    //una vez eliminados los detalles del producto, lo eliminamos definitivamente
                    if(Producto::eliminarUno($producto)){
                        //informo de que se ha eliminado el producto
                        ?> <script>alert('Se ha eliminado el producto');</script> <?php
                    } else {
                        //informo de que no se ha eliminado el producto
                        ?> <script>alert('Ha habido un error al eliminar el producto');</script> <?php
                    }
                } else {
                    //informo de que no se ha eliminado el producto
                    ?> <script>alert('Ha habido un error al eliminar el producto');</script> <?php
                }
                
            } else{
                //en caso de que el producto no sea una hamburguesa puedo proceder a eliminar el producto directamente
                if(Producto::eliminarUno($producto)){
                    //informo de que se ha eliminado el producto
                    ?> <script>alert('Se ha eliminado el producto');</script> <?php
                } else {                        
                    //informo de que se ha eliminado el producto
                    ?> <script>alert('Ha habido un error al eliminar el producto');</script> <?php
                }
            }
    }else{
        //en caso de que se envie el form sin algun campo
        ?> <script>alert('Error inesperado');</script> <?php
    }
}


///////////////////
/////ADD ADMIN/////
///////////////////

//compruebo que se pulso el boton de añadir un admin
if(isset($_POST["add-admin"])){
    //compruebo que se rellenaron todos los campos necesarios
    if(!empty($_POST["nombre"]) && !empty($_POST["contrasenya"]) && !empty($_POST["email"]) && !empty($_POST["telefono"]) &&
        !empty($_POST["provincia"]) && !empty($_POST["ciudad"]) && !empty($_POST["direccion"])){

            //obtengo todos los valores del POST
            $nombre = validar_cadena($_POST["nombre"]);
            $contrasenya = validar_cadena($_POST["contrasenya"]);
            $email = validar_cadena($_POST["email"]);
            $telefono = validar_entero($_POST["telefono"]);
            $provincia = validar_cadena($_POST["provincia"]);
            $ciudad = validar_cadena($_POST["ciudad"]);
            $direccion = validar_cadena($_POST["direccion"]);

            //creo un objeto de Usuario
            $admin = new Usuario($nombre, $contrasenya, $email, $provincia, $ciudad, $direccion, $telefono);
            
            //hago dos comprobaciones por si el email o el telefono introducidos ya existen
            $comprobacionEmail = Usuario::emailExiste($email);
            $comprobacionTelefono = Usuario::telefonoExiste($telefono);

            //compruebo que el email no exista
            if(!$comprobacionEmail){
                //compruebo que el telefono no exista
                if(!$comprobacionTelefono){
                    //si se superan las 2 comprobaciones procedo a crear el usuario
                    if($admin->crearAdmin()){
                        //informo de que se creo el usuario
                        ?> <script>alert('Se ha creado el usuario administrador');</script> <?php
                    } else {
                        //informo de que no se creo el usuario
                        ?> <script>alert('Ha habido un error al crear el usuario');</script> <?php
                    }
                }else{
                    //informo de que el telefono introducido ya existe
                    ?> <script>alert('El telefono introducido ya ha sido registrado');</script> <?php
                }
            }else{
                //informo de que el telefono introducido ya existe
                ?> <script>alert('El email introducido ya ha sido registrado');</script> <?php
            }
            
    }else{
        //en caso de que se envie el form sin algun campo
        ?> <script>alert('Error inesperado');</script> <?php
    }
}


////////////////////////
/////BORRAR USUARIO/////
////////////////////////

//compruebo que se pulso el boton de borrar usuario
if(isset($_POST["borrar-user"])){

    //en caso de introducir 2 valores, se operará primero con el correo
    if(!empty($_POST["correo"])){
        //obtengo el POST de correo
        $correo = validar_cadena($_POST["correo"]);
        
        //obtengo el id del usuario a partir de su correo
        if($id = Usuario::obtenerIDEmail($correo)){

            if(!Usuario::esAdmin($correo)){
                //obtengo los pedidos que realizo este usuario
                //puede ser null si se acaba de crear el user
                $pedidos = Usuario::obtenerPedidosUser($id["id_user"]);

                //elimino los valores de 'detallespedido' y luego de 'pedido' que contengan el id del usuario
                foreach($pedidos as $pedido){
                    detallesPedido::eliminarUno($pedido["id_ped"]); //primero elimino los valores de 'detallespedido'
                    Pedido::eliminarUno($pedido["id_ped"]); //luego elimino los pedidos que contengan el id del usuario
                }

                //elimino al usuario
                if(Usuario::eliminarPorEmail($correo)){
                    //informo que se elimino al user
                    ?> <script>alert('Se ha eliminado el usuario');</script> <?php
                } else {
                    //informo que no se elimino al user
                    ?> <script>alert('Ha habido un error al eliminar el usuario');</script> <?php
                }
            }else{
                //elimino al usuario
                if(Usuario::eliminarPorEmail($correo)){
                    //informo que se elimino al user
                    ?> <script>alert('Se ha eliminado el usuario');</script> <?php
                } else {
                    //informo que no se elimino al user
                    ?> <script>alert('Ha habido un error al eliminar el usuario');</script> <?php
                }
            }
        }else{
            //informo que no se elimino al user
            ?> <script>alert('El usuario no existe');</script> <?php
        }
    }else if(!empty($_POST["telefono"])){
        //obtengo el POST de telefono
        $telefono = validar_cadena($_POST["telefono"]);

        //obtengo el id del usuario a partir de su telefono
        if($id = Usuario::obtenerIDTelefono($telefono)){
            if(!Usuario::esAdmin($telefono)){
                //obtengo los pedidos que realizo este usuario
                //puede ser null si se acaba de crear el user
                $pedidos = Usuario::obtenerPedidosUser($id["id_user"]);

                //elimino los valores de 'detallespedido' y luego de 'pedido' que contengan el id del usuario
                foreach($pedidos as $pedido){
                    detallesPedido::eliminarUno($pedido["id_ped"]); //primero elimino los valores de 'detallespedido'
                    Pedido::eliminarUno($pedido["id_ped"]); //luego elimino los pedidos que contengan el id del usuario
                }

                //elimino al usuario
                if(Usuario::eliminarPorTelefono($telefono)){
                    //informo que se elimino al user
                    ?> <script>alert('Se ha eliminado el usuario');</script> <?php
                } else {
                    //informo que no se elimino al user
                    ?> <script>alert('Ha habido un error al eliminar el usuario');</script> <?php
                }
            }else{
                //elimino al usuario
                if(Usuario::eliminarPorTelefono($telefono)){
                    //informo que se elimino al user
                    ?> <script>alert('Se ha eliminado el usuario');</script> <?php
                } else {
                    //informo que no se elimino al user
                    ?> <script>alert('Ha habido un error al eliminar el usuario');</script> <?php
                }
            }
        }else{
            //informo que no se elimino al user
            ?> <script>alert('El usuario no existe');</script> <?php
        }
    }else{
        //en caso de que se envie el form sin algun campo
        ?> <script>alert('Error inesperado');</script> <?php
    }
}

///////////////////////////
/////AÑADIR REPARTIDOR/////
///////////////////////////

//compruebo que se pulso el boton de añadir repartidor
if(isset($_POST["add-rep"])){
    //compruebo que los campos a rellenar no esten vacios
    if(!empty($_POST["dni"]) && !empty($_POST["nombre"]) && !empty($_POST["apellidos"]) && !empty($_POST["provincia"]) && !empty($_POST["telefono"])){

            //obtengo los datos por POST
            $dni = validar_cadena($_POST["dni"]);
            $nombre = validar_cadena($_POST["nombre"]);
            $apellidos = validar_cadena($_POST["apellidos"]);
            $provincia = validar_cadena($_POST["provincia"]);
            $telefono = validar_entero($_POST["telefono"]);

            //creo un objeto de Repartidor
            $repartidor = new Repartidor($dni, $nombre, $apellidos, $provincia, $telefono);

            //compruebo que el dni introducido no exista en la bdd
            if(!Repartidor::dniExiste($dni)){
                //si el dni no existe, se hace el insert
                if($repartidor->crear()){
                    //informo que se creo el repartidor
                    ?> <script>alert('Se ha creado el repartidor');</script> <?php
                } else {
                    //informo que no se creo el repartidor
                    ?> <script>alert('Ha habido un error al crear el repartidor');</script> <?php
                }
            }else{
                //informo que el dni ya existe
                ?> <script>alert('El dni introducido ya ha sido registrado');</script> <?php
            }
            
    }else{
        //en caso de que se envie el form sin algun campo
        ?> <script>alert('Error inesperado');</script> <?php
    }
}

///////////////////////////
/////BORRAR REPARTIDOR/////
///////////////////////////

//compruebo que se pulso el boton de borrar repartidor
if(isset($_POST["borrar-rep"])){
    //compruebo que el campo de dni no esta vacio
    if(!empty($_POST["dni"])){

        //obtengo el dni a eliminar
        $dni = validar_cadena($_POST["dni"]);
        
        if($dni == ""){
            //elimino al repartidor usando su dni como referencia en la tabla
            if(Repartidor::eliminarPorDNI($dni)){
                //informo que se ha eliminado
                ?> <script>alert('Se ha eliminado al repartidor');</script> <?php
            } else {
                //informo que se ha ocurrido un error
                ?> <script>alert('Ha habido un error al eliminar al repartidor');</script> <?php
            }
        } else {
            //informo que se ha ocurrido un error
            ?> <script>alert('El dni no coincide con ningun repartidor');</script> <?php
        }
    }else{
        //en caso de que se envie el form sin el campo
        ?> <script>alert('Error inesperado');</script> <?php
    }
}

require("../Vista/paneladmin.php");