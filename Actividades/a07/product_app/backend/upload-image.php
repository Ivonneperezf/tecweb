<?php
header('Content-Type: application/json'); // Asegúrate de establecer el tipo de contenido

$data = [
    'status' => 'error',
    'message' => 'Error al subir la imagen.'
];

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $uploads_dir = 'img'; // Carpeta donde se guardarán las imágenes
    $tmp_name = $_FILES['imagen']['tmp_name'];
    $name = basename($_FILES['imagen']['name']);
    $upload_file = "$uploads_dir/$name";

    if (move_uploaded_file($tmp_name, $upload_file)) {
        $data['status'] = 'success';
        $data['message'] = "Imagen guardada correctamente: $name";
    } else {
        $data['message'] = 'Error al mover la imagen a la carpeta de destino.';
    }
} else {
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] !== UPLOAD_ERR_NO_FILE) {
        $data['message'] = 'Error en el archivo subido: ' . $_FILES['imagen']['error'];
    } else {
        $data['status'] = 'success'; 
        $data['message'] = 'No se recibió imagen, pero el producto se ha agregado sin imagen.';
    }
}

echo json_encode($data);
?>
