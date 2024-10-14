<?php
    include 'database.php';

    // BUSQUEDA CON ID Y OBTENER LISTA DE PRODUCTOS -----------------------------------------------------
    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();

    // SE VERIFICA HABER RECIBIDO LA CONSULTA (BUSQUEDA)
    if( isset($_POST['consulta']) ) {
        $consulta = $_POST['consulta'];

        // SE REALIZA LA QUERY DE BÚSQUEDA PARA OBTENER COINCIDENCIAS PARCIALES
        $query = "SELECT * FROM productos 
                  WHERE nombre LIKE '%$consulta%' 
                  OR marca LIKE '%$consulta%' 
                  OR detalles LIKE '%$consulta%'";

        if ( $result = $conexion->query($query) ) {
            // SE OBTIENEN TODOS LOS RESULTADOS
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE AÑADEN AL ARREGLO DE RESPUESTA
                $producto = array();
                foreach($row as $key => $value) {
                    $producto[$key] = utf8_encode($value);
                }
                $data[] = $producto; // AÑADE EL PRODUCTO A LA LISTA DE RESULTADOS
            }
            $result->free();
        } else {
            die('Error en la consulta: '.mysqli_error($conexion));
        }

        $conexion->close();
    } 

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON PARA DEVOLVER LA LISTA COMPLETA
    echo json_encode($data, JSON_PRETTY_PRINT);
?>
