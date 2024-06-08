<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <!-- CSS -->
    <link type="text/css" rel="stylesheet" href="../../css/style-registro.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <!-- Icono Web -->
    <link rel="shortcut icon" href="../../imagenes/logo-burger.png"/>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <a href="index.php"><button id="btn-cancelar">Volver</button></a>
    <main class="img js-fullheight">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="login-wrap p-4 p-md-5">
                            <h1 class="mb-4 text-center">Regístrese</h1>
                            <!-- creo el formulario con todos los inputs necesarios -->
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="Introduce solo letras y espacios" required pattern="[A-Za-z\s]+" maxlength="20">
                                </div>
                                <div class="mb-3 password-wrapper">
                                    <label for="clave" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="clave" id="clave" placeholder="6 caracteres, con mínimo 1 número, 1 letra minúscula y otra mayúscula." required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" maxlength="25">
                                    <!-- icono para mostrar o no la contrasenya -->
                                    <span class="fa fa-fw fa-eye toggle-password" id="togglePassword"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" name="correo" placeholder="Introduce tu correo electrónico" required>
                                </div>
                                <div class="mb-3">
                                    <label for="provincia" class="form-label">Provincia</label>
                                    <select class="form-select" name="provincia" size="1">
                                        <option value='Almería'>Almería</option>
                                        <option value='Cádiz'>Cádiz</option>
                                        <option value='Córdoba'>Córdoba</option>
                                        <option value='Granada'>Granada</option>
                                        <option value='Huelva'>Huelva</option>
                                        <option value='Jaén'>Jaén</option>
                                        <option value='Málaga'>Málaga</option>
                                        <option value='Sevilla'>Sevilla</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="ciudad" class="form-label">Ciudad</label>
                                    <input type="text" class="form-control" name="ciudad" placeholder="Introduce tu ciudad" required maxlength="30">
                                </div>
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" name="direccion" placeholder="Introduce tu dirección y el número de vivienda" required maxlength="50">
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" name="telefono" placeholder="Introduce tu teléfono" maxlength="9" required pattern="\d{9}">
                                </div>                            
                                <div class="mb-3">
                                    <a href="inicio-sesion.php" id="link-is" class="iniSesion-link">¿Ya tienes una cuenta?</a>
                                </div>
                                <?php require("registro-error.php"); ?>
                                <div class="form-group" style="margin-top: 30px;">
                                    <button type="submit" name="enviar-reg" class="form-control btn btn-danger submit px-3">Registrarme</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        //cada vez que se hace click en el boton del ojo, el input cambia de type, alternando entre text y password, cambiando tambien el icono
        document.getElementById('togglePassword').addEventListener('click', function (e) {
            const contrasenya = document.getElementById('clave');
            const type = contrasenya.getAttribute('type') === 'password' ? 'text' : 'password';
            contrasenya.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
