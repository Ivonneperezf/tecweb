function verificarNombre(nombre) {
    //var nombre = document.getElementById("form-name").value;
    var mensajeError = document.getElementById("error");

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

function verificarMarca(marca) {
    //var marca = document.getElementById("form-marca").value;
    var mensajeError = document.getElementById("error3");

    if (marca === "") {
        mensajeError.textContent = "Por favor, selecciona una marca.";
        return false; // La verificación falla
    } else {
        mensajeError.textContent = ""; 
        return true; // La verificación pasa
    }
}

function verificarModelo(modelo) {
    var mensajeError = document.getElementById("error2");

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

function verificarPrecio(precio) {
    // Convertir el valor a número
    alert(precio);
    var precioNum = parseFloat(precio); 
    var mensajeError = document.getElementById("error5");

    // Validar si es un número válido
    if (isNaN(precioNum)) {
        mensajeError.textContent = "El precio debe ser un número válido.";
        return false; // La verificación falla
    } else if (precioNum < 99.99) {
        mensajeError.textContent = "El precio debe ser mayor a 99.99";
        return false; // La verificación falla
    } else {
        mensajeError.textContent = ""; 
        return true; // La verificación pasa
    }
}

function verificarDetalles(detalles){
    //var detalles = document.getElementById("form-detalles").value;
    var mensajeError = document.getElementById("error4");

    if (detalles.trim() === "") {
        mensajeError.textContent = ""; 
        return true; // Se permite un campo vacío
    } else if (detalles.length > 250) {
        mensajeError.textContent = "Los detalles son demasiado largo";
        return false; // La verificación falla
    } else {
        mensajeError.textContent = ""; 
        return true; // La verificación pasa
    }
}

function verificarUnidades(unidades) {
    // Convertir el valor a número
    var unidadesNum = parseInt(unidades, 10); 
    var mensajeError = document.getElementById("error");

    // Validar si es un número válido
    if (isNaN(unidadesNum)) {
        mensajeError.textContent = "El número de unidades debe ser un número válido.";
        return false; // La verificación falla
    } else if (unidadesNum < 0) {
        mensajeError.textContent = "Debe de haber al menos 0 unidades";
        return false; // La verificación falla
    } else {
        mensajeError.textContent = ""; 
        return true; // La verificación pasa
    }
}

function verificarImagen(imagenRuta) {
    var imgExistente = document.getElementById("imagenExistente");

    // Verificar si se proporcionó una ruta de imagen
    if (imagenRuta && imagenRuta.trim() !== "") {
        imgExistente.src = imagenRuta; // Establecer la ruta de la imagen proporcionada
    } else {
        imgExistente.src = "<?= !empty($_POST['imagen']) ? $_POST['imagen'] : 'imagenPorDefecto.png' ?>"; // Imagen por defecto
    }
}

function verificarImagenhtml(imagenRuta) {
    var imgExistente = document.getElementById("imagenExistente");

    // Verificar si se proporcionó una ruta de imagen
    if (imagenRuta && imagenRuta.trim() !== "") {
        imgExistente.src = imagenRuta; // Establecer la ruta de la imagen proporcionada
        imgExistente.style.display = 'block'; // Mostrar la imagen
    } else {
        imgExistente.src = ""; // No hay imagen
        imgExistente.style.display = 'none'; // Ocultar la imagen
    }
}

function buscarProducto(e) {
    e.preventDefault();
    var consulta = document.getElementById('search').value;
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        if (client.readyState == 4 && client.status == 200) {
            let productos = JSON.parse(client.responseText);
            if (productos.length > 0) {
                let template = ''; 
                productos.forEach(function(producto) {
                    let descripcion = `
                        <li>precio: ${producto.precio}</li>
                        <li>unidades: ${producto.unidades}</li>
                        <li>modelo: ${producto.modelo}</li>
                        <li>marca: ${producto.marca}</li>
                        <li>detalles: ${producto.detalles}</li>
                    `;
                    template += `
                        <tr>
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;
                });
                document.getElementById("productos").innerHTML = template;
            } else {
                document.getElementById("productos").innerHTML = "<tr><td colspan='3'>No se encontraron productos</td></tr>";
            }
        }
    };
    client.send("consulta=" + encodeURIComponent(consulta));
}


function agregarProducto(e) {
    e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);

    // OBTENEMOS EL NOMBRE DEL PRODUCTO DESDE EL DOM
    var nombre = document.getElementById("name").value;
    
    // Verificar cada campo utilizando los datos del JSON
    var nombreValido = verificarNombre(nombre); // Verificación del nombre
    var marcaValida = verificarMarca(finalJSON.marca);
    var modeloValido = verificarModelo(finalJSON.modelo);
    var precioValido = verificarPrecio(finalJSON.precio);
    var detallesValidos = verificarDetalles(finalJSON.detalles);
    var unidadesValidas = verificarUnidades(finalJSON.unidades);

    // Si alguna verificación falla, no enviar el producto
    if (!nombreValido || !marcaValida || !modeloValido || !precioValido || !detallesValidos || !unidadesValidas) {
        window.alert("Por favor, corrige los errores antes de enviar.");
        return; // No se continúa con el envío
    } 

    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = nombre;

    // SE OBTIENE EL STRING DEL JSON FINAL
    productoJsonString = JSON.stringify(finalJSON, null, 2);

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            window.alert("El envío fue exitoso");
            console.log(client.responseText);
            window.alert(client.responseText); // Muestra la respuesta del servidor
        }
    };
    client.send(productoJsonString);
}

function verificarInput() {
    var nombre = document.getElementById("name").value;
    var productoJsonString = document.getElementById('description').value;
    var mensajeError = document.getElementById("error");
    mensajeError.textContent = ""; // Limpiar el mensaje de error antes de verificar

    var nombreValido = verificarNombre(nombre);

    if (nombreValido) {
        try {
            var finalJSON = JSON.parse(productoJsonString);
            var marcaValida = verificarMarca(finalJSON.marca);
            var modeloValido = verificarModelo(finalJSON.modelo);
            var precioValido = verificarPrecio(finalJSON.precio);
            var detallesValidos = verificarDetalles(finalJSON.detalles);
            var unidadesValidas = verificarUnidades(finalJSON.unidades);
            
            if (marcaValida && modeloValido && precioValido && detallesValidos && unidadesValidas) {
                mensajeError.textContent = ""; // Limpiar mensaje de error si todo es válido
            }
        } catch (error) {
            mensajeError.textContent = "Error en el formato del JSON, algún dato es incorrecto" ;
        }
    } 
}