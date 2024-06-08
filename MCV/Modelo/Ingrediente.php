<?php

require_once 'Conexion.php';


class Ingrediente{

    private $nombre;
    private $url;
    private $conexion;

    function __construct($nombre, $url) {

        //asignar valores a las propiedades
        $this->nombre = $nombre;
        $this->url = $url;

        try {
            //intentar establecer la conexión
            $this->conexion = new Conexion();
        } catch (Exception $ex) {
            // manejar la excepción adecuadamente, por ejemplo, loguearla o lanzarla nuevamente.
            die("Conexión rechazada: " . $ex->getMessage());
        }
    }

    function crear(){
        $resultado = false;
    
        $stmt = $this->conexion->prepare("INSERT INTO ingrediente(nombre, imagen) VALUES (?, ?)");
        
        // Enlazar los parámetros
        $stmt->bindParam(1, $this->nombre);
        $stmt->bindParam(2, $this->url);
        
        // Ejecutar la consulta
        if($stmt->execute()){
            $resultado = true;
        }
    
        return $resultado;
    }  

    function eliminar(){

        $eliminar = $this->conexion->exec("DELETE FROM ingrediente WHERE nombre='$this->nombre'");
    
        if($eliminar){
            $resultado = true;
        }else{
            $resultado = false;
        }
        
        return $resultado;
    }

    static function getTodos(){
        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }
        
        $consultaIngredientes = $conexion->query("SELECT * FROM ingrediente");
        
        if($consultaIngredientes->execute()){
            $ingredientes = $consultaIngredientes->fetchAll();
            return $ingredientes;
        }
    }
}