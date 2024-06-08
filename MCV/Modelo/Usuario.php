<?php

require_once 'Conexion.php';

class Usuario{

    private $nombre;
    private $contrasenya;
    private $email;
    private $provincia;
    private $ciudad;
    private $direccion;
    private $telefono;
    private $conexion;
    
    function __construct($nombre, $clave, $correo, $provincia, $ciudad, $direccion, $telefono) {

        // Asignar valores a las propiedades
        $this->nombre = $nombre;
        $this->contrasenya = $clave;
        $this->email = $correo;
        $this->provincia = $provincia;
        $this->ciudad = $ciudad;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    
        try {
            // Intentar establecer la conexión
            $this->conexion = new Conexion();
        } catch (Exception $ex) {
            // Manejar la excepción adecuadamente, por ejemplo, loguearla o lanzarla nuevamente.
            die("Conexión rechazada: " . $ex->getMessage());
        }
    }
    
    
    function crearUser(){
                        
        //no se podrá crear dos usuarios con el mismo correo o el mismo telefono
        $consulta = $this->conexion->query("SELECT COUNT(*) FROM usuario WHERE email='$this->email' AND telefono='$this->telefono'");
        
        if($consulta->fetch()[0] > 0){
            $resultado = false;
        }else{
            $insertar = $this->conexion->exec("INSERT INTO usuario(nombre, contrasenya, email, telefono, provincia, ciudad, direccion, fecha_alta, id_rol) VALUES('$this->nombre','".password_hash($this->contrasenya, PASSWORD_DEFAULT)."','$this->email','$this->telefono','$this->provincia','$this->ciudad','$this->direccion', now(), '2')");
        
            if($insertar){
                $resultado = true;
            }else{
                $resultado = false;
            }
        }
        
        return $resultado;
    }

    function crearAdmin(){
                        
        //no se podrá crear dos usuarios con el mismo correo o el mismo telefono
        $consulta = $this->conexion->query("SELECT COUNT(*) FROM usuario WHERE email='$this->email' AND telefono='$this->telefono'");
        
        if($consulta->fetch()[0] > 0){
            $resultado = false;
        }else{
            $insertar = $this->conexion->exec("INSERT INTO usuario(nombre, contrasenya, email, telefono, provincia, ciudad, direccion, fecha_alta, id_rol) VALUES('$this->nombre','".password_hash($this->contrasenya, PASSWORD_DEFAULT)."','$this->email','$this->telefono','$this->provincia','$this->ciudad','$this->direccion', now(), '1')");
        
            if($insertar){
                $resultado = true;
            }else{
                $resultado = false;
            }
        }
        
        return $resultado;
    }
    
    function eliminar(){

        $eliminar = $this->conexion->exec("DELETE FROM usuario WHERE email='$this->email'");
    
        if($eliminar){
            $resultado = true;
        }else{
            $resultado = false;
        }
        
        return $resultado;
    }

    static function eliminarPorEmail($correo){

        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }

