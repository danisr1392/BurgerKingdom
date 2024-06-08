<?php

require_once 'Conexion.php';


class detallesPedido{

    private $id_ped;
    private $id_prod;
    private $cantidad;
    private $conexion;

    function __construct($id_ped, $id_prod, $cantidad) {

        //asignar valores a las propiedades
        $this->id_ped = $id_ped;
        $this->id_prod = $id_prod;
        $this->cantidad = $cantidad;
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
        
        $stmt = $this->conexion->prepare("INSERT INTO detallespedido(id_ped, id_prod, cantidad) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $this->id_ped);
        $stmt->bindParam(2, $this->id_prod);
        $stmt->bindParam(3, $this->cantidad);

        if($stmt->execute()){
            $resultado = true;
        }
    
        return $resultado;
    }    

    function eliminar(){

        $eliminar = $this->conexion->exec("DELETE FROM detallespedido WHERE id_ped='$this->id_ped'");
    
        if($eliminar){
            $resultado = true;
        }else{
            $resultado = false;
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
            $eliminarUno = $conexion->prepare("DELETE FROM detallespedido WHERE id_ped=?");
            $eliminarUno->bindParam(1, $id_ped);

            if($eliminarUno->execute()){
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