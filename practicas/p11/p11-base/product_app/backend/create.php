<?php
include 'database.php';

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
if (!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JSON A OBJETO
    $jsonOBJ = json_decode($producto);

    // Crea la conexión a la base de datos
    @$link = new mysqli('localhost', 'root', 'Mivida243@.', 'marketzone');

    // Comprobar la conexión
    if ($link->connect_errno) {
        echo json_encode(['mensaje' => 'Falló la conexión: ' . $link->connect_error, 'estado' => 'error']);
        exit();
    }

    // Validar que el producto no exista ya en la BD
    $nombre = $jsonOBJ->nombre;
    $check_sql = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND eliminado = 0";
    $result = $link->query($check_sql);

    if ($result->num_rows > 0) {
        // Si el producto ya existe
        echo json_encode(['mensaje' => 'Error: El producto ya existe en la base de datos.', 'estado' => 'error']);
    } else {
        // Si no existe, insertar el producto
        $marca = $jsonOBJ->marca;
        $modelo = $jsonOBJ->modelo;
        $precio = $jsonOBJ->precio;
        $detalles = $jsonOBJ->detalles;
        $unidades = $jsonOBJ->unidades;
        $imagen = $jsonOBJ->imagen;

        $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen)
                VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";

        if ($link->query($sql)) {
            // Éxito, devolver el mensaje de éxito
            echo json_encode([
                'mensaje' => 'Producto insertado correctamente',
                'estado' => 'exito',
                'id_producto' => $link->insert_id
            ]);
        } else {
            // Error al insertar
            echo json_encode(['mensaje' => 'Error: El producto no pudo ser insertado.', 'estado' => 'error']);
        }
    }

    // Cerrar la conexión
    $link->close();
}
?>
