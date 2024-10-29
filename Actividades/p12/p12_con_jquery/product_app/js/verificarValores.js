function verificarNombre() {
    var nombre = document.getElementById("form-name").value;
    var mensajeError = document.getElementById("nombre-error");

    if (nombre.trim() === "") {
        mensajeError.textContent = "Inserte un nombre"; 
        return false; // La verificación falla
    } else if (nombre.length > 100) {
        mensajeError.textContent = "El nombre es demasiado largo";
        return false; // La verificación falla
    } else {
        mensajeError.textContent = ""; 
        return true; // La verificación pasa
    }
}

function verificarMarca() {
    var marca = document.getElementById("form-marca").value;
    var mensajeError = document.getElementById("marca-error");

    if (marca === "") {
        mensajeError.textContent = "Por favor, selecciona una marca.";
        return false; // La verificación falla
    } else {
        mensajeError.textContent = ""; 
        return true; // La verificación pasa
    }
}

function verificarModelo(){
    var modelo = document.getElementById("form-modelo").value;
    var mensajeError = document.getElementById("modelo-error");

    if (modelo.trim() === "") {
        mensajeError.textContent = ""; 
        return true; // Se permite un campo vacío
    } else if (modelo.length > 25) {
        mensajeError.textContent = "El modelo es demasiado largo";
        return false; // La verificación falla
    } else if (!/^[a-zA-Z0-9]+$/.test(modelo)) {
        mensajeError.textContent = "El modelo solo debe contener caracteres alfanuméricos";
        return false; // La verificación falla
    } else {
        mensajeError.textContent = ""; 
        return true; // La verificación pasa
    }
}

function verificarPrecio() {
    var precio = document.getElementById("form-precio").value;
    var mensajeError = document.getElementById("precio-error");

    if (precio.trim() === "") {
        mensajeError.textContent = ""; 
        return true; // Se permite un campo vacío
    } else if (parseFloat(precio) < 99.99) {
        mensajeError.textContent = "El precio debe de ser mayor a 99.99";
        return false; // La verificación falla
    } else {
        mensajeError.textContent = ""; 
        return true; // La verificación pasa
    }
}

function verificarDetalles(){
    var detalles = document.getElementById("form-detalles").value;
    var mensajeError = document.getElementById("detalles-error");

    if (detalles.trim() === "") {
        mensajeError.textContent = ""; 
        return true; // Se permite un campo vacío
    } else if (detalles.length > 250) {
        mensajeError.textContent = "Texto demasiado largo";
        return false; // La verificación falla
    } else {
        mensajeError.textContent = ""; 
        return true; // La verificación pasa
    }
}

function verificarUnidades(){
    var unidades = document.getElementById("form-unidades").value;
    var mensajeError = document.getElementById("unidades-error");

    if (unidades.trim() === "") {
        mensajeError.textContent = ""; 
        return true; // Se permite un campo vacío
    } else if (unidades < 0) {
        mensajeError.textContent = "Debe de haber al menos 0 unidades";
        return false; // La verificación falla
    } else {
        mensajeError.textContent = ""; 
        return true; // La verificación pasa
    }
}

function verificarImagen() {
    var inputImagen = document.getElementById("form-imagen");
    var imgExistente = document.getElementById("imagenExistente");
    if (inputImagen.files && inputImagen.files[0]) {
        var file = inputImagen.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            imgExistente.src = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        imgExistente.src = "<?= !empty($_POST['imagen']) ? $_POST['imagen'] : 'imagenPorDefecto.png' ?>";
    }
}

function verificarImagenhtml() {
    var inputImagen = document.getElementById("form-imagen");
    var imgExistente = document.getElementById("imagenExistente");

    if (inputImagen.files && inputImagen.files[0]) {
        var file = inputImagen.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            imgExistente.src = e.target.result;
            imgExistente.style.display = 'block'; 
        };
        reader.readAsDataURL(file);
    } else {
        imgExistente.src = "";
        imgExistente.style.display = 'none'; 
    }
}