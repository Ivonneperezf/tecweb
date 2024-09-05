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
        ?>
    </body>
</html>