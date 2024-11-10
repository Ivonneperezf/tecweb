function verificarNombre() {
    removerResaltado("name");
    var nombre = $("#name").val();
    $('#product-result').hide();

    // Validación del nombre del producto
    if ($.trim(nombre) === "") {
        $("#container").html("Por favor, inserte el nombre del producto.");
        $('#product-result').show();
        return false;
    } else if (nombre.length > 100) {
        $("#container").html("El nombre es demasiado largo");
        $('#product-result').show();
        return false;
    } else {
        $("#container").html("");
        $('#product-result').hide();

        // Si el campo no está vacío y tiene una longitud adecuada, realiza la verificación asíncrona
        $.ajax({
            url: 'backend/verify-product-name.php', // Cambia esto a la URL del archivo PHP que verificará el nombre
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ nombre: nombre }), // Envía el nombre como JSON
            success: function(response) {
                // Asegúrate de que la respuesta sea JSON
                if (typeof response === 'string') {
                    response = JSON.parse(response);
                }

                // Verifica si el nombre ya existe
                if (response.status === 'exists') {
                    $("#container").html("El nombre del producto ya existe. Por favor, elija otro nombre.");
                    $('#product-result').show();
                    return false; // Indica que el nombre no es válido
                } else {
                    $("#container").html(""); // Limpia el mensaje
                    $('#product-result').hide();
                    return true; // El nombre es válido
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la verificación del nombre: " + error);
                $("#container").html("Ocurrió un error al verificar el nombre del producto.");
                $('#product-result').show();
                return false; // Indica un error en la verificación
            }
        });
        return true; 
    }
}


function verificarMarca() {
    removerResaltado("form-marca");
    if ($("#form-marca").val() === "") {
        $("#container").html("Por favor, selecciona la marca del producto."); $('#product-result').show();
        return false; 
    } else {
        $("#container").html(""); $('#product-result').hide();
        return true;
    }
}

function verificarModelo(){
    removerResaltado("form-modelo");
    var modelo = $("#form-modelo").val();$('#product-result').hide();
    if ($.trim(modelo) === "") {
        $("#container").html("Por favor, inserte el modelo del producto."); $('#product-result').show();
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
    removerResaltado("form-precio");
    if ($("#form-precio").val() === "") {
        $("#container").html("Por favor, inserte el precio del producto."); $('#product-result').show();
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
    removerResaltado("form-detalles");
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
    removerResaltado("form-unidades");
    if ($.trim($("#form-unidades").val()) === "") {
        $("#container").html("Por favor, inserte las unidades disponibles del producto."); $('#product-result').show(); 
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
    var inputImagen = $("#form-imagen")[0];
    var imgExistente = $("#imagenExistente")[0];
    var file = inputImagen.files[0];

    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#imagenExistente").attr("src", e.target.result);
        };
        reader.readAsDataURL(file);
    } else {
        $("#imagenExistente").attr("src", 'img/Default.png');
    }
    $('#imagenExistente').show();
}

function verificarCampo(idCampo, requerido){
    if (requerido){
        if ($.trim($("#"+idCampo).val()) === ""){
            $("#container").html("Por favor, inserte los campos vacios"); $('#product-result').show();
            $("#" + idCampo).addClass("campo-vacio");
        }else{
            $("#container").html(""); $('#product-result').hide();
            $("#" + idCampo).removeClass("campo-vacio");
        }
    }else{
        $("#container").html(""); $('#product-result').hide();
    }
}

function verificarTodosLosCampos(){
    verificarCampo('name',true);
    verificarCampo('form-marca',true);
    verificarCampo('form-modelo',true);
    verificarCampo('form-precio',true);
    verificarCampo('form-unidades',true);
    verificarImagen();
}

function removerResaltado(idCampo) {
    $("#" + idCampo).removeClass("campo-vacio");
}

function borrarContenido() {
    $("#container").html(""); $('#product-result').hide();
}