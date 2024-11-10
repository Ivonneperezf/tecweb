<?php
include_once __DIR__.'/database.php';

// Leer y decodificar los datos JSON del nombre del producto
$input = file_get_contents('php://input');
$data = json_decode($input, true);

$response = [
    'status' => 'not_exists' // Valor por defecto
];

if (!empty($data['nombre'])) {
    $nombre = $data['nombre'];

    // Verificar si el nombre ya existe en la base de datos usando LIKE
    $sql = "SELECT * FROM productos WHERE nombre LIKE '{$nombre}' AND eliminado = 0";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $response['status'] = 'exists'; // El nombre ya existe
    }
    $result->free();
}

// Enviar respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