        try{
            $consultaEliminarUser = $conexion->prepare("DELETE FROM usuario WHERE email=?");
            $consultaEliminarUser->bindParam(1, $correo);

            if($consultaEliminarUser->execute()){
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

    static function eliminarPorTelefono($telefono){

        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }

        try{
            $consultaEliminarUser = $conexion->prepare("DELETE FROM usuario WHERE telefono=?");
            $consultaEliminarUser->bindParam(1, $telefono);

            if($consultaEliminarUser->execute()){
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
    
    
    static function esAdmin($email) {
        
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
        
        //usando el email con el qie se inicia sesión compruebo si el user es admin para redirigirlo a la web o al panel de admin
        $consultaTipoUser = $conexion->prepare("SELECT COUNT(*) FROM usuario WHERE email=:email AND id_rol='1'");
        $consultaTipoUser->bindParam(":email", $email);
        
        
        if($consultaTipoUser->execute()){
            if($consultaTipoUser->fetch()[0] > 0){
                $resultado = true;
            }else{
                $resultado = false;
            }
        }
        
        return $resultado;
    }
    
    static function emailExiste($email) {
        $resultado = false;
    
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
        
        try {
            $consultaEmailExiste = $conexion->prepare("SELECT * FROM usuario WHERE email=:email");
            $consultaEmailExiste->bindParam(":email", $email);
            
            if ($consultaEmailExiste->execute()) {
                if($consultaEmailExiste->rowCount() != 0){
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
    
    
    static function telefonoExiste($telefono){
        
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
        
        $consultaTelefonoExiste = $conexion->prepare("SELECT COUNT(*) FROM usuario WHERE telefono=:telefono");
        $consultaTelefonoExiste->bindParam(":telefono", $telefono);
        
        if($consultaTelefonoExiste->execute()){
            if($consultaTelefonoExiste->fetch()[0] > 0){
                $resultado = true;
            }else{
                $resultado = false;
            }
        }
        
        return $resultado;
    }

    static function existeID($id){
        
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
        
        $consultaIDExiste = $conexion->prepare("SELECT * FROM usuario WHERE id_user=:id");
        $consultaIDExiste->bindParam(":id", $id);
        
        if($consultaIDExiste->execute()){
            if(!empty($consultaIDExiste) || $consultaIDExiste != null){
                if($consultaIDExiste->fetch()[0] > 0){
                    $resultado = true;
                }else{
                    $resultado = false;
                }
            }
        }
        
        return $resultado;
    }
    
    static function contrasenyaCorrecta($email, $contrasenya) {
        $resultado = false;
    
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
    
        try {
            $consultaClave = $conexion->prepare("SELECT contrasenya FROM usuario WHERE email=:email");
            $consultaClave->bindParam(":email", $email);
    
            if ($consultaClave->execute()) {
                $contrasenyaHash = $consultaClave->fetchColumn();
    
                if ($contrasenyaHash !== false && password_verify($contrasenya, $contrasenyaHash)) {
                    $resultado = true;
                }
            }
        }catch(Exception $ex){
            die("Error en la consulta: " . $ex->getMessage());
        }finally{
            $conexion = null;
        }
    
        return $resultado;
    }
    
    
    static function obtenerNombre($email){
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
        
        $consultaNombre = $conexion->prepare("SELECT nombre FROM usuario WHERE email=:email");
        $consultaNombre->bindParam(":email", $email);
        
        if($consultaNombre->execute()){
            $nombre = $consultaNombre->fetch();
            return $nombre["nombre"];
        }
    }

    static function obtenerID($nombre){
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
        
        $consultaID = $conexion->prepare("SELECT id_user FROM usuario WHERE nombre=:nombre");
        $consultaID->bindParam(":nombre", $nombre);
        
        if($consultaID->execute()){
            $id = $consultaID->fetch();
            return $id;
        }
    }

    static function obtenerIDEmail($email){
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
        
        $consultaID = $conexion->prepare("SELECT id_user FROM usuario WHERE email=:email");
        $consultaID->bindParam(":email", $email);
        
        if($consultaID->execute()){
            $id = $consultaID->fetch();
            return $id;
        }
    }

    static function obtenerIDTelefono($telefono){
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
        
        $consultaID = $conexion->prepare("SELECT id_user FROM usuario WHERE telefono=:telefono");
        $consultaID->bindParam(":telefono", $telefono);
        
        if($consultaID->execute()){
            $id = $consultaID->fetch();
            return $id;
        }
    }

    static function obtenerPedidosUser($id_user){
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
        
        $consultaPedidos = $conexion->prepare("SELECT id_ped FROM pedido WHERE id_user=:id_user");
        $consultaPedidos->bindParam(":id_user", $id_user);
        
        if($consultaPedidos->execute()){
            $pedidos = $consultaPedidos->fetchAll();
            return $pedidos;
        }
    }
    
    static function obtenerRepartidorProvincia($id_user){
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
        
        $consultaProvincia = $conexion->prepare("SELECT provincia FROM usuario WHERE id_user=:id_user");
        $consultaProvincia->bindParam(":id_user", $id_user);
        
        if($consultaProvincia->execute()){
            $provincia = $consultaProvincia->fetch();

            $consultaProvinciaRep = $conexion->prepare("SELECT id_rep FROM repartidor WHERE provincia=:provincia");
            $consultaProvinciaRep->bindParam(":provincia", $provincia["provincia"]);

            if($consultaProvinciaRep->execute()){
                $repartidores = $consultaProvinciaRep->fetchAll();
                return $repartidores;
            }
        }
    }
}