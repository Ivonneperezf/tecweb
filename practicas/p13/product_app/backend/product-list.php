<?php
    use TECWEB\MYAPI\READ\Read;  // 1) Uso del namespace
    require_once 'vendor/autoload.php'; // 2) Inclusión del archivo de la clase
    $productos = new Read('Marketzone');  // 3) Creación del objeto
    $productos->list();  // 4) Invocación al método
    echo $productos->getData();  // 5) Respuesta en formato JSON
?>