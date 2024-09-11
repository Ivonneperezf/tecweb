<?php
    function esMultiplo($num) {
        if(isset($num))
        {
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    }

    function matrizAleatoria() {
        $iteraciones = 1;
        $numeros = 3;
        $array = [rand(100, 999), rand(100, 999), rand(100, 999)];
        echo $array[0] . ", " . $array[1] . ", " . $array[2] . "<br>";
        while (!($array[0] % 2 != 0 && $array[1] % 2 == 0 && $array[2] % 2 != 0)) {
            $array = [
                rand(100, 999),
                rand(100, 999),
                rand(100, 999)];
            $iteraciones++;
            $numeros += 3;
            echo $array[0] . ", " . $array[1] . ", " . $array[2] . "<br>";
        }
        echo '<br>' . $numeros . ' números obtenidos en ' . $iteraciones . ' iteraciones<br>';
    }   
    
    function numeroAleatorioWhile($num){
        if ($num <= 0) {
            echo "Por favor ingresa un número válido mayor que 0.<br>";
        }else{
            $aleatorio = rand();
            while($aleatorio % $num != 0){
                $aleatorio = rand();
            }
            echo "Número aleatorio divisible por $num: $aleatorio"."<br>";
        }
    }

    function numeroAleatorioDoWhile($num) {
        if ($num <= 0) {
            echo "Por favor ingresa un número válido mayor que 0.<br>";
        }else{
            do {
                $aleatorio = rand();
            } while ($aleatorio % $num != 0);
            echo "Número aleatorio divisible por $num: $aleatorio"."<br>";
        }
    }
    

    function arregloLetras(){
        for ($i = 97; $i <= 122; $i++){
            $arr[$i] = chr($i);
        }
        return $arr;
    }
?>