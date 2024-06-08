<?php
session_start(); //obtengo la sesion

//compruebo que se haya pulsado el boton 'enviar' del form
if(isset($_POST["enviar"])){
    //compruebo que se hayan rellenado todos los campos
    if(isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["email"]) && isset($_POST["asunto"]) && isset($_POST["problema"])){

        $destinatario = "dannyserrano1392@gmail.com"; //establezco mi email como ejemplo para el destinatario

        //obtengo todos los campos por POST
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $asunto = $_POST["asunto"];
        $problema = $_POST["problema"]."<br>De: $nombre $apellidos";
        $email = $_POST["email"];
        $cabeceras = "From: $email\r\n" . //obtengo la cabecera del mail
                     "Reply-To: $email\r\n" .
                     "X-Mailer: PHP/" . phpversion();

        mail($destinatario, $asunto, $problema, $cabeceras); //mando el mail

        header("Location: index.php"); // te redirijo al index despues de enviar el mail
    }
}


require("../Vista/contacto.php");