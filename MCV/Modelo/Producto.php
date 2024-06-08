<?php

require_once 'Conexion.php';


class Producto{

    private $nombre;
    private $descripcion;
    private $precio;
    private $id_user;
    private $tipo;
    private $imagen;
    private $conexion;

    
    function __construct($nombre, $descripcion, $precio, $id_user, $tipo, $imagen) {

        // Asignar valores a las propiedades
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->id_user = $id_user;
        $this->tipo = $tipo;
        $this->imagen = $imagen;
    
        try {
            // Intentar establecer la conexión
            $this->conexion = new Conexion();
        } catch (Exception $ex) {
            // Manejar la excepción adecuadamente, por ejemplo, loguearla o lanzarla nuevamente.
            die("Conexión rechazada: " . $ex->getMessage());
        }
    }

    function crear(){
        $resultado = false;
    
        // Verificar si ya existe un producto con el mismo nombre
        $consulta = $this->conexion->query("SELECT COUNT(*) FROM producto WHERE nombre='$this->nombre'");
    
        // Obtener el resultado de la consulta
        $existeProducto = $consulta->fetchColumn();
    
        // Si no existe un producto con el mismo nombre, proceder a crearlo
        if($existeProducto == 0){
            // Preparar la consulta para insertar el nuevo producto
            $stmt = $this->conexion->prepare("INSERT INTO producto(nombre, descripcion, precio, id_user, tipo, imagen) VALUES (?, ?, ?, ?, ?, ?)");
            
            // Enlazar los parámetros
            $stmt->bindParam(1, $this->nombre);
            $stmt->bindParam(2, $this->descripcion);
            $stmt->bindParam(3, $this->precio);
            $stmt->bindParam(4, $this->id_user);
            $stmt->bindParam(5, $this->tipo);
            $stmt->bindParam(6, $this->imagen);
            
            // Ejecutar la consulta
            if($stmt->execute()){
                $resultado = true;
            }
        }
    
        return $resultado;
    }    
    
    function eliminar(){
                                
        $eliminar = $this->conexion->exec("DELETE FROM producto WHERE nombre='$this->nombre'");
    
        if($eliminar){
            $resultado = true;
        }else{
            $resultado = false;
        }
        
        return $resultado;
        
    }

    static function eliminarUno($id){

        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }

        try{
            $consultaEliminarProducto = $conexion->prepare("DELETE FROM producto WHERE id_prod=?");
            $consultaEliminarProducto->bindParam(1, $id);

            if($consultaEliminarProducto->execute()){
                $resultado = true;
            }else{
                $resultado = false;
            }
        }catch(Exception $ex){
            die("Error en la consulta: " . $ex->getMessage());
        }finally{
            $conexion = null;
        }

        return $resultado;

    }

    static function nombreExiste($nombre) {
        $resultado = false;
    
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
        
        try {
            $consultaNombreExiste = $conexion->prepare("SELECT * FROM producto WHERE nombre=:nombre");
            $consultaNombreExiste->bindParam(":nombre", $nombre);
            
            if ($consultaNombreExiste->execute()) {
                if($consultaNombreExiste->rowCount() != 0){
                    $resultado = true;
                }
            }
        } catch (Exception $ex) {
            die("Error en la consulta: " . $ex->getMessage());
        } finally {
            $conexion = null;
        }
    
        return $resultado;
    }

    static function obtenerProductos() {
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }

        try {
            $consultaObtenerProductos = $conexion->query("SELECT * FROM producto ORDER BY tipo");

            if ($consultaObtenerProductos) {
                $resultado = $consultaObtenerProductos->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $ex) {
            die("Error en la consulta: " . $ex->getMessage());
        } finally {
            $conexion = null;
        }

        return $resultado;
    }

    static function obtenerBurgers(){

        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }

        try{
            $consultaObtenerProductos = $conexion->query("SELECT * FROM producto WHERE tipo='Hamburguesa' ORDER BY nombre");

            if($consultaObtenerProductos){
                $resultado = $consultaObtenerProductos->fetchAll();
            }
        }catch(Exception $ex){
            die("Error en la consulta: " . $ex->getMessage());
        }finally{
            $conexion = null;
        }

        return $resultado;

    }

    static function obtenerSnacks(){

        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }

        try{
            $consultaObtenerProductos = $conexion->query("SELECT * FROM producto WHERE tipo='Snack' ORDER BY nombre");

            if($consultaObtenerProductos){
                $resultado = $consultaObtenerProductos->fetchAll();
            }
        }catch(Exception $ex){
            die("Error en la consulta: " . $ex->getMessage());
        }finally{
            $conexion = null;
        }

        return $resultado;

    }

    static function obtenerBebidas(){

        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }

        try{
            $consultaObtenerProductos = $conexion->query("SELECT * FROM producto WHERE tipo='Bebida' ORDER BY nombre");

            if($consultaObtenerProductos){
                $resultado = $consultaObtenerProductos->fetchAll();
            }
        }catch(Exception $ex){
            die("Error en la consulta: " . $ex->getMessage());
        }finally{
            $conexion = null;
        }

        return $resultado;

    }

    static function obtenerUno($nombre){

        try{
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }

        try{
            $consultaObtenerProductos = $conexion->prepare("SELECT * FROM producto WHERE nombre=?");
            $consultaObtenerProductos->bindParam(1, $nombre);

            if($consultaObtenerProductos->execute()){
                $resultado = $consultaObtenerProductos->fetchAll();
            }
        }catch(Exception $ex){
            die("Error en la consulta: " . $ex->getMessage());
        }finally{
            $conexion = null;
        }

        return $resultado;

    }

    static function obtenerUltimoID() {
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
    
        try {
            //obtengo el id mas grande
            $consultaUltimoID = $conexion->prepare("SELECT MAX(id_prod) as max_id FROM producto");
    
            if ($consultaUltimoID->execute()) {
                $resultado = $consultaUltimoID->fetch();
                $ultimoID = $resultado['max_id'];
            }
        } catch (Exception $ex) {
            die("Error en la consulta: " . $ex->getMessage());
        } finally {
            $conexion = null;
        }
    
        return $ultimoID;
    }

}