<?php
namespace TECWEB\MYAPI\READ;
use TECWEB\MYAPI\DataBase;
require_once __DIR__ . '/../DataBase.php';
    class Read extends DataBase{
        public function __construct($db){
            parent::__construct($db);
        }
    
        public function list() {
            $response = array();
            if ($result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0")) {
                // Obtener los resultados
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if (!is_null($rows)) {
                    // Mapear los resultados al arreglo de respuesta
                    foreach ($rows as $num => $row) {
                        foreach ($row as $key => $value) {
                            $response[$num][$key] = $value;
                        }
                    }
                }
                $result->free();
            } else {
                die('Query Error: ' . mysqli_error($this->conexion));
            }
            $this->data = $response;
        }
    
    
        public function search($search) {
            $response = array();
            $sql = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
            
            if ($result = $this->conexion->query($sql)) {
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if (!is_null($rows)) {
                    foreach ($rows as $num => $row) {
                        foreach ($row as $key => $value) {
                            $response[$num][$key] = utf8_encode($value);
                        }
                    }
                }
                $result->free();
            } else {
                die('Query Error: ' . mysqli_error($this->conexion));
            }
            // Asignar los resultados a la propiedad de respuesta
            $this->data = $response;
        }
    
        public function single($id) {
            $response = array();
    
            // Evitar inyección de SQL con parámetros preparados
            $query = "SELECT * FROM productos WHERE id = ?";
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param('i', $id);  // 'i' indica que el parámetro es un entero
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result) {
                // Obtener los resultados y mapearlos al arreglo de respuesta
                if ($row = $result->fetch_assoc()) {
                    $response = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'marca' => $row['marca'],
                        'modelo' => $row['modelo'],
                        'precio' => $row['precio'],
                        'detalles' => $row['detalles'],
                        'unidades' => $row['unidades'],
                        'imagen' => $row['imagen']
                    );
                }
                $result->free();
            } else {
                die('Query fallida');
            }
    
            // Asignar los resultados a la propiedad de respuesta
            $this->data = $response;
        }

        public function getByName($nombre) {
            $response = array();
            $query = "SELECT * FROM productos WHERE nombre = ?";
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param('s', $nombre);  
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result) {
                if ($row = $result->fetch_assoc()) {
                    $response = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'marca' => $row['marca'],
                        'modelo' => $row['modelo'],
                        'precio' => $row['precio'],
                        'detalles' => $row['detalles'],
                        'unidades' => $row['unidades'],
                        'imagen' => $row['imagen']
                    );
                }
                $result->free();
            } else {
                die('Query fallida');
            }
            $this->data = $response;
        }
    }
?>