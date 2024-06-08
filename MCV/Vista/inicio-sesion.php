<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    
    <!-- CSS -->
    <link type="text/css" rel="stylesheet" href="../../css/style-inicio.css">

    <!-- Bootstrap CSS y JS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Icono Web -->
    <link rel="shortcut icon" href="../../imagenes/logo-burger.png"/>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
</head>

<body>    
    <a href="index.php"><button id="btn-cancelar">Volver</button></a>
    <main class="img js-fullheight">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <h1 class="mb-4 text-center">Bienvenido</h1>
                            <form class="signin-form" method="post">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group password-container" style="margin-top: 15px;">
                                    <label class="form-label">Contraseña</label>
                                    <input id="password" type="password" class="form-control" name="clave" placeholder="Contraseña" required>
                                    <i class="fas fa-eye toggle-password"></i>
                                </div>
                                <div class="form-group" style="margin-top: 10px;">
                                    <a href="registro.php" style="text-decoration: none; color: darkgrey"><span id="enlace_registro">¿No tienes cuenta? Regístrate</span></a>
                                </div>
                                <div class="form-group" style="margin-top: 10px;">
                                    <?php require_once("inicio-sesion-error.php"); ?>
                                </div>
                                <div class="form-group" style="margin-top: 30px;">
                                    <button type="submit" name="ini-sesion" class="form-control btn btn-danger submit px-3">Iniciar Sesión</button>
                                </div>
                            </form>
                
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        $(document).ready(function() {
            //al hacer click en el boton del ojo -->
            $('.toggle-password').click(function() {
                var input = $('#password');
                var icon = $(this);
                //cuando se hace click en el ícono, se alterna el tipo del input entre password y text(y tambien varia el icono)
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text'); //cambio el tipo a texto
                    icon.removeClass('fa-eye').addClass('fa-eye-slash'); //cambio el icono
                } else {
                    input.attr('type', 'password'); //cambio el tipo a contrasenya
                    icon.removeClass('fa-eye-slash').addClass('fa-eye'); //cambio el icono
                }
            });
        });
    </script>
</body>

</html>