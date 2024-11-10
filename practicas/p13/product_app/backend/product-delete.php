<?php
    use TECWEB\MYAPI\DELETE\Delete;  // 1) Uso del namespace
    require_once 'vendor/autoload.php';  // 2) Inclusión de archivo de la clase
    $productos = new Delete('Marketzone');  // 3) Creación del objeto
    $productos->delete($_GET['id']);  // 4) Invocación al método y echo de la respuesta
    echo $productos->getData();  // 5) Respuesta en formato JSON
?>
