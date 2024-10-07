<?php
// Conexión MySQL
$link = mysqli_connect("localhost", "root", "Mivida243@.", "marketzone");

// Verificar la conexión
if ($link === false) {
    die("ERROR: No pudo conectarse con la base de datos. " . mysqli_connect_error());
}

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($link, $_POST['nombre']);
    $marca = mysqli_real_escape_string($link, $_POST['marca']);
    $modelo = mysqli_real_escape_string($link, $_POST['modelo']);
    $precio = mysqli_real_escape_string($link, $_POST['precio']);
    $detalles = mysqli_real_escape_string($link, $_POST['detalles']);
    $unidades = mysqli_real_escape_string($link, $_POST['unidades']);

    // Obtener el ID del producto usando el nombre
    $sql_id = "SELECT id, imagen FROM productos WHERE nombre = '$nombre'";
    $result_id = mysqli_query($link, $sql_id);
    
    if ($result_id && mysqli_num_rows($result_id) > 0) {
        $row = mysqli_fetch_assoc($result_id);
        $id_producto = $row['id'];
        $img_actual = $row['imagen'];
    } else {
        exit;
    }

    // Manejo de la imagen
    $nombre_imagen = $img_actual;  // Asumir que la imagen no cambia inicialmente
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        // Ruta donde se guardarán las imágenes subidas
        $directorio_destino = 'img/';
        $nombre_imagen_nueva = basename($_FILES['imagen']['name']);
        
        // Mover el archivo subido a la carpeta designada
        $ruta_completa = $directorio_destino . $nombre_imagen_nueva;

        // Subir la nueva imagen
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_completa)) {
            $nombre_imagen = $ruta_completa;  // Actualizar el nombre de la imagen a la nueva
        }
    }

    // Consulta SQL para actualizar los datos del producto
    $sql = "UPDATE productos SET 
                nombre='$nombre', 
                marca='$marca', 
                modelo='$modelo', 
                precio='$precio', 
                detalles='$detalles', 
                unidades='$unidades', 
                imagen='$nombre_imagen'  
            WHERE id='$id_producto'";

    // Ejecutar la consulta
    if (mysqli_query($link, $sql)) {
        echo "<h3>Producto actualizado exitosamente!!!!!</h3>";
    } else {
        echo "ERROR: No se pudo ejecutar $sql. " . mysqli_error($link);
    }
}

// Cerrar la conexión
mysqli_close($link);
?>
