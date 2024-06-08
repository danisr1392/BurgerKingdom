<?php
    
    class Conexion extends PDO{     

        private $host = 'mysql:host=localhost;dbname=burgerkingdom';
        private $usuario = 'root';


        public function __construct() {

            parent::__construct($this->host, $this->usuario);
        }

    }
    
    $conexion = new Conexion();
