<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link type="text/css" rel="stylesheet" href="../../css/style-contacto.css">

    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <!-- Icono Web -->
    <link rel="shortcut icon" href="../../imagenes/logo-burger.png" />

    <title>Formulario de Contacto</title>
</head>
<body>
    <?php 
    //obtengo el menu
    require("../../html/menu.php");?>

    <main>
        <div class="container" style="padding: 115px 0;">
            <h1 class="text-center" style="padding-bottom: 75px; color: white;">CONTÁCTANOS</h1>
            <div class="contact__wrapper shadow-lg mt-n9">
                <div class="row no-gutters">
                    <!-- creo el cuadro de informacion -->
                    <div class="col-lg-5 contact-info__wrapper gradient-brand-color p-5 order-lg-2" style="background-color: lue;">
                        <h3 class="color--white mb-5">Permanece en Contacto</h3>
            
                        <ul class="contact-info__list list-style--none position-relative z-index-101">
                            <li class="mb-4 pl-4" style="padding-bottom: 20px;">
                                <span class="position-absolute"><i class="fas fa-envelope"></i></span> burgerkingdom@support.com
                            </li>
                            <li class="mb-4 pl-4" style="padding-bottom: 20px;">
                                <span class="position-absolute"><i class="fas fa-phone"></i></span> (+34) 877 24 72 40
                            </li>
                            <li class="mb-4 pl-4" style="padding-bottom: 20px;">
                                <span class="position-absolute"><i class="fas fa-map-marker-alt"></i></span> 
                                <span>Andalucía, España</span>
            
                                <div class="mt-3">
                                    <a href="https://www.google.es/maps/search/Burger+King+Andaluc%C3%ADa/@37.2184215,-4.6105769,8.33z?entry=ttu" target="_blank" class="text-link link--right-icon text-white">Localízanos<i class="link__icon fa fa-directions"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
            
                    <div class="col-lg-7 contact-form__wrapper p-5 order-lg-1">
                        <!-- creo el formulario con los campos necesarios -->
                        <form class="contact-form form-validate" method="post">
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label class="required-field" for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                                    </div>
                                </div>
            
                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label for="apellidos">Apellidos</label>
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
                                    </div>
                                </div>
            
                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label class="required-field" for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="abc123@email.com" required>
                                    </div>
                                </div>
            
                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label for="asunto">Asunto</label>
                                        <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Asunto" required>
                                    </div>
                                </div>
            
                                <div class="col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label class="required-field" for="problema">Explícanos tu problema</label>
                                        <textarea class="form-control" id="problema" name="problema" placeholder="Introduce tu mensaje..." style="min-height: 130px;" required></textarea>
                                    </div>
                                </div>
            
                                <div class="col-sm-12 mb-3">
                                    <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
                                </div>
            
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <?php 
    //obtengo el footer
    require_once("../../html/footer.php"); ?>
</body>
</html>