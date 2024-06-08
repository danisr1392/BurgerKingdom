<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,900&family=Oswald:wght@500&family=Poppins&display=swap');

        /*menu*/
            nav{
                position: fixed;
                background: black;
                height: 110px;
                width: 100%;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                z-index: 30;
            }

            label.logo{
                padding: 30px 15px;
            }

            nav ul{
                width: 100%;
                display: flex;
                flex-direction: row;
                margin: 0 30px;
                justify-content: space-between;
            }
            
            nav ul li{
                display: inline-block;
                line-height: 80px;
                margin: 0 5px;
            }
            
            nav ul li a{
                color: white;
                font-size: 17px;
                padding: 7px 13px;
                border-radius: 3px;
                text-transform: uppercase;
            }
            
            #btn-carta{
                text-align: center;
                text-decoration: none;
                color: white;
                font-family: "Oswald";
                font-size: 30px;
            }
            
            #btn-sn{
                text-align: center;
                text-decoration: none;
                color: white;
                font-family: "Oswald";
                font-size: 30px;
            }
            
            #btn-carta:hover, #btn-sn:hover{
                transition: 0.2s;
                background-color: #ee2737;
                border-radius: 30px;
                color: black;
            
            }
            
            #btn-sesion{
                width: 190px;
                height: 45px;
                font-family: "Oswald";
                font-weight: 700;
                font-size: 16px;
                line-height: 16px;
                text-transform: uppercase;
                color: #fff;
                background-color: #ee2737;
                border: 2px #ee2737 solid;
                border-radius: 32px;
                padding: 16px 16px;
                white-space: nowrap;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                gap: 12px;
            }
            
            #btn-sesion:hover{
                color: black;
                background-color: #ffb600;
                border: 2px #ffb600 solid;
                transition: 0.5s;
            }
            
            #btn-pedido{
                width: 190px;
                height: 45px;
                font-family: "Oswald";
                font-weight: 700;
                font-size: 16px;
                line-height: 16px;
                text-transform: uppercase;
                color: #fff;
                background-color: black;
                border: 2px white solid;
                border-radius: 32px;
                padding: 16px 16px;
                white-space: nowrap;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
            }
            
            #btn-pedido:hover{
                color: black;
                background-color: white;
                transition: 0.5s;
            }

            .dropdown li, .dropdown a{
                margin: 0;
                width: 100%;
                color: #ffffff; /* Color del texto */
            }
            
            .dropdown a:hover {
                background-color: #c62133; /* Color de fondo al pasar el ratón */
            }
            
            .checkbtn{
                font-size: 30px;
                color: white;
                float: right;
                line-height: 80px;
                margin-right: 40px;
                cursor: pointer;
                display: none;
            }
            
            #check{
                display: none;
            }
            
            @media only screen and (max-width: 1224px){


                .checkbtn{
                    display: block;
                    position: fixed;
                    right: 0;
                }
                
                .botones{
                    display: flex;
                    flex-direction: column;
                    gap: 30px;
                    background-color: none;
                }

                .botones div{
                    background-color: black;
                }

                .botones .dropdown li{
                    margin: 0;
                    background-color: #ee2737;
                }
                
                nav ul{
                    position: fixed;
                    display: block;
                    width: 100%;
                    height: 100vh;
                    background: black;
                    top: 100px;
                    left: -100%;
                    text-align: center;
                    transition: all .5s;
                    margin: 0;
                    padding-bottom: 100px;
                    overflow-y: scroll;
                }
                
                nav ul li{
                    margin: 50px 0;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }
                
                nav ul li button{
                    width: auto;
                    margin-top: 40px;
                }
                
                
                
                a:hover{
                    width: 100%;
                    background: none;
                    color: #0082e6;
                }
                
                #check:checked ~ ul{
                    left: 0;
                }
            }
    </style>
</head>
<body>

    <!-- MENU -->

    <nav>
        <label class="logo"><a href="index.php"><img src="../../imagenes/logo-burger.png" width="100" height="100"></a></label>

        <input type="checkbox" id="check">

        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <ul>
            <!-- añado enlaces basicos de la pagina -->
            <li><a href="index.php" id="btn-carta">INICIO</a></li>
            <li><a href="carta.php" id="btn-carta">CARTA</a></li>
            <li><a href="../Controlador/sobre-nosotros.php" id="btn-sn">SOBRE NOSOTROS</a></li>
            <li><a href="../Controlador/contacto.php" id="btn-sn">CONTACTO</a></li>
            <li class="botones" style="display: flex; align-items: center;">
                <!-- dependiendo de si se ha iniciado sesion o no te muestro diferentes botones -->
                <?php 
                if(isset($_SESSION["nombreUser"])){
                    ?>
                    <!-- si se ha iniciado sesion, un boton te permitira comenzar un pedido y redirigirte a 'pedido.php' -->
                    <!-- y además nos muestra un segundo boton con nuestro nombre y un desplegable para cerrar sesion-->
                    <a href="pedido.php"><button class="btn btn-primary me-2" id="btn-pedido" name="btn-pedido">Realizar Pedido</button></a>
                    <div class="dropdown">
                        <button class="btn btn-primary me-2s dropdown-toggle" id="btn-sesion" name="btn-sesion" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION["nombreUser"]; ?></button>
                        <ul class="dropdown-menu" aria-labelledby="btn-sesion" style="background-color: #ee2737;">
                            <li><a class="dropdown-item" href="../Controlador/cerrar-sesion.php">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                    <?php
                }else{
                    ?>
                    <!-- si se se ha iniciado sesion ambos botones te envian al inicio de sesion -->
                    <a href="inicio-sesion.php"><button class="btn btn-primary me-2" id="btn-pedido" name="btn-pedido">Realizar Pedido</button></a>
                    <a href="inicio-sesion.php"><button class="btn btn-primary me-2s" id="btn-sesion" name="btn-sesion">Iniciar Sesión</button></a>
                <?php 
                }
                ?>             
           </li>
        </ul>
  </nav>
    
</body>
</html>