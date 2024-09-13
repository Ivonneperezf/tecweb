<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta consulta de automovil</title>
</head>
<body>
    <?php
        include("src/funciones.php");
        echo '<h2>Respuesta consulta de automovil</h2>';
        $mostrarTodos = isset($_POST['listarVehiculos']) && $_POST['listarVehiculos'] == 'true';
        $matricula = $_POST['matricula'] ?? '';
        $porMatricula = isset($_POST['pormatricula']);
        $mostrarResultado = false;
        
        if ($porMatricula) {
            $mostrarResultado = true;
            $vehiculos = automoviles();
            $vehiculo = buscarMatricula($vehiculos, $matricula);
            if ($vehiculo !== null) {
                echo '<h3>Detalles del vehículo</h3>';
                echo '<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">';
                echo '<tr>';
                echo '<th colspan="2">Detalles del Vehículo</th>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><strong>Matrícula:</strong></td>';
                echo '<td>' . htmlspecialchars($matricula) . '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><strong>Marca:</strong></td>';
                echo '<td>' . htmlspecialchars($vehiculo['Auto']['marca']) . '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><strong>Modelo:</strong></td>';
                echo '<td>' . htmlspecialchars($vehiculo['Auto']['modelo']) . '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><strong>Tipo:</strong></td>';
                echo '<td>' . htmlspecialchars($vehiculo['Auto']['tipo']) . '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><strong>Nombre del Propietario:</strong></td>';
                echo '<td>' . htmlspecialchars($vehiculo['Propietario']['nombre']) . '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><strong>Ciudad:</strong></td>';
                echo '<td>' . htmlspecialchars($vehiculo['Propietario']['ciudad']) . '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><strong>Dirección:</strong></td>';
                echo '<td>' . htmlspecialchars($vehiculo['Propietario']['direccion']) . '</td>';
                echo '</tr>';
                
                echo '</table>';
            } else {
                if (!empty($matricula)) {
                    echo '<p>No se encontró un vehículo con la matrícula: ' . htmlspecialchars($matricula) . '</p>';
                }
            }
        }

        if ($mostrarTodos && !$mostrarResultado) {
            echo '<h3>Lista de todos los vehículos</h3>';
            $vehiculos = automoviles();
            echo '<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Matrícula</th>';
            echo '<th>Marca</th>';
            echo '<th>Modelo</th>';
            echo '<th>Tipo</th>';
            echo '<th>Nombre del Propietario</th>';
            echo '<th>Ciudad</th>';
            echo '<th>Dirección</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            
            foreach ($vehiculos as $matricula => $info) {
                $auto = $info['Auto'];
                $propietario = $info['Propietario'];
                
                echo '<tr>';
                echo '<td>' . htmlspecialchars($matricula) . '</td>';
                echo '<td>' . htmlspecialchars($auto['marca']) . '</td>';
                echo '<td>' . htmlspecialchars($auto['modelo']) . '</td>';
                echo '<td>' . htmlspecialchars($auto['tipo']) . '</td>';
                echo '<td>' . htmlspecialchars($propietario['nombre']) . '</td>';
                echo '<td>' . htmlspecialchars($propietario['ciudad']) . '</td>';
                echo '<td>' . htmlspecialchars($propietario['direccion']) . '</td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
        }
    ?>
</body>
</html>