<?php

    //compruebo que el correo y telefono introducido no ha sido registrado
    if(isset($_POST["enviar-reg"])){   
        //compruebo que se han eviado tanto el telefono como el email por POST
        if(isset($_POST["correo"]) && isset($_POST["correo"]) && isset($_POST["telefono"]) && isset($_POST["telefono"])){
            
            //primero hago la comprobacion del email, en caso de que exista muestro el error
            if($verificacionEmail){
                ?><p style="padding: 20px; text-align: center; color: red; font-weight: 24px;">El correo introducido ya ha sido registrado</p> <?php
            }else if($verificacionTelefono){ //luego hago la comprobacion del telefono, en caso de que exista muestro el error
                ?><p style="padding: 20px; text-align: center; color: red; font-weight: 24px;">El telefono introducido ya ha sido registrado</p> <?php
            }
        }
    }
        
        