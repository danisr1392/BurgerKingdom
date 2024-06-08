<?php
require '../Modelo/Usuario.php';
require '../../funciones.inc.php';

//compruebo que se pulso el boton de registro
if (isset($_POST["enviar-reg"])) {
    //verifico si se enviaron todos los campos
    if (isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["correo"]) &&
        isset($_POST["provincia"]) && isset($_POST["ciudad"]) && isset($_POST["direccion"]) &&
        isset($_POST["telefono"])){

        //obtengo los datos por POST
        $nombre = validar_cadena($_POST["nombre"]);
        $clave = validar_cadena($_POST["clave"]);  //(el hash a la contraseña se lo hago en la creacion del user)
        $email = validar_correo($_POST["correo"]);
        $provincia = validar_cadena($_POST["provincia"]);
        $ciudad = validar_cadena($_POST["ciudad"]);
        $direccion = validar_cadena($_POST["direccion"]);
        $telefono = validar_entero($_POST["telefono"]);

        //verifico si el email y el telefono introducido ya existen
        $verificacionEmail = Usuario::emailExiste($email);
        $verificacionTelefono = Usuario::telefonoExiste($telefono);

        //en caso de que no existan el email y el telefono continuamos
        if (!$verificacionEmail && !$verificacionTelefono) {
            //creo un objeto de usuario
            $usuario = new Usuario($nombre, $clave, $email, $provincia, $ciudad, $direccion, $telefono);
            if($usuario->crearUser()){
                // redirijo la pagina al inicio de sesion
                header("Location: inicio-sesion.php");
                exit;
            }
        }
    }else{
        //en caso de que se envie el form sin algun campo
        ?> <script>alert('Error inesperado');</script> <?php
    }
}

// incluyo la vista de la pagina
require '../Vista/registro.php';
?>
