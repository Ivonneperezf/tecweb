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
    eliminarProducto();
    // SE LISTAN TODOS LOS PRODUCTOS
    listarProductos();
    agregarProducto();
}

function listarProductos(){
    $.ajax({
        url: 'backend/product-list.php',
        type: 'GET',
        success: function(response){
            //console.log(response);
            let products = JSON.parse(response);
            let template = '';
            products.forEach(product => {

                let descripcion = '';
                descripcion += '<li>precio: '+product.precio+'</li>';
                descripcion += '<li>unidades: '+product.unidades+'</li>';
                descripcion += '<li>modelo: '+product.modelo+'</li>';
                descripcion += '<li>marca: '+product.marca+'</li>';
                descripcion += '<li>detalles: '+product.detalles+'</li>';

                template += `<tr productId = "${product.id}">
                    <td>${product.id}</td>
                    <td>${product.nombre}</td>
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
            // Si no hay búsqueda, se muestran todos los productos
            listarProductos();  // Línea agregada
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

                // Ahora actualizamos la tabla de productos
                let productTableTemplate = '';  // Línea agregada
                products.forEach(product => {  // Línea agregada
                    let descripcion = '';  // Línea agregada
                    descripcion += '<li>precio: '+product.precio+'</li>';  // Línea agregada
                    descripcion += '<li>unidades: '+product.unidades+'</li>';  // Línea agregada
                    descripcion += '<li>modelo: '+product.modelo+'</li>';  // Línea agregada
                    descripcion += '<li>marca: '+product.marca+'</li>';  // Línea agregada
                    descripcion += '<li>detalles: '+product.detalles+'</li>';  // Línea agregada

                    productTableTemplate += `<tr productId="${product.id}">  // Línea agregada
                        <td>${product.id}</td>
                        <td>${product.nombre}</td>
                        <td><ul>${descripcion}</ul></td>
                        <td>
                            <button class="product-delete btn btn-danger">
                                Eliminar
                            </button>
                        </td>
                    </tr>`;  // Línea agregada
                });
                $('#products').html(productTableTemplate);  // Línea agregada
            }
        });
    });
}


function agregarProducto() {
    $('#product-form').submit(function(e) {
        e.preventDefault();
        
        const jsonData = $('#description').val();
        let productData;

        try {
            productData = JSON.parse(jsonData);
        } catch (error) {
            alert("Error: El JSON no está bien definido.");
            return;
        }
        const nombre = $('#name').val().trim();
        const precio = productData.precio;
        const unidades = productData.unidades;
        const modelo = productData.modelo;
        if (!nombre) {
            alert("Inserte elnombre del product");
            return;
        }
        if (!modelo || /[^a-zA-Z0-9-]/.test(modelo)) {
            alert("El modelo no debe contener caracteres especiales");
            return;
        }
        if (precio < 100) {
            alert("El precio debe ser mayor 99.99");
            return;
        }
        if (unidades < 0) {
            alert("Las unidades no pueden ser menores a 0");
            return;
        }
        if (!nombre || !modelo || !precio || !unidades || !productData.marca || !productData.detalles || !productData.imagen) {
            alert("Datos incompletos. Inserte los datos correspondientes");
            return;
        }
        const postData = {
            nombre: nombre,
            marca: productData.marca,
            modelo: modelo,
            precio: precio,
            unidades: unidades,
            detalles: productData.detalles,
            imagen: productData.imagen
        };
        $.ajax({
            url: 'backend/product-add.php',
            type: 'POST',
            contentType: 'application/json',  
            data: JSON.stringify(postData),   
            success: function(response) {
                let result = JSON.parse(response);
                if (result.status === "success") {
                    alert("Registro exitoso");
                    listarProductos();  // Función para listar los productos después de agregar
                    $('#product-form').trigger('reset');
                    $('#description').val(JSON.stringify(baseJSON, null, 2));  // Restablecer el JSON base
                } else {
                    alert("Error al registrar el producto: " + result.message);
                }
            },
            error: function(xhr, status, error) {
                alert("Error en la solicitud: " + error);
            }
        });
    });
}

function eliminarProducto() {
    $(document).on('click', '.product-delete', function() {
        if(confirm('¿Seguro que desea eliminar este producto?')){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('productId');
            $.get('backend/product-delete.php', {id}, function(response){
                listarProductos();
                //console.log(response);
            })
        }
    });
}