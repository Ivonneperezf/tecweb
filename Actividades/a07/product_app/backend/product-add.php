<?php
    namespace conexion\DataBases;
    require_once 'myapi/Products.php';
    $productos = new Products();
    $productos->add(json_decode(file_get_contents('php://input'), true));
    echo $productos->getData();
?>
