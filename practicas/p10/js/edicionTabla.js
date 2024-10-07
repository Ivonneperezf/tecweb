function agregarAtributo(form, tipo, nombre, valor) {
    var ValorIn = document.createElement("input");
    ValorIn.type = tipo;
    ValorIn.name = nombre;
    if (tipo !== 'file') {
        ValorIn.value = valor; 
    }
    form.appendChild(ValorIn);
}

function send2form(nombre, marca, modelo, precio, unidades, detalles,imagen) {
    var form = document.createElement("form");
    agregarAtributo(form, 'text', 'nombre', nombre);
    agregarAtributo(form, 'text', 'marca', marca);
    agregarAtributo(form, 'text', 'modelo', modelo);
    agregarAtributo(form, 'number', 'precio', precio);
    agregarAtributo(form, 'text', 'detalles', detalles);
    agregarAtributo(form, 'number', 'unidades', unidades);
    if (imagen) {
        var srcMatch = imagen.match(/src="([^"]+)"/);
        agregarAtributo(form, 'text', 'imagen', srcMatch[1]);
    }

    console.log(form);

    form.method = 'POST';
    form.action = 'http://localhost/tecweb/practicas/p10/formulario_productos_v2.php';  

    document.body.appendChild(form);
    form.submit();
}

function show(event){
    var rowId = event.target.parentNode.parentNode.id;
    var data = document.getElementById(rowId).querySelectorAll("td");
    var nombre = data[0].innerHTML;
    var marca = data[1].innerHTML;
    var modelo = data[2].innerHTML;
    var precio = data[3].innerHTML;
    var unidades = data[4].innerHTML;
    var detalles = data[5].innerHTML;
    var imagen = data[6].innerHTML;
    send2form(nombre, marca, modelo, precio, unidades, detalles,imagen);
}

function show2(event) {
    var row = event.target.closest('tr'); 
    var rowId = row.id; 
    var idNumber = parseInt(rowId.split('-')[1]) + 1;
    var data = row.querySelectorAll("td");
    var nombre = data[0].innerHTML;
    var marca = data[1].innerHTML;
    var modelo = data[2].innerHTML;
    var precio = data[3].innerHTML;
    var unidades = data[4].innerHTML;
    var detalles = data[5].innerHTML;
    var imagen = data[6].innerHTML;
    send2form(nombre, marca, modelo, precio, unidades, detalles, imagen); 
}

