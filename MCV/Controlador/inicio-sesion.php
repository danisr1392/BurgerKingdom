<?php
//hago los requires necesarios
require("../Modelo/Usuario.php");
require '../../funciones.inc.php';

//compruebo que se pulse el boton de iniciar sesion
if (isset($_POST["ini-sesion"])) {
    //compruebo que se han rellenado los campos de emial y contraseña
    if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["clave"]) && !empty($_POST["clave"])) {
        
        //obtengo el correo introducido
        $email = validar_cadena($_POST["email"]);
        
        //compruebo si es un email que ya existe en la BDD antes de comprobar la contraseña
        $correoExiste = Usuario::emailExiste($email);
        $esAdmin = Usuario::esAdmin($email);
        
        //si el correo existe, seguimos con el procedimiento
        if ($correoExiste) {

            //obtengo la contraseña introducida
            $contrasenya = validar_cadena($_POST["clave"]);
            //compruebo si el email y la contraseña coinciden en la bdd
            $contrasenyaCorrecta = Usuario::contrasenyaCorrecta($email, $contrasenya);
            
            //si la contraseña es correcta, inicio una session
            if ($contrasenyaCorrecta) {
                session_start();
                
                //compruebo si el usuario es un admin o un cliente y creo las sesiones correspondientes
                if ($esAdmin == true) {
                    //obtengo el nombre del usuario y su email para usarlo en la interfaz cuando se inicie sesión y otras operaciones
                    $nombreAdmin = Usuario::obtenerNombre($email);
                    $_SESSION["nombreAdmin"] = $nombreAdmin;
                    $_SESSION["correoAdmin"] = $email;
                    header("Location: ./paneladmin.php");
                    exit; //detener el script después de la redirección
                } else {
                    //obtengo el nombre del usuario y su email para usarlo en la interfaz cuando se inicie sesión y otras operaciones
                    $nombreUser = Usuario::obtenerNombre($email);
                    $_SESSION["nombreUser"] = $nombreUser;
                    $_SESSION["correoUser"] = $email;
                    header("Location: ./index.php");
                    exit; //detener el script después de la redirección
                }
            }
        }
    }
}

// hago un require de la vista de la pagina
require("../Vista/inicio-sesion.php");
?>
