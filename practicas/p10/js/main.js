function verificarNombre() {
    var nombre = document.getElementById("form-name").value;
    var mensajeError = document.getElementById("nombre-error");

    if (nombre.trim() === "") {
        mensajeError.textContent = "Inserte un nombre"; 
    } else if (nombre.length > 100) {
        mensajeError.textContent = "El nombre es demasiado largo";
    } else {
        mensajeError.textContent = ""; 
    }
}

function verificarMarca() {
    var marca = document.getElementById("form-marca").value;
    var mensajeError = document.getElementById("marca-error");
    mensajeError.textContent = "";
    if (marca === "") {
        mensajeError.textContent = "Por favor, selecciona una marca.";
    }
}

function verificarModelo(){
    var modelo = document.getElementById("form-modelo").value;
    var mensajeError = document.getElementById("modelo-error");

    if (modelo.trim() === "") {
        mensajeError.textContent = ""; 
    } else if (modelo.length > 25) {
        mensajeError.textContent = "El modelo es demasiado largo";
    } else if (!/^[a-zA-Z0-9]+$/.test(modelo)) {
        mensajeError.textContent = "El modelo solo debe contener caracteres alfanuméricos (letras y números)";
    } else {
        mensajeError.textContent = ""; 
    }
}

function verificarPrecio() {
    var precio = document.getElementById("form-precio").value;
    var mensajeError = document.getElementById("precio-error");
    if (precio.trim() === "") {
        mensajeError.textContent = ""; 
    } else if (parseFloat(precio) < 99.99) { 
        mensajeError.textContent = "El precio debe de ser mayor a 99.99";
    } else {
        mensajeError.textContent = ""; 
    }
}

function verificarDetalles(){
    var detalles = document.getElementById("form-detalles").value;
    var mensajeError = document.getElementById("detalles-error");
    if (detalles.trim() == ""){
        mensajeError.textContent = ""; 
    }else if(detalles.length > 250){
        mensajeError.textContent = "Texto demasiado largo";
    } else {
        mensajeError.textContent = "";
    }
}

function verificarUnidades(){
    var unidades = document.getElementById("form-unidades").value;
    var mensajeError = document.getElementById("unidades-error");
    if (unidades.trim() === "") {
        mensajeError.textContent = ""; 
    } else if (unidades < 0) { 
        mensajeError.textContent = "Debe de haber al menos 0 unidades";
    } else {
        mensajeError.textContent = ""; 
    }
}

function verificarImagen(){
    var inputImagen = document.getElementById("form-imagen");
    var formData = new FormData(document.getElementById("formularioProductos"));
    if (!(inputImagen.files.length === 0)) {
        var file = inputImagen.files[0];
        formData.append("imagen", file);
    }
}