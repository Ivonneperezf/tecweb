<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insercion de productos</title>
</head>
<body>
    <?php
        $nombre = $_POST['nombre'];
        $marca  = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $precio = $_POST['precio'];
        $detalles = $_POST['detalles'];
        $unidades = $_POST['unidades'];
        $imagen = 'img/' . basename($_FILES['imagen']['name']);
        if ($_FILES['imagen']['error'] === UPLOAD_ERR_NO_FILE) {
            // Si no se subió, asignar la imagen predeterminada
            $imagen = 'img/default.png';
        } else {
            if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
                die('<h1>Error al subir la imagen</h1>');
            }
        }
        //$eliminado = 0;

        /** SE CREA EL OBJETO DE CONEXION */
        @$link = new mysqli('localhost', 'root', 'Mivida243@.', 'marketzone');

        /** comprobar la conexión */
        if ($link->connect_errno) 
        {
            die('Falló la conexión: '.$link->connect_error.'<br/>');
        }

        /** Validar que el producto no exista ya en la BD */
        $check_sql = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND marca = '{$marca}' AND modelo = '{$modelo}'";
        $result = $link->query($check_sql);

        if ($result->num_rows > 0) {
            // Si el producto ya existe
            echo '<h1>Error: El producto ya existe en la base de datos.</h1></body>';
        } else {
            // Si no existe, insertar el producto
            //$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}','{$eliminado}')";
            $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen)
            VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";

            if ($link->query($sql)) {
                // Éxito, mostrar resumen del producto insertado
                echo '<h1>Producto insertado correctamente</h1>';
                echo '<p><strong>Nombre:</strong> '.$nombre.'</p>';
                echo '<p><strong>Marca:</strong> '.$marca.'</p>';
                echo '<p><strong>Modelo:</strong> '.$modelo.'</p>';
                echo '<p><strong>Precio:</strong> $'.$precio.'</p>';
                echo '<p><strong>Detalles:</strong> '.$detalles.'</p>';
                echo '<p><strong>Unidades:</strong> '.$unidades.'</p>';
                echo '<p><strong>Imagen:</strong> <img src="'.$imagen.'" alt="Imagen de producto" style="width:100px;"></p>';
                echo '<p><strong>ID del producto:</strong> '.$link->insert_id.'</p>';
            } else {
                // Error al insertar
                echo '<h1>Error: El producto no pudo ser insertado.</h1>';
            }
        }

        /** Cerrar la conexión */
        $link->close();
    ?>

</body>
</html>