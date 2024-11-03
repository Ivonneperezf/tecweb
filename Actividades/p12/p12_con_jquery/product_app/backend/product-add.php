<?php
include_once __DIR__.'/database.php';

// Leer y decodificar los datos JSON del producto
$input = file_get_contents('php://input');
$producto = json_decode($input, true);

$data = array(
    'status' => 'error',
    'message' => 'Ya existe un producto con ese nombre'
);

if (!empty($producto)) {
    // Verificar si existe un archivo de imagen en $_FILES
    // if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] !== UPLOAD_ERR_NO_FILE) {
    //     $imagen = 'img/' . basename($_FILES['imagen']['name']);
        
    //     // Intentar mover el archivo cargado a la carpeta img
    //     if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
    //         die('<h1>Error al subir la imagen</h1>');
    //     }
    // } else {
    //     // Asignar una imagen por defecto si no se subió ninguna
    //     $imagen = 'img/default.png';
    // }
    
    // Verificar si el producto ya existe en la base de datos
    $sql = "SELECT * FROM productos WHERE nombre = '{$producto['nombre']}' AND eliminado = 0";
    $result = $conexion->query($sql);
    
    if ($result->num_rows == 0) {
        $conexion->set_charset("utf8");
        $sql = "INSERT INTO productos (id, nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) VALUES (null, '{$producto['nombre']}', '{$producto['marca']}', '{$producto['modelo']}', {$producto['precio']}, '{$producto['detalles']}', {$producto['unidades']}, '{$producto['imagen']}', 0)";
        
        if ($conexion->query($sql)) {
            $data['status'] = "success";
            $data['message'] = "Producto agregado";
        } else {
            $data['message'] = "ERROR: No se ejecutó $sql. " . mysqli_error($conexion);
        }
    }
    
    $result->free();
    // Cierra la conexión
    $conexion->close();
}

// Enviar respuesta en formato JSON
echo json_encode($data, JSON_PRETTY_PRINT);

?>
