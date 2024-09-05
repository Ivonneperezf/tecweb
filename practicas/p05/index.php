<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN”
“http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title> Ejercicios de PHP </title>
    </head>
    <body>
        <?php
        //EJERCICIO 1------------------------------------------------------------------------------

        $_myvar = "Variable valida";
        $_7var = "Variable valida";
        //myvar = "Variable invalida"; 
        $myvar = "Variable valida";
        $var7 = "Variable valida"; 
        $_element1 = "Variable valida";
        //$house*5 = "Variable invalida";

        echo "<h2>Ejercicio 1</h2><p>Determina cuál de las siguientes
         variables son válidas y explica por qué:</p> <ol>";
        echo "<li><b>".$_myvar.' $_myvar'.".</b>"." Esta variable es valida dado que comienza con underscore (_)."."</li>";
        echo "<li><b>".$_7var.' $_7var'.".</b>"." Esta variable es valida dado que comienza con underscore (_)."."</li>";
        echo "<li><b>"."Variable invalida myvar.</b>"." Esta variable es invalida sado que no comienza con $."."</li>";
        echo "<li><b>".$myvar.' $myvar'.".</b>"." Esta variable es valida pues comienza con alguna letra del abecedario."."</li>";
        echo "<li><b>".$var7.' $var7'.".</b>"." Esta variable es valida ya que termina con numero pero comienza con una letra."."</li>"; 
        echo "<li><b>".$_element1.' $_element1'.".</b>"." Esta variable es valida dado que comienza con underscore (_)."."</li>";
        echo "<li><b>"."Variable invalida".'$house*5'.".</b>"." Esta variable es invaida dado que no se pueden colocar operadores a los nombres de las variables."."</li>"."</ol>";
        
        unset($_myvar);
        unset($_7var);
        unset($myvar);
        unset($var7);
        unset($_element1);
        
        
        //EJERCICIO 2------------------------------------------------------------------------------
        echo "<h2>Ejercicio 2</h2><p>Asignaciones de valores a variables:</p>";

        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;
        
        echo "<i>Muestra de primeras asignaciones:</i><br>";
        echo '$a = '."$a"."<br>";
        echo '$b = '."$b"."<br>";
        echo '$c = '."$c"."<br><br>";

        $a = "PHP server";
        $b = &$a;
        echo "<i>Muestra de segundas asignaciones:</i><br>";
        echo '$a = '."$a"."<br>";
        echo '$b = '."$b"."<br>";
        echo '$c = '."$c"."<br><br>";

        echo "<i>Describe y muestra en la página obtenida qué ocurrió en el segundo 
        bloque de asignaciones</i><br>";
        echo '<p><i>PRIMERAS ASIGNACIONES</i><br>Se definen los valores de las variables a, b, c, donde 
        dado que no hay variables o caracteres especiales, no hace ninguna diferencia el uso de comillas
        dobles ("") o el uso de comillas simples'." ('')".", esto para los casos de las variables a y b, sin embargo,
        a la variable c se le asigna el contenido de la variable a, por lo que su salida es la misma en la variable a y c.</p>";

        echo "<p><i>SEGUNDAS ASIGNACIONES</i><br>En este caso se actualiza el valor de la variable a, y ahora 
        a la variable b se le asigna el contenido de la variable a, por lo que ahora tanto a como b apuntan a a,
         por lo tanto la salida es a misma en todas las variables.</p>";
        
        unset($a);
        unset($b);
        unset($c);


        //EJERCICIO 3------------------------------------------------------------------------------
        echo "<h2>Ejercicio 3</h2><p>Muestra el contenido de cada variable inmediatamente después de cada asignación, 
        verificar la evolución del tipo de estas variables (imprime todos los componentes de los arreglo):</p><ul>";

        $a = "PHP5";
        echo '<li>$a = "PHP5".<br>Salida: ';
        var_dump($a);
        echo"</li><br>";

        $z[] = &$a;
        echo '<li>$z[] = &$a.<br>Salida: ';
        var_dump($z);
        echo"</li><br>";

        $b = "5a version de PHP";
        echo '<li>$b = "5a version de PHP".<br>Salida: ';
        var_dump($b);
        echo"</li><br>";

        $c = $b*10;
        echo '<li>$c = $b*10.<br>Salida: ';
        var_dump($c);
        echo"</li><br>";

        $a .= $b;
        echo '<li>$a .= $b.<br>Salida: ';
        var_dump($a);
        echo"</li><br>";

        $b *= $c;
        echo '<li>$b *= $c.<br>Salida: ';
        var_dump($b);
        echo"</li><br>";

        $z[0] = "MySQL";
        echo '<li>$z[0] = "MySQL".<br>Salida: ';
        var_dump($z);
        echo"</li><br>";

        echo"</ul>";

        unset($a);
        unset($b);
        unset($c);
        unset($z);

        //EJERCICIO 4------------------------------------------------------------------------------
        echo '<h2>Ejercicio 4</h2><p>Lee y muestra los valores de las variables del ejercicio anterior,
         pero ahora con la ayuda de la matriz $GLOBALS o del modificador global de PHP.</p>';
        
        $a = "PHP5";
        $z[] = &$a;
        $b = "5a version de PHP";
        $c = $b*10;
        $a .= $b;
        $b *= $c;
        $z[0] = "MySQL";
        function val_variables(){
            echo "Variable a = ";
            print_r($GLOBALS['a']);
            echo "<br>";
            echo "Variable b = ";
            print_r($GLOBALS['b']);
            echo "<br>";
            echo "Variable c = ";
            print_r($GLOBALS['c']);
            echo "<br>";
            echo "Variable z = ";
            print_r($GLOBALS['z']);
            echo "<br>";
        }
        val_variables();
        unset($a);
        unset($b);
        unset($c);
        unset($z);

        //EJERCICIO 5------------------------------------------------------------------------------
        echo '<h2>Ejercicio 5</h2><p>Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>';
        $a = "7 personas";
        echo '$a = '."$a<br>";
        $b = (integer) $a;
        echo '$b = '."$b<br>";
        $a = "9E3";
        echo '$a = '."$a<br>";
        $c = (double) $a;
        echo '$c = '."$c<br>";
        unset($a);
        unset($b);
        unset($c);

        //EJERCICIO 6------------------------------------------------------------------------------
        echo '<h2>Ejercicio 6</h2><p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
        usando la función var_dump(<datos>).</p>';

        $a = "0";
        echo 'Variable $a con var_dump = ';
        var_dump($a);
        echo "<br>";

        $b = "TRUE";
        echo 'Variable $b con var_dump = ';
        var_dump($b);
        echo "<br>";

        $c = FALSE;
        echo 'Variable $c con var_dump = ';
        var_dump($c);
        echo "<br>";

        $d = ($a OR $b);
        echo 'Variable $d con var_dump = ';
        var_dump($d);
        echo "<br>";

        $e = ($a AND $c);
        echo 'Variable $e con var_dump = ';
        var_dump($e);
        echo "<br>";

        $f = ($a XOR $b);
        echo 'Variable $f con var_dump = ';
        var_dump($f);
        echo "<br>";

        echo '<p>Después investiga una función de PHP que permita transformar el valor booleano de $c y $e 
        en uno que se pueda mostrar con un echo:</p>';
        settype($c, "string");
        settype($e, "string");
        echo "El valor en falso genera una cadena vacia, mientras el valor verdadero una cadena con un 1.<br>";
        echo 'El valor con echo de $c es : '.$c."<br>";
        echo 'El valor con echo de $e es : '.$e."<br>";
        unset($a);
        unset($b);
        unset($c);
        unset($d);
        unset($e);
        unset($f);

        //EJERCICIO 7------------------------------------------------------------------------------
        echo '<h2>Ejercicio 7</h2><p>Usando la variable predefinida $_SERVER, determina lo siguiente:.</p>';
        echo '<ol type="a">
            <li>La versión de Apache y PHP.</li>
            <li>El nombre del sistema operativo (servidor).</li>
            <li>El idioma del navegador (cliente).</li>
            </ol>';
        echo "Version de Apache y PHP: ".$_SERVER['SERVER_SOFTWARE']."<br>";
        echo "Nombre del sistema operativo del servidor: ".$_SERVER['SERVER_NAME']. "<br>";
        echo "Idioma del navegador: ".$_SERVER['HTTP_ACCEPT_LANGUAGE']."<br>";
        ?>
    </body>
</html>