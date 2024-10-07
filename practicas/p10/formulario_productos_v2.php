<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario producto</title>
    <script src = "./js/verificarValores.js"></script>
</head>
<body>
    <h1>Inserta tu producto</h1>
    <form id="formularioProductos" action="http://localhost/tecweb/practicas/p10/set_producto_v2.php"
          method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Información del producto</legend>
            <ul>
                <li>
                    <label for="form-name">Nombre:</label> <input type="text" name="nombre" id="form-name" 
                    value = "<?= !empty($_POST['nombre'])?$_POST['nombre']:''?>" oninput="verificarNombre()" required>
                    <div id="nombre-error" style="color:red;"></div>
                </li>

                <li>
                    <label for="form-marca">Marca:</label>
                    <select name="marca" id="form-marca" required onchange="verificarMarca()">
                        <option value="">Selecciona una marca</option>
                        <option value="Nautica" <?= (isset($_POST['marca']) && $_POST['marca'] === 'Nautica') ? 'selected' : '' ?>>Nautica</option>
                        <option value="Mango"<?= (isset($_POST['marca']) && $_POST['marca'] === 'Mango') ? 'selected' : '' ?>>Mango</option>
                        <option value="Urban Outfiters"<?= (isset($_POST['marca']) && $_POST['marca'] === 'Urban Outfiters') ? 'selected' : '' ?>>Urban Outfiters</option>
                        <option value="Banana Republic"<?= (isset($_POST['marca']) && $_POST['marca'] === 'Banana Republic') ? 'selected' : '' ?>>Banana Republic</option>
                        <option value="Under Armour"<?= (isset($_POST['marca']) && $_POST['marca'] === 'Under Armour') ? 'selected' : '' ?>>Under Armour</option>
                        <option value="Zara"<?= (isset($_POST['marca']) && $_POST['marca'] === 'Zara') ? 'selected' : '' ?>>Zara</option>
                        <option value="H&M"<?= (isset($_POST['marca']) && $_POST['marca'] === 'H&M') ? 'selected' : '' ?>>H&M</option>
                        <option value="Levi's"<?= (isset($_POST['marca']) && $_POST['marca'] === "Levi's") ? 'selected' : '' ?>>Levi's</option>
                        <option value="Calvin Klein"<?= (isset($_POST['marca']) && $_POST['marca'] === 'Calvin Klein') ? 'selected' : '' ?>>Calvin Klein</option>
                        <option value="Tommy Hilfiger"<?= (isset($_POST['marca']) && $_POST['marca'] === 'Tommy Hilfiger') ? 'selected' : '' ?>>Tommy Hilfiger</option>
                        <option value="Gucci"<?= (isset($_POST['marca']) && $_POST['marca'] === 'Gucci') ? 'selected' : '' ?>>Gucci</option>
                        <option value="Chanel"<?= (isset($_POST['marca']) && $_POST['marca'] === 'Chanel') ? 'selected' : '' ?>>Chanel</option>
                        <option value="Prada"<?= (isset($_POST['marca']) && $_POST['marca'] === 'Prada') ? 'selected' : '' ?>>Prada</option>
                        <option value="Ralph Lauren"<?= (isset($_POST['marca']) && $_POST['marca'] === 'Ralph Lauren') ? 'selected' : '' ?>>Ralph Lauren</option>
                        <option value="Burberry"<?= (isset($_POST['marca']) && $_POST['marca'] === 'Burberry') ? 'selected' : '' ?>>Burberry</option>
                    </select>
                    <div id="marca-error" style="color:red;"></div>
                </li>

                <li>
                    <label for="form-modelo">Modelo:</label><input type="text" name="modelo" id="form-modelo" oninput="verificarModelo()"
                    value = "<?= !empty($_POST['modelo'])?$_POST['modelo']:''?>" required>
                    <div id="modelo-error" style="color:red;"></div>
                </li>

                <li>
                    <label for="form-precio">Precio:</label><input type="number" name="precio" id="form-precio" step="0.01" oninput="verificarPrecio()" 
                    value = "<?= !empty($_POST['precio'])?$_POST['precio']:''?>" required>
                    <div id="precio-error" style="color:red;"></div>
                </li>

                <li>
                    <label for="form-detalles">Detalles:</label><br>
                    <textarea name="detalles" rows="4" cols="60" id="form-detalles" placeholder="Detalles adicionales" oninput="verificarDetalles()"><?= !empty($_POST['detalles']) ? htmlspecialchars($_POST['detalles']) : '' ?></textarea>
                    <div id="detalles-error" style="color:red;"></div>
                </li>

                <li>
                    <label for="form-unidades">Unidades:</label><input type="number" name="unidades" id="form-unidades" 
                    value = "<?= !empty($_POST['unidades'])?$_POST['unidades']:''?>" required oninput="verificarUnidades()">
                    <div id="unidades-error" style="color:red;"></div>
                </li>

                <li>
                    <label for="form-imagen">Imagen:</label> 
                    <input type="file" name="imagen" id="form-imagen" accept="image/*" onchange="verificarImagen()">
                    <div id="imgExistente">
                        <img id="imagenExistente" src="<?= !empty($_POST['imagen'])?$_POST['imagen']:''?>"  width="100">
                    </div>
                </li>
            </ul>
        </fieldset>
        <p>
            <input type="submit" value="Agregar">
            <input type="reset">
        </p>
    </form>
</body>
</html>
