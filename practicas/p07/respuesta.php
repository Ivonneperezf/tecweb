<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta formulario</title>
</head>
<body>
    <h2>Respuesta del formulario</h2>
    <?php
        if (isset($_POST["edad"]) && isset($_POST["sexo"])) {
            $edad = (int)$_POST["edad"];
            $sexo = $_POST["sexo"];
            echo "<p>Edad: $edad</p>";

            if (($sexo == "femenino") && ($edad >= 18) && ($edad <= 35)) {
                echo "<p>Bienvenida, usted está en el rango de edad permitido.</p>";
            } else {
                echo "<p>Lo siento, no cumple con los requisitos.</p>";
            }
        } else {
            echo "<p>Error al recibir los datos</p>";
        }
    ?>
</body>
</html>
