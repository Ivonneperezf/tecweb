// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
    buscarProducto();
    // SE LISTAN TODOS LOS PRODUCTOS
    listarProductos();
}

function listarProductos(){
    
}

function buscarProducto() {
    $('#product-result').hide();
    $('#search').keyup(function(e) {
        let search = $('#search').val();
        if (!search) {
            $('#container').empty();  
            $('#product-result').hide();  
            return; 
        }
        $.ajax({
            url: 'backend/product-search.php',
            type: 'GET',
            data: { search },
            success: function(response) {
                let products = JSON.parse(response);
                let template = '';
                products.forEach(product => {
                    template += `<li>${product.nombre}</li>`;
                });

                $('#container').html(template);
                if (template) {
                    $('#product-result').show();
                } else {
                    $('#product-result').hide();
                }
            }
        });
    });
}
