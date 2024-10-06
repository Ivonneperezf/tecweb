function agregarAtributo(form, tipo, nombre, valor) {
    var ValorIn = document.createElement("input");
    ValorIn.type = tipo;
    ValorIn.name = nombre;
    ValorIn.value = valor;
    form.appendChild(ValorIn);
}

function send2form(nombre, marca, modelo, precio, unidades, detalles) {
    var form = document.createElement("form");

    agregarAtributo(form, 'text', 'nombre', nombre);
    agregarAtributo(form, 'text', 'marca', marca);
    agregarAtributo(form, 'text', 'modelo', modelo);
    agregarAtributo(form, 'number', 'precio', precio);
    agregarAtributo(form, 'text', 'detalles', detalles);
    agregarAtributo(form, 'number', 'unidades', unidades);

    console.log(form);

    form.method = 'POST';
    form.action = 'http://localhost/tecweb/practicas/p10/formulario_productos.html';  

    document.body.appendChild(form);
    form.submit();
}

function show(event){
    var rowId = event.target.parentNode.parentNode.id;
    var data = document.getElementById(rowId).querySelectorAll("td");
    alert(data[7].innerHTML);
    var nombre = data[0].innerHTML;
    var marca = data[1].innerHTML;
    var modelo = data[2].innerHTML;
    var precio = data[3].innerHTML;
    var unidades = data[4].innerHTML;
    var detalles = data[5].innerHTML;
    send2form(nombre, marca, modelo, precio, unidades, detalles);
}