<?php
    include_once __DIR__.'/database.php';
    $id = $_POST['id'];  // Asegúrate de sanitizar este valor para evitar SQL Injection

    // Preparar la consulta para evitar inyección de SQL
    $query = "SELECT * FROM productos WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);  // 'i' indica que el parámetro es un entero
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die('Query fallida');
    }

    $json = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $json[] = array(
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

    $jsonstring = json_encode($json[0]);  // Convertir solo el primer resultado en JSON
    echo $jsonstring;
?>