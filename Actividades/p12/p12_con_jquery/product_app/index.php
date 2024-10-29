<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>ProductApp</title>
    <!-- BOOTSTRAP 4  -->
    <link rel="stylesheet" href="https://bootswatch.com/4/superhero/bootstrap.min.css">
  </head>
  <body onload="init()">

    <!-- BARRA DE NAVEGACIÓN  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href=".">ProductApp</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto"></ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" name="search" id="search" type="search" placeholder="ID, marca o descripción" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit" >Buscar</button>
          </form>
      </div>
    </nav>

    <div class="container">
      <div class="row p-4">
        <div class="col-md-5">
          <div class="card">
            <div class="card-body">
              <!-- FORMULARIO PARA AGREGAR PRODUCTO -->
              <form id="product-form">
                <div class="form-group">
                  <input class="form-control" type="text" id="name" placeholder="Nombre de producto"
                  value = "<?= !empty($_POST['nombre'])?$_POST['nombre']:''?>" oninput="verificarNombre()" onfocus = "verificarCampo('name', 'nombre')" required>
                  <!-- <div id="nombre-error" style="color:red;"></div> -->
                </div>
                <div class="form-group">
                  <form id="formularioProductos" action=""
                    method="post" enctype="multipart/form-data">
                    <ul style="list-style-type: none;">
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
                        <!-- <div id="marca-error" style="color:red;"></div> -->
                      </li>
                      <li>
                        <label for="form-modelo">Modelo:</label><input type="text" name="modelo" id="form-modelo" oninput="verificarModelo()" onfocus = "verificarCampo('form-modelo', 'modelo')"
                        value = "<?= !empty($_POST['modelo'])?$_POST['modelo']:''?>" required>
                        <!-- <div id="modelo-error" style="color:red;"></div> -->
                      </li>
                      <li>
                        <label for="form-precio">Precio:</label><input type="number" name="precio" id="form-precio" step="0.01" oninput="verificarPrecio()" onfocus = "verificarCampo('form-precio', 'precio')"
                        value = "<?= !empty($_POST['precio'])?$_POST['precio']:''?>" required>
                        <!-- <div id="precio-error" style="color:red;"></div> -->
                      </li>
                      <li>
                        <label for="form-unidades">Unidades:</label><input type="number" name="unidades" id="form-unidades" 
                        value = "<?= !empty($_POST['unidades'])?$_POST['unidades']:''?>" required oninput="verificarUnidades()" onfocus = "verificarCampo('form-unidades', 'unidades')">
                        <!-- <div id="unidades-error" style="color:red;"></div> -->
                      </li>
                      <li>
                        <label for="form-detalles">Detalles:</label><br>
                        <textarea name="detalles" rows="4" cols="35" id="form-detalles" placeholder="Detalles adicionales" 
                        oninput="verificarDetalles()"><?= !empty($_POST['detalles']) ? htmlspecialchars($_POST['detalles']) : '' ?></textarea>
                        <!-- <div id="detalles-error" style="color:red;"></div> -->
                      </li>
                      <li>
                        <label for="form-imagen">Imagen:</label> 
                        <input type="file" name="imagen" id="form-imagen" accept="image/*" onchange="verificarImagen()">
                        <div id="imgExistente">
                            <img id="imagenExistente" src="<?= !empty($_POST['imagen'])?$_POST['imagen']:''?>"  width="100">
                        </div>
                      </li>
                    </ul>
                  </form>
                  <!-- <textarea class="form-control" id="description" cols="30" rows="10" placeholder="JSON de producto"></textarea> -->
                </div>
                <input type="hidden" id="productId">
                <button class="btn btn-primary btn-block text-center" type="submit">
                  Agregar Producto
                </button>
              </form>
            </div>
          </div>
        </div>

        <!-- TABLA  -->
        <div class="col-md-7">
          <div class="card my-4" id="product-result">
          <!--div class="card my-4 d-none" id="product-result"-->
            <div class="card-body">
              <!-- RESULTADO -->
              <ul id="container" style="list-style-type: none;"></ul>
            </div>
          </div>

          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>Descripción</td>
              </tr>
            </thead>
            <tbody id="products"></tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <!-- Lógica del Frontend -->
    <script src="js/app_fuc.js"></script>
    <script src="js/Valores.js"></script>
  </body>

</html>