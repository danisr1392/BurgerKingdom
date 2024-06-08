<?php

require_once 'Conexion.php';


class detallesProducto{

    private $id_prod;
    private $id_ingr;
    private $conexion;

    function __construct($id_prod, $id_ingr) {

        //asignar valores a las propiedades
        $this->id_prod = $id_prod;
        $this->id_ingr = $id_ingr;

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
        
        $stmt = $this->conexion->prepare("INSERT INTO detallesproducto(id_prod, id_ingr) VALUES (?, ?)");
        $stmt->bindParam(1, $this->id_prod);
        $stmt->bindParam(2, $this->id_ingr);

        if($stmt->execute()){
            $resultado = true;
        }
    
        return $resultado;
    }    

    function eliminar(){

        $eliminar = $this->conexion->exec("DELETE FROM detallesproducto WHERE id_prod='$this->id_prod'");
    
        if($eliminar){
            $resultado = true;
        }else{
            $resultado = false;
        }
        
        return $resultado;
    }

    static function eliminarPorProd($id_prod){

        try {
            $conexion = new Conexion();
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
        } catch (Exception $ex) {
            die("Conexión rechazada: " . $ex->getMessage());
        }

        try{
            $eliminarPorProducto = $conexion->prepare("DELETE FROM detallesproducto WHERE id_prod=?");
            $eliminarPorProducto->bindParam(1, $id_prod);

            if($eliminarPorProducto->execute()){
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
}