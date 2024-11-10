<?php
    use TECWEB\MYAPI\Products;  // 1) Uso del namespace
    require_once 'myapi/Products.php';  // 2) Inclusión del archivo de la clase
    $productos = new Products();  // 3) Creación del objeto
    $productos->list();  // 4) Invocación al método
    echo $productos->getData();  // 5) Respuesta en formato JSON
?>