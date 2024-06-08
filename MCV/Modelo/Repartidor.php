<?php

require_once 'Conexion.php';

class Repartidor{

    private $dni;
    private $nombre;
    private $apellido;
    private $provincia;
    private $telefono;
    private $conexion;
    
    function __construct($dni, $nombre, $apellido, $provincia, $telefono) {

        // Asignar valores a las propiedades
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->provincia = $provincia;
        $this->telefono = $telefono;
    
        try {
            // Intentar establecer la conexión
            $this->conexion = new Conexion();
        } catch (Exception $ex) {
            // Manejar la excepción adecuadamente, por ejemplo, loguearla o lanzarla nuevamente.
            die("Conexión rechazada: " . $ex->getMessage());
        }
    }

    function crear(){
                        
        $consulta = $this->conexion->query("SELECT COUNT(*) FROM repartidor WHERE dni='$this->dni'");
        
        if($consulta->fetch()[0] > 0){
            $resultado = false;
        }else{
            $insertar = $this->conexion->exec("INSERT INTO repartidor(dni, nombre, apellido, provincia, telefono) VALUES('$this->dni','$this->nombre','$this->apellido','$this->provincia','$this->telefono')");
        
            if($insertar){
                $resultado = true;
            }else{
                $resultado = false;
            }
        }
        
        return $resultado;
    }

    function eliminar(){

        $eliminar = $this->conexion->exec("DELETE FROM repartidor WHERE dni='$this->dni'");
    
        if($eliminar){
            $resultado = true;
        }else{
            $resultado = false;
        }
        
        return $resultado;
    }

    static function eliminarPorDNI($dni){

        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }

        try{
            $consultaEliminarRep = $conexion->prepare("DELETE FROM repartidor WHERE dni=?");
            $consultaEliminarRep->bindParam(1, $dni);

            if($consultaEliminarRep->execute()){
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

    static function dniExiste($dni) {
        $resultado = false;
    
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
        
        try {
            $consultaDNIExiste = $conexion->prepare("SELECT * FROM repartidor WHERE dni=:dni");
            $consultaDNIExiste->bindParam(":dni", $dni);
            
            if ($consultaDNIExiste->execute()) {
                if($consultaDNIExiste->rowCount() != 0){
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

}