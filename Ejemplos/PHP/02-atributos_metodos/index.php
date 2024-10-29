<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 2</title>
</head>
<body>
    <?php
        require_once __DIR__.'/Menu.php';
        $men = new Menu;
        $men->cargar_opcion('https://www.facebook.com','Facebook');
        $men->cargar_opcion('https://x.com','X');
        $men->cargar_opcion('https://www.instagram.com','Instagram');
        $men ->mostrar();
    ?>
</body>
</html>