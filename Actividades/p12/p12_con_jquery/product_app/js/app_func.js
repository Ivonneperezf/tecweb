// JSON BASE A MOSTRAR EN FORMULARIO
// var baseJSON = {
//     "precio": 0.0,
//     "unidades": 1,
//     "modelo": "XX-000",
//     "marca": "NA",
//     "detalles": "NA",
//     "imagen": "img/default.png"
//   };

var edit = false;

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    // var JsonString = JSON.stringify(baseJSON,null,2);
    // document.getElementById("description").value = JsonString;
    listarProductos();
    buscarProducto();
    eliminarProducto();
    agregarProducto();
    editarProducto();
}

function listarProductos(){
    $.ajax({
        url: 'backend/product-list.php',
        type: 'GET',
        success: function(response){
            let products = JSON.parse(response);
            let template = '';
            products.forEach(product => {

                let descripcion = '';
                descripcion += '<li>precio: '+product.precio+'</li>';
                descripcion += '<li>unidades: '+product.unidades+'</li>';
                descripcion += '<li>modelo: '+product.modelo+'</li>';
                descripcion += '<li>marca: '+product.marca+'</li>';
                descripcion += '<li>detalles: '+product.detalles+'</li>';
                descripcion += '<li>imagen: '+product.imagen+'</li>';

                template += `<tr productId = "${product.id}">
                    <td>${product.id}</td>
                    <td><a href="#" class = product-item>${product.nombre}</a></td>
                    <td><ul>${descripcion}</ul></td>
                        <td>
                            <button class="product-delete btn btn-danger">
                                Eliminar
                            </button>
                        </td>
            </tr>`
            });
            $('#products').html(template);
        }
    });
}

function buscarProducto() {
    $('#product-result').hide();
    $('#search').keyup(function(e) {
        let search = $('#search').val();
        if (!search) {
            listarProductos();
            $('#product-result').hide();  
            return; 
        }
        $.ajax({
            url: 'backend/product-search.php',
            type: 'GET',
            data: { search },
            success: function(response) {
                let products = JSON.parse(response);
                let searchTemplate = '';
                products.forEach(product => {
                    searchTemplate += `<li>${product.nombre}</li>`;
                });

                $('#container').html(searchTemplate);
                if (searchTemplate) {
                    $('#product-result').show();
                } else {
                    $('#product-result').hide();
                }
                let productTableTemplate = '';  
                products.forEach(product => { 
                    let descripcion = '';  
                    descripcion += '<li>precio: '+product.precio+'</li>'; 
                    descripcion += '<li>unidades: '+product.unidades+'</li>';  
                    descripcion += '<li>modelo: '+product.modelo+'</li>';  
                    descripcion += '<li>marca: '+product.marca+'</li>';  
                    descripcion += '<li>detalles: '+product.detalles+'</li>'; 
                    descripcion += '<li>imagen: '+product.imagen+'</li>';  

                    productTableTemplate += `<tr productId="${product.id}">  
                        <td>${product.id}</td>
                        <td><a href="#" class = product-item>${product.nombre}</a></td>
                        <td><ul>${descripcion}</ul></td>
                        <td>
                            <button class="product-delete btn btn-danger">
                                Eliminar
                            </button>
                        </td>
                    </tr>`; 
                });
                $('#products').html(productTableTemplate);  
            }
        });
    });
}


function agregarProducto() {
    $('#product-form').submit(function(e) {
        e.preventDefault();
        $('#container').html("");
        $('#product-result').hide();
        var inputImagen = $("#form-imagen")[0];
        var file = inputImagen.files[0];
        const fileName = file ? file.name : "Default.png";
        //alert(fileName);
        const postData = {
            id : $('#productId').val(),
            nombre: $('#name').val(),
            marca: $("#form-marca").val(),
            modelo: $("#form-modelo").val(),
            precio: $("#form-precio").val(),
            unidades: $("#form-unidades").val(),
            detalles: $("#form-detalles").val(),
            imagen: "img/"+fileName
        };
        // alert(postData.modelo);
        let url = edit === false ? 'backend/product-add.php' : 'backend/product-edit.php';
        $.ajax({
            url: url,
            type: 'POST',
            contentType: 'application/json',  
            data: JSON.stringify(postData),   
            success: function(response) {
                //console.log(response);
                //let result = JSON.parse(response);
                let result = typeof response === 'string' ? JSON.parse(response):response;
                if (result.status === "success") {
                    listarProductos();  
                    $('#product-form').trigger('reset');
                    $('#description').val(JSON.stringify(baseJSON, null, 2));  
                }
                $('#container').append("Status: " + result.status + "<br>");
                $('#container').append("Message: " + result.message + "<br>");
                $('#product-result').show();
            },
            error: function(xhr, status, error) {
                alert("Error en la solicitud: " + error);
            }
        });
    });
}

function eliminarProducto() {
    $(document).on('click', '.product-delete', function() {
        $('#container').html("");
        $('#product-result').hide();
        if(confirm('¿Seguro que desea eliminar este producto?')){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('productId');
            $.get('backend/product-delete.php', {id}, function(response){
                let result = typeof response === 'string' ? JSON.parse(response):response;
                listarProductos();
                $('#container').append("Status: " + result.status + "<br>");
                $('#container').append("Message: " + result.message + "<br>");
                $('#product-result').show();
                //console.log(response);
            })
        }
    });
}

function editarProducto() {
    $(document).on('click', '.product-item', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('productId');
        let nombre = $(element).find('.product-item').text();
        let detallesList = $(element).find('ul li');
        let precio, unidades, modelo, marca, detalles, imagen;
        detallesList.each(function() {
            let texto = $(this).text();
            let [clave, valor] = texto.split(': ').map(item => item.trim());
            switch (clave) {
                case 'precio':
                    precio = parseFloat(valor); 
                    break;
                case 'unidades':
                    unidades = parseInt(valor); 
                    break;
                case 'modelo':
                    modelo = valor; 
                    break;
                case 'marca':
                    marca = valor; 
                    break;
                case 'detalles':
                    detalles = valor;
                    break;
                case 'imagen':
                    imagen = valor;
                    break;
            }
        });

        let productData = {
            id: id,
            nombre: nombre,
            marca: marca,
            modelo: modelo,
            precio: precio,
            detalles: detalles,
            unidades: unidades,
            imagen: imagen
        };
        $('#container').html("");
        $('#product-result').hide();
        $.ajax({
            url: 'backend/product-edit.php', 
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(productData),
            success: function(response) {
                let desc = `{
"precio": ${precio}, 
"unidades": ${unidades}, 
"modelo": "${modelo}", 
"marca": "${marca}", 
"detalles": "${detalles}", 
"imagen": "${imagen}"
}`;
                edit = true;
                $('#name').val(productData.nombre);
                $('#description').val(desc);
                $('#productId').val(productData.id);
                document.getElementById("description").value = JsonString;
                document.getElementById("name").value("");

                let result  = typeof response === 'string' ? JSON.parse(response) : response;
                $('#container').append("Status: " + result.status + "<br>");
                $('#container').append("Message: " + result.message + "<br>");
                $('#product-result').show();
            }
        });
    });
}