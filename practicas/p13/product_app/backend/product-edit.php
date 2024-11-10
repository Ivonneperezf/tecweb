<?php
    use TECWEB\MYAPI\UPDATE\Update;  // 1) Uso del namespace
    require_once 'vendor/autoload.php';  // 2) Inclusión del archivo de la clase
    $productos = new Update('Marketzone');  // 3) Creación del objeto
    $productos->edit(json_decode(file_get_contents('php://input')));  // 4) Invocación al método
    echo $productos->getData();  // 5) Respuesta en formato JSON
?>