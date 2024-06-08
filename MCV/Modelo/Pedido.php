<?php

require_once 'Conexion.php';


class Pedido{

    private $precio;
    private $id_user;
    private $id_rep;
    private $conexion;

    
    function __construct($precio, $id_user, $id_rep) {

        // Asignar valores a las propiedades
        $this->precio = $precio;
        $this->id_user = $id_user;
        $this->id_rep = $id_rep;
    
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
    
        $stmt = $this->conexion->prepare("INSERT INTO pedido(precio, metodo_pago, fecha_entrega, id_user, id_rep) VALUES (?, 'Paypal', now(), ?, ?)");
        
        // Enlazar los parámetros
        $stmt->bindParam(1, $this->precio);
        $stmt->bindParam(2, $this->id_user);
        $stmt->bindParam(3, $this->id_rep);
        
        // Ejecutar la consulta
        if($stmt->execute()){
            $resultado = true;
        }
    
        return $resultado;
    }    

    static function eliminarUno($id_ped){

        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }

        try{
            $consultaEliminarProducto = $conexion->prepare("DELETE FROM pedido WHERE id_ped=?");
            $consultaEliminarProducto->bindParam(1, $id_ped);

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

    static function obtenerUltimoID() {
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
    
        try {
            //obtengo el id mas grande de la tabla 'pedido'
            $consultaUltimoID = $conexion->prepare("SELECT MAX(id_ped) as max_id FROM pedido");
    
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