<?php

    //compruebo que se pulse el boton de iniciar sesion
    if(isset($_POST["ini-sesion"])){
        //compruebo que se rellenaron los inputs
        if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["clave"]) && !empty($_POST["clave"])) {
            //si el correo no existe muestro el error
            if(!$correoExiste){
                ?><p style="padding: 20px; text-align: center; color: red; font-weight: 24px;">El email introducido no existe</p> <?php

            //si el correo existe y la contraseña no es correcta muestro el error
            }else if($correoExiste && $contrasenyaCorrecta == false){
                ?><p style="padding: 20px; text-align: center; color: red; font-weight: 24px;">La contraseña introducida no es correcta</p> <?php
            }    
        }
    }