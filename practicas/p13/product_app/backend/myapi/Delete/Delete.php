<?php
namespace TECWEB\MYAPI\DELETE;
    class Delete extends DataBase{
        public function __construct($db){
            parent::__construct($db);
        }
    
        public function delete($id) {
            $response = array(
                'status' => 'error',
                'message' => 'Producto no encontrado'
            );
            $sql = "UPDATE productos SET eliminado = 1 WHERE id = {$id}";
            if ($this->conexion->query($sql)) {
                $response['status'] = 'success';
                $response['message'] = 'Producto eliminado';
            } else {
                $response['message'] = 'ERROR: No se ejecutó ' . $sql . '. ' . mysqli_error($this->conexion);
            }
            $this->data = $response;
            $this->conexion->close();
        }
    }
?>