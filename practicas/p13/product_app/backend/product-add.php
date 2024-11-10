<?php
    require_once 'vendor/autoload.php';
    use TECWEB\MYAPI\CREATE\Create;
    $productos = new Create('Marketzone');
    $productos->add(json_decode(file_get_contents('php://input'), true));
    echo $productos->getData();
?>
