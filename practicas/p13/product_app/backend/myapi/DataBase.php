<?php
namespace TECWEB\MYAPI;
    abstract class DataBase{
        protected $conexion;
        protected $data;

        public function __construct($db, $user = 'root',$pass = 'Mivida243@.') {
            $this->data = array();
            $this->conexion = @mysqli_connect(
                'localhost',
                $user,
                $pass,
                $db
            );
            if(!$this->conexion) {
                die('¡Base de datos NO conextada!');
            }
        }

        public function getData() {
            return json_encode($this->data); 
        }
    }
?>