<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 7</title>
</head>
<body>
    <?php
    echo "<h2>Ejercicio 1</h2>";
    echo "<p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>";

        include("src/funciones.php");
        esMultiplo($_GET['numero']);


    echo "<h2>Ejercicio 2</h2>";
    echo "<p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una secuencia 
        compuesta por: <i>impar, par, impar</i></p>";
        matrizAleatoria();
    
    echo "<h2>Ejercicio 3</h2>";
    echo "<p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente, 
    pero que además sea múltiplo de un número dado.</p>
    <ul>
    <li>Crear una variante de este script utilizando el ciclo <i>do-while</i>.</li>
    <li>El número dado se debe obtener vía GET.</li></ul>";
    echo "<h4>Utilizando <i>while</i></h4>";
        numeroAleatorioWhile($_GET['valor']);
    echo "<h4>Utilizando <i>do-while</i></h4>";
        numeroAleatorioWhile($_GET['valor']);
    
    ?>
    
</body>
</html>