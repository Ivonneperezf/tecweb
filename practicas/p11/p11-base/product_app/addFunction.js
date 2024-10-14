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
