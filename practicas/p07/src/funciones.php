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

    function automoviles(){
        $vehiculos = array(
            "UBN6338" => array(
                "Auto" => array(
                    "marca" => "HONDA",
                    "modelo" => "2020",
                    "tipo" => "camioneta"
                ),
                "Propietario" => array(
                    "nombre" => "Alfonzo Esparza",
                    "ciudad" => "Puebla, Pue.",
                    "direccion" => "C.U., Jardines de San Manuel"
                )
            ),
            "UBN6339" => array(
                "Auto" => array(
                    "marca" => "MAZDA",
                    "modelo" => "2019",
                    "tipo" => "sedan"
                ),
                "Propietario" => array(
                    "nombre" => "Ma. del Consuelo Molina",
                    "ciudad" => "Puebla, Pue.",
                    "direccion" => "97 oriente"
                )
            ),
            "XYZ1234" => array(
                "Auto" => array(
                    "marca" => "TOYOTA",
                    "modelo" => "2021",
                    "tipo" => "sedan"
                ),
                "Propietario" => array(
                    "nombre" => "Carlos Martínez",
                    "ciudad" => "México, D.F.",
                    "direccion" => "Av. Insurgentes Sur 123"
                )
            ),
            "ABC5678" => array(
                "Auto" => array(
                    "marca" => "FORD",
                    "modelo" => "2020",
                    "tipo" => "camioneta"
                ),
                "Propietario" => array(
                    "nombre" => "Ana Gómez",
                    "ciudad" => "Guadalajara, Jal.",
                    "direccion" => "Calle Juárez 45"
                )
            ),
            "DEF9012" => array(
                "Auto" => array(
                    "marca" => "CHEVROLET",
                    "modelo" => "2018",
                    "tipo" => "hachback"
                ),
                "Propietario" => array(
                    "nombre" => "Luis Rodríguez",
                    "ciudad" => "Monterrey, NL",
                    "direccion" => "Avenida Constitución 234"
                )
            ),
            "GHI3456" => array(
                "Auto" => array(
                    "marca" => "NISSAN",
                    "modelo" => "2022",
                    "tipo" => "sedan"
                ),
                "Propietario" => array(
                    "nombre" => "Maria López",
                    "ciudad" => "Puebla, Pue.",
                    "direccion" => "Calle 12 Poniente 56"
                )
            ),
            "JKL7890" => array(
                "Auto" => array(
                    "marca" => "SUBARU",
                    "modelo" => "2019",
                    "tipo" => "camioneta"
                ),
                "Propietario" => array(
                    "nombre" => "David Torres",
                    "ciudad" => "Tijuana, BCN",
                    "direccion" => "Boulevard Díaz Ordaz 789"
                )
            ),
            "MNO1235" => array(
                "Auto" => array(
                    "marca" => "HYUNDAI",
                    "modelo" => "2018",
                    "tipo" => "hachback"
                ),
                "Propietario" => array(
                    "nombre" => "Sofía Castro",
                    "ciudad" => "Cancún, QRoo",
                    "direccion" => "Av. Tulum 321"
                )
            ),
            "PQR6789" => array(
                "Auto" => array(
                    "marca" => "KIA",
                    "modelo" => "2021",
                    "tipo" => "sedan"
                ),
                "Propietario" => array(
                    "nombre" => "Jorge Fernández",
                    "ciudad" => "San Luis Potosí, SLP",
                    "direccion" => "Calle Reforma 678"
                )
            ),
            "STU2345" => array(
                "Auto" => array(
                    "marca" => "VOLKSWAGEN",
                    "modelo" => "2019",
                    "tipo" => "hachback"
                ),
                "Propietario" => array(
                    "nombre" => "Elena Morales",
                    "ciudad" => "Querétaro, Qro.",
                    "direccion" => "Calle Constituyentes 234"
                )
            ),
            "VWX6780" => array(
                "Auto" => array(
                    "marca" => "BMW",
                    "modelo" => "2020",
                    "tipo" => "sedan"
                ),
                "Propietario" => array(
                    "nombre" => "Ricardo Pérez",
                    "ciudad" => "León, Gto.",
                    "direccion" => "Boulevard Adolfo López Mateos 123"
                )
            ),
            "YZA3456" => array(
                "Auto" => array(
                    "marca" => "AUDI",
                    "modelo" => "2021",
                    "tipo" => "camioneta"
                ),
                "Propietario" => array(
                    "nombre" => "Patricia Ruiz",
                    "ciudad" => "Hermosillo, Son.",
                    "direccion" => "Calle Morelos 456"
                )
            ),
            "BCD7891" => array(
                "Auto" => array(
                    "marca" => "MITSUBISHI",
                    "modelo" => "2018",
                    "tipo" => "sedan"
                ),
                "Propietario" => array(
                    "nombre" => "Javier Hernández",
                    "ciudad" => "Puebla, Pue.",
                    "direccion" => "Calle 5 de Febrero 321"
                )
            ),
            "EFG1237" => array(
                "Auto" => array(
                    "marca" => "PEUGEOT",
                    "modelo" => "2017",
                    "tipo" => "hachback"
                ),
                "Propietario" => array(
                    "nombre" => "Luisa Mendoza",
                    "ciudad" => "Mérida, Yuc.",
                    "direccion" => "Calle 60 456"
                )
            ),
            "HIJ4568" => array(
                "Auto" => array(
                    "marca" => "ALFA ROMEO",
                    "modelo" => "2022",
                    "tipo" => "sedan"
                ),
                "Propietario" => array(
                    "nombre" => "Fernando López",
                    "ciudad" => "Chihuahua, Chih.",
                    "direccion" => "Avenida de las Américas 789"
                )
            )
        );
        return $vehiculos;  
    }

    function buscarMatricula($vehiculos, $matricula) {
        return isset($vehiculos[$matricula]) ? $vehiculos[$matricula] : null;
    }
?>