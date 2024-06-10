<?php
require_once("../Modelo/Producto.php");
require_once("../Modelo/Usuario.php");
require_once("../Modelo/Ingrediente.php");

// si no se entra con la cookie de usuario admin te echa
if (!isset($_SESSION["nombreAdmin"])) {
    echo "Inicie sesión como administrador para acceder a esta página.";
    exit;
}else{
    // obtengo el id del usuario para mostrarlo luego usando su correo
    $id = Usuario::obtenerIDEmail($_SESSION["correoAdmin"]);

    //compruebo que el id contiene algun valor
    if(empty($id)){
        //en caso de que se pueda eliminar el propio perfil que tenemos puesto
            echo "Inicie sesión como administrador para acceder a esta página.";
            exit;
    } 
}

$productos = Producto::obtenerProductos(); //obtengo un array con los valores de los productos
$ingredientes = Ingrediente::getTodos(); //obtengo un array con los valroes de los ingredientes

//creo un array para guardar los productos por su tipo (este array lo uso luego en el script js)
$productosPorTipo = [];

//guardo los datos de cada producto asociados con su tipo para luego filtrar
foreach ($productos as $producto) {
    $productosPorTipo[$producto['tipo']][] = $producto;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="text/css" rel="stylesheet" href="../../css/style-admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="shortcut icon" href="../../imagenes/logo-burger.png" />
    <title>Burger Kingdom</title>
</head>
<body>
<main>
    <div style="display: flex; align-items: center; justify-content: center; padding: 10px; gap: 12px;">
        <a href="../Controlador/cerrar-sesion.php" id="link-cerrar">
            <button class="btn btn-primary me-2s" id="btn-cerrar" name="btn-cerrar" aria-expanded="false">Cerrar Sesión</button>
        </a>
        <button id="btn-atras" class="btn-atras" aria-expanded="false">Atrás</button>
    </div>
    <h1 class="text-center" id="h1-bv" style="text-decoration: underline white;">Bienvenido, <?php echo $_SESSION["nombreAdmin"] ?></h1>

    <div class="container-fluid" id="container-img">
        <div class="image-container" data-formulario-id="formulario1a">
            <img src="../../imagenes/paneladmin/nuevo-producto.png" class="img-fluid">
            <h1>Añadir Producto</h1>
        </div>
        <div class="image-container" data-formulario-id="formulario2">
            <img src="../../imagenes/paneladmin/borrar-producto.png" class="img-fluid">
            <h1>Borrar Producto</h1>
        </div>
        <div class="image-container" data-formulario-id="formulario3">
            <img src="../../imagenes/paneladmin/agregar-usuario.png" class="img-fluid">
            <h1>Añadir Admin</h1>
        </div>
        <div class="image-container" data-formulario-id="formulario4">
            <img src="../../imagenes/paneladmin/eliminar-usuario.png" class="img-fluid">
            <h1>Eliminar Usuario</h1>
        </div>
        <div class="image-container" data-formulario-id="formulario5">
            <img src="../../imagenes/paneladmin/repartidor.png" class="img-fluid">
            <h1>Añadir Repartidor</h1>
        </div>
        <div class="image-container" data-formulario-id="formulario6">
            <img src="../../imagenes/paneladmin/eliminar-repartidor.png" class="img-fluid">
            <h1>Eliminar Repartidor</h1>
        </div>
    </div>


    <!-- FORMULARIOS -->

    <!------------------------->
    <!--- AÑADIR PRODUCTO 1 --->
    <!------------------------->
    <div class="container form formulario1" id="formulario1a">
        <form id="form1a">
            <h2>AÑADIR PRODUCTO</h2>
            <div style="width: 88%;"><span class="text-start">Nombre</span></div>
            <input type="text" placeholder="Introduzca el nombre del producto" id="nombre" name="nombre" maxlength="20" required>
            <div style="width: 88%;"><span class="text-start">Descripción</span></div>
            <input type="textarea" placeholder="Introduzca la descripcion del producto" id="descripcion" name="descripcion" required maxlength="50">
            <div style="width: 88%;"><span class="text-start">Precio</span></div>
            <input type="text" step="any" placeholder="1.00" id="precio" name="precio" required maxlength="10">
            <div style="width: 88%;"><span class="text-start">Tipo</span></div>
            <select name="tipo" id="tipo" placeholder="Tipo">
                <option value="Hamburguesa">Hamburguesa</option>
                <option value="Snack">Snack</option>
                <option value="Bebida">Bebida</option>
            </select>
            <div style="width: 88%;"><span class="text-start">URL Imagen</span></div>
            <input type="text" placeholder="Introduzca el enlace de la imagen" id="url-img" name="url-img" required>
            <input type="text" id="id-user" name="id-user" value="<?php echo $id["id_user"]; ?>" hidden>
            <button type="button" id="continuar">Continuar</button>
        </form>
    </div>

    <!------------------------->
    <!--- AÑADIR PRODUCTO 2 --->
    <!------------------------->
    <div class="container form formulario1" id="formulario1b" style="display:none;">
        <form id="form1b" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return verificarIngredientes()">
            <h2>AÑADIR PRODUCTO</h2>
            
            <div style="width: 88%; margin-top: 20px; padding-bottom: 20px;"><span class="text-start">Ingredientes</span></div>
            <div class="ingredientes-container">
                <?php foreach ($ingredientes as $ingrediente){ ?>
                    <div class="ingrediente">
                        <input type="checkbox" id="ingrediente_<?php echo $ingrediente['id_ingr']; ?>" name="ingredientes[]" value="<?php echo $ingrediente['id_ingr']; ?>" style="display: none;">
                        <img src="<?php echo $ingrediente['imagen']; ?>" alt="<?php echo $ingrediente['nombre']; ?>" class="ingrediente-img" data-id="<?php echo $ingrediente['id_ingr']; ?>" style="width: 128px; height: 128px; cursor: pointer;">
                        <label for="ingrediente_<?php echo $ingrediente['id_ingr']; ?>"><?php echo $ingrediente['nombre']; ?></label>
                    </div>
                <?php } ?>
            </div>

            <button type="submit" name="subir-producto">Subir</button>
        </form>
    </div>



    <!------------------------>
    <!--- BORRAR PRODUCTO  --->
    <!------------------------>
    <div class="container form" id="formulario2">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return validarFormulario()">
            <h2>ELIMINAR PRODUCTO</h2>

            <div style="width: 88%;"><span class="text-start">Tipo de producto a eliminar</span></div>
            <select id="tipoProducto" name="tipoProducto">
                <option value="">Seleccione un tipo de producto</option>
                <?php foreach ($productosPorTipo as $tipo => $productos) { ?>
                    <option value="<?php echo $tipo; ?>"><?php echo $tipo; ?></option>
                <?php } ?>
            </select>

            <div style="width: 88%;"><span class="text-start">Producto a eliminar</span></div>
            <select id="producto" name="producto" disabled>
                <option value="">Seleccione un producto</option>
            </select>

            <button type="submit" name="borrar-prod">Eliminar</button>
        </form>
    </div>


    <!-------------------->
    <!--- AÑADIR ADMIN --->
    <!-------------------->
    <div class="container form" id="formulario3">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h2>AÑADIR ADMIN</h2>
            <div style="width: 88%;"><span class="text-start">Nombre</span></div>
            <input type="text" placeholder="Introduzca su nombre" name="nombre" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{1,30}$" required maxlength="30">
            <div style="width: 88%;"><span class="text-start">Contraseña</span></div>
            <input type="password" placeholder="Introduzca una clave de mínimo 6 caracteres" name="contrasenya" pattern="^.{6,}$" required maxlength="25">
            <div style="width: 88%;"><span class="text-start">Email</span></div>
            <input type="email" placeholder="Introduzca un email" name="email" required maxlength="60">
            <div style="width: 88%;"><span class="text-start">Teléfono</span></div>
            <input type="text" placeholder="Introduzca un número de 9 caracteres" name="telefono" maxlength="9" pattern="^\d{9}$" required>
            <div style="width: 88%;"><span class="text-start">Provincia</span></div>
            <select class="form-select" name="provincia">
                <option value='Almería'>Almería</option>
                <option value='Cádiz'>Cádiz</option>
                <option value='Córdoba'>Córdoba</option>
                <option value='Granada'>Granada</option>
                <option value='Huelva'>Huelva</option>
                <option value='Jaén'>Jaén</option>
                <option value='Málaga'>Málaga</option>
                <option value='Sevilla'>Sevilla</option>
            </select>
            <div style="width: 88%;"><span class="text-start">Ciudad</span></div>
            <input type="text" placeholder="Introduzca su ciudad" name="ciudad" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s,.-]{3,20}$" required maxlength="20">
            <div style="width: 88%;"><span class="text-start">Direccion</span></div>
            <input type="text" placeholder="Introduzca su dirección" name="direccion" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s,.-]{3,50}$" required maxlength="50">
            <button type="submit" name="add-admin">Subir</button>
        </form>
    </div>

    <!------------------------>
    <!--- ELIMINAR USUARIO --->
    <!------------------------>
    <div class="container form" id="formulario4">
        <form id="eliminarUsuarioForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return validarFormularioUser()">
            <h2>ELIMINAR USUARIO</h2>
            <div style="width: 88%;"><span class="text-start">Correo del usuario</span></div>
            <input type="email" id="correo" placeholder="Correo del usuario a eliminar" name="correo">
            <div style="width: 88%;"><span class="text-start">Teléfono del usuario</span></div>
            <input type="text" id="telefono" placeholder="Teléfono del usuario a eliminar" pattern="^\d{9}$" maxlength="9" name="telefono">
            <button type="submit" name="borrar-user">Enviar</button>
        </form>
    </div>


    <!------------------------->
    <!--- AÑADIR REPARTIDOR --->
    <!------------------------->
    <div class="container form" id="formulario5">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h2>AÑADIR REPARTIDOR</h2>
            <div style="width: 88%;"><span class="text-start">DNI</span></div>
            <input type="text" placeholder="Introduce tu DNI" name="dni" pattern="\d{8}[A-Z]" maxlength="9" required>
            <div style="width: 88%;"><span class="text-start">Nombre</span></div>
            <input type="text" placeholder="Introduzca su nombre" name="nombre" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{1,30}$" required>
            <div style="width: 88%;"><span class="text-start">Apellidos</span></div>
            <input type="text" placeholder="Introduzca sus apellidos" name="apellidos" pattern="[A-Za-z\s]+" maxlength="30" required>
            <div style="width: 88%;"><span class="text-start">Provincia</span></div>
            <select class="form-select" name="provincia">
                <option value='Almería'>Almería</option>
                <option value='Cádiz'>Cádiz</option>
                <option value='Córdoba'>Córdoba</option>
                <option value='Granada'>Granada</option>
                <option value='Huelva'>Huelva</option>
                <option value='Jaén'>Jaén</option>
                <option value='Málaga'>Málaga</option>
                <option value='Sevilla'>Sevilla</option>
            </select>
            <div style="width: 88%;"><span class="text-start">Teléfono</span></div>
            <input type="text" placeholder="Introduzca un número de 9 caracteres" name="telefono" maxlength="9" pattern="^\d{9}$" required>
            <button type="submit" name="add-rep">Subir</button>
        </form>
    </div>
                

    <!--------------------------->
    <!--- ELIMINAR REPARTIDOR --->
    <!--------------------------->
    <div class="container form" id="formulario6">
        <form id="eliminarRepartidor" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h2>ELIMINAR REPARTIDOR</h2>
            <div style="width: 88%;"><span class="text-start">DNI del repartidor</span></div>
            <input type="text" id="dni" placeholder="DNI del repartidor a eliminar" name="dni" pattern="\d{8}[A-Z]" maxlength="9" required>
            <button type="submit" name="borrar-rep">Enviar</button>
        </form>
    </div>

</main>
<?php require("../../html/footer.php"); ?>
<script>
        $(document).ready(function() {
            // Oculto los forms y el botón de atrás al cargar la página
            $(".form").hide();
            $("#btn-atras").css("display", "none");


            /////////////////////////////////////
            ///FUNCIONALIDAD IMAGEN-FORMULARIO///
            /////////////////////////////////////

            //al hacer click en una de las imágenes, las oculto todas y abro el formulario correspondiente (además el botón de atrás es visible)
            $(".image-container").click(function() {
                //oculto las imagenes
                $("#container-img").css("display", "none");

                //obtengo el id del form a mostrar
                var formularioID = $(this).data("formulario-id");
                
                //muestro el form y el boton de atras
                $("#" + formularioID).css("display", "flex");
                $("#btn-atras").css("display", "flex");
            });


            /////////////////
            ///BOTON ATRÁS///
            /////////////////

            // el botón de atrás solo se muestra cuando haya un formulario en pantalla
            $(".btn-atras").click(function() {
                $(".form").hide(); //oculto el form que se este mostrando
                $(".btn-atras").css("display", "none"); //oculto el boton
                $("#container-img").css("display", "flex"); //vuelvo a mostrar las imagenes
            });


            /////////////////////////////
            ///BOTON CONTINUAR FORM 1A///
            /////////////////////////////

            //manejo del botón "continuar" en el formulario1a
            $("#continuar").click(function() {
                // obtengo los valores de los inputs
                var nombre = $("#nombre").val();
                var descripcion = $("#descripcion").val();
                var precio = $("#precio").val();
                var tipo = $("#tipo").val();
                var url = $("#url-img").val();
                var id_user = $("#id-user").val();

                //verifico que los campos no estén vacíos y que el precio sea un número
                if (nombre && descripcion && precio && tipo && url) {
                    //si el precio es un numero seguimos
                    if (!isNaN(precio)) {
                        //guardo los valores en localStorage
                        localStorage.setItem('nombre', nombre);
                        localStorage.setItem('descripcion', descripcion);
                        localStorage.setItem('precio', precio);
                        localStorage.setItem('tipo', tipo);
                        localStorage.setItem('url', url);
                        localStorage.setItem('id_user', id_user);

                        //oculto el formulario1a y muestro el formulario1b
                        $("#formulario1a").hide();
                        $("#formulario1b").show();

                        //añado varios inputs con los valores anteriores al formulario b para operar con esos datos mas tarde
                        if(localStorage.getItem('nombre')) {
                            $("#form1b input[type='text']").remove(); //elimino los inputs ocultos anteriores si existen
                            $("#form1b").prepend('<input type="text" id="nombre" name="nombre" value="' + localStorage.getItem('nombre') + '" hidden>');
                            $("#form1b").prepend('<input type="text" id="nomdescripcion" name="descripcion" value="' + localStorage.getItem('descripcion') + '" hidden>');
                            $("#form1b").prepend('<input type="text" id="precio" name="precio" value="' + localStorage.getItem('precio') + '" hidden>');
                            $("#form1b").prepend('<input type="text" id="tipo" name="tipo" value="' + localStorage.getItem('tipo') + '" hidden>');
                            $("#form1b").prepend('<input type="text" id="url" name="url-img" value="' + localStorage.getItem('url') + '" hidden>');
                            $("#form1b").prepend('<input type="text" id="id-user" name="id-user" value="' + localStorage.getItem('id_user') + '" hidden>');
                        }
                    } else {
                        alert("Por favor, introduzca un precio válido.");
                    }
                } else {
                    alert("Por favor, complete todos los campos.");
                }
            });


        });


        //////////////////////////
        ///INGREDIENTES FORM 1B///
        //////////////////////////

        $('.ingrediente-img').click(function() {
            //cuando hago click en la imagen obtengo su id y luego su checkbox asociado
            var id = $(this).data('id');
            var checkbox = $('#ingrediente_' + id);

            //compruebo que esté seleccionado y cambio su clase para que sea distinto de los no seleccionados
            if (checkbox.is(':checked')) {
                checkbox.prop('checked', false);
                $(this).removeClass('selected');
            } else {
                checkbox.prop('checked', true);
                $(this).addClass('selected');
            }
        });

        //////////////////////////////////////
        ///SELECCIONAR INGREDIENTES FORM 1B///
        //////////////////////////////////////

        function verificarIngredientes() {
            //obtener todos los checkboxes con el nombre 'ingredientes[]'
            var checkbox = document.querySelectorAll('input[name="ingredientes[]"]');

            var seleccionados = 0;

            // cuento cuantos checkboxes están seleccionados
            for (var i = 0; i < checkbox.length; i++) {
                if (checkbox[i].checked) {
                    seleccionados++;
                }
            }

            // verifico que haya al menos 2 ingredientes checked
            if (seleccionados < 2) {
                alert('Por favor, selecciona al menos dos ingredientes.');
                return false; // evito el envío del formulario
            }

            //permito el envio
            return true; 
        }
        


        //////////////////////////////
        /// FUNCIÓN SELECTS FORM 2 ///
        //////////////////////////////

        // uso js para actualizar dinámicamente el segundo select
        document.addEventListener('DOMContentLoaded', function () {
            const productosPorTipo = <?php echo json_encode($productosPorTipo); ?>; //obtengo el array con todos los productos por tipo
            const tipoProductoSelect = document.getElementById('tipoProducto'); //obtengo el tipo que haya seleccionado
            const productoSelect = document.getElementById('producto');

            //cada vez que el primer select cambia de contenido->
            tipoProductoSelect.addEventListener('change', function () {
                //obtengo el valor que tenga ahora el primer select
                const selectedTipo = tipoProductoSelect.value;

                //limpio las opciones actuales del segundo select
                productoSelect.innerHTML = '<option value="">Seleccione un producto</option>';
                //no permito que se seleccione de momento
                productoSelect.disabled = true;

                //usando el array creado al principio del script obtengo todos los productos por tipo que haya
                if (selectedTipo && productosPorTipo[selectedTipo]) {
                    //por cada producto...
                    productosPorTipo[selectedTipo].forEach(function (producto) {

                        //creo una opcion para el select por cada prod
                        const option = document.createElement('option');
                        option.value = producto.id_prod; //en value pongo su id
                        option.text = `${producto.nombre}`; //muestro su nombre
                        productoSelect.appendChild(option); //añado la opcion
                    });
                    productoSelect.disabled = false; //permito que se pueda seleccionar algo en el seundo select
                }
            });
        });   

        ///////////////////////////////////
        /// FUNCIÓN COMPROBACIÓN FORM 2 ///
        ///////////////////////////////////

        // valido el formulario antes de enviarlo para comprobar que se ha seleccionado un producto
        function validarFormulario() {
            //obtengo por su id el contenido del segundo select
            const productoSelect = document.getElementById('producto');
            //si su valor es ""(osea, la primera opcion) se anula el envio y muestro una alerta
            if (productoSelect.value === "") {
                alert("Por favor, seleccione un producto para eliminar.");
                return false;
            }else{
                //si contiene algun valor, se envia el form
                return true
            }
        }

        
        /////////////////////////////////
        ///FUNCION COMPROBACIÓN FORM 4///
        /////////////////////////////////

        //funcion para comprobar que el form tiene como minimo 1 input con valor
        function validarFormularioUser() {
            // Obtengo los valores de los dos inputs
            var correo = document.getElementById('correo').value.trim();
            var telefono = document.getElementById('telefono').value.trim();
            
            if (correo === "" && telefono === "") {
                alert("Ingrese al menos un correo electrónico o un número de teléfono.");
                return false; //evito que el formulario se envíe
            }

            return true; //permite el envío del formulario
        }
    </script>
</body>
</html>
