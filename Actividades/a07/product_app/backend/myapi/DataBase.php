<?php
namespace conexion\DataBases;
    abstract class DataBase{
        protected $conexion;

        public function __construct($user, $pass ,$db) {
            $this->conexion = @mysqli_connect(
                $user,
                'root',
                $pass,
                $db
            );
        }
    }
?>