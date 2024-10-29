function verificarNombre() {
    var nombre = $("#name").val();$('#product-result').hide();
    if ($.trim(nombre) === "") {
        $("#container").html("Por favor inserte un nombre"); $('#product-result').show();
        return false;
    } else if (nombre.length > 100) {
        $("#container").html("El nombre es demasiado largo"); $('#product-result').show();
        return false;
    } else {
        $("#container").html(""); $('#product-result').hide();
        return true;
    }
}

function verificarMarca() {
    if ($("#form-marca").val() === "") {
        $("#container").html("Por favor, selecciona una marca."); $('#product-result').show();
        return false; 
    } else {
        $("#container").html(""); $('#product-result').hide();
        return true;
    }
}

function verificarModelo(){
    var modelo = $("#form-modelo").val();$('#product-result').hide();
    if ($.trim(modelo) === "") {
        $("#container").html("Por favor, agregue el modelo del producto."); $('#product-result').show();
        return false; 
    } else if (modelo.length > 25) {
        $("#container").html("El modelo es demasiado largo."); $('#product-result').show();
        return false;
    } else if (!/^[a-zA-Z0-9]+$/.test(modelo)) {
        $("#container").html("El modelo solo debe contener caracteres alfanuméricos"); $('#product-result').show();
        return false; 
    } else {
        $("#container").html(""); $('#product-result').hide();
        return true;
    }
}

function verificarPrecio() {
    if ($("#form-precio").val() === "") {
        $("#container").html("Inserte el precio"); $('#product-result').show();
        return false; 
    } else if (parseFloat($("#form-precio").val()) < 99.99) {
        $("#container").html("El precio debe de ser mayor a 99.99"); $('#product-result').show();
        return false; 
    } else {
        $("#container").html(""); $('#product-result').hide();
        return true; 
    }
}

function verificarDetalles(){
    if ($.trim($("#form-detalles").val()) === "") {
        $("#container").html(""); $('#product-result').hide(); 
        return true;
    } else if ($("#form-detalles").val().length > 250) {
        $("#container").html("Los detalles son demasiado largos"); $('#product-result').show(); 
        return false;
    } else {
        $("#container").html(""); $('#product-result').hide(); 
        return true; 
    }
}

function verificarUnidades(){
    if ($.trim($("#form-unidades").val()) === "") {
        $("#container").html("Inserte las unidades"); $('#product-result').show(); 
        return false;
    } else if (parseInt($("#form-unidades").val()) <= 0) {
        $("#container").html("Debe de haber al menos una unidad"); $('#product-result').show(); 
        return false;
    } else {
        $("#container").html(""); $('#product-result').hide(); 
        return true;
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

function verificarCampo(idCampo, nombCampo){
    if ($.trim($("#"+idCampo).val()) === ""){
        $("#container").html("Por favor, inserte el campo "+nombCampo); $('#product-result').show();
    }else{
        $("#container").html(""); $('#product-result').hide();
    }
}