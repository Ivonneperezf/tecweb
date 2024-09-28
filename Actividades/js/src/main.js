function getDatos(){
    var nombre = window.prompt("Nombre: ","");
    var edad = window.prompt("Edad: ","");

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3>Nombre:'+ nombre+'</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3>Edad:'+ edad +'</h3>';
}

//Ejercicio 1
function holaMundo(){
    var div1 = document.getElementById("ejemplo1");
    div1.innerHTML = "Hola Mundo";
}

//Ejercicio 2
function variablesSinPrompt(){
    var div1 = document.getElementById("ejemplo2");
    var nombre = 'Juan';
    var edad = 10;
    var altura = 1.92;
    var casado = false;
    div1.innerHTML = nombre + '<br>' + edad + '<br>' + altura + '<br>' + casado;
}

//Ejercicio 3
function variablesConPrompt(){
    var div1 = document.getElementById("ejemplo3");
    var nombre;
    var edad;
    nombre = prompt('Ingresa tu nombre:', '');
    edad = prompt('Ingresa tu edad:', '');
    div1.innerHTML = 'Hola '+nombre+' así que tienes '+edad+' años';
}

//Ejercicio 4
function proEstructurada(){
    var div1 = document.getElementById("ejemplo4");
    var valor1;
    var valor2;
    valor1 = prompt('Introducir primer número:', '');
    valor2 = prompt('Introducir segundo número', '');
    var suma = parseInt(valor1)+parseInt(valor2);
    var producto = parseInt(valor1)*parseInt(valor2);
    div1.innerHTML = 'La suma es '+suma+'<br>'+'El producto es '+producto;
}

//Ejercicio 5
function sentenciaIf(){
    var div1 = document.getElementById("ejemplo5");
    var nombre;
    var nota;
    nombre = prompt('Ingresa tu nombre:', '');
    nota = prompt('Ingresa tu nota:', '');
    if (nota>=4) {
        div1.innerHTML =nombre+' esta aprobado con un '+nota;
    }
}

//Ejercicio 6
function sentenciaIfElse(){
    var div1 = document.getElementById("ejemplo6");
    var num1,num2;
    num1 = prompt('Ingresa el primer número:', '');
    num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);
    if (num1>num2) {
        div1.innerHTML = 'el mayor es '+num1;
    }
    else {
        div1.innerHTML = 'el mayor es '+num2;
    }
}

//Ejercicio 7
function sentenciaIfElseAnidados(){
    var nota1,nota2,nota3;
    var div1 = document.getElementById("ejemplo7");
    nota1 = prompt('Ingresa 1ra. nota:', '');
    nota2 = prompt('Ingresa 2da. nota:', '');
    nota3 = prompt('Ingresa 3ra. nota:', '');

    //Convertimos los 3 string en enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var pro;
    pro = (nota1+nota2+nota3)/3;
    if (pro>=7) {
        div1.innerHTML = 'aprobado';
    }else {
        if (pro>=4) {
            div1.innerHTML = 'regular';
        }else {
            div1.innerHTML = 'reprobado';
        }
    }
}

//Ejercicio 8
function sentenciaSwitch(){
    var div1 = document.getElementById("ejemplo8");
    var valor;
    valor = prompt('Ingresar un valor comprendido entre 1 y 5:', '' );
    //Convertimos a entero
    valor = parseInt(valor);
    switch (valor) {
        case 1: div1.innerHTML = 'uno';
            break;
        case 2: div1.innerHTML = 'dos';
            break;
        case 3: div1.innerHTML = 'tres';
            break;
        case 4: div1.innerHTML = 'cuatro';
            break;
        case 5: div1.innerHTML = 'cinco';
            break;
        default:div1.innerHTML = 'debe ingresar un valor comprendido entre 1 y 5.';
    }
}

//Ejercicio 9
function sentenciaSwitchColores(){
    var col;
    col = prompt('Ingresa el color con que quierar pintar el fondo de la ventana (rojo, verde, azul)' , '' );
    switch (col) {
        case 'rojo': document.bgColor='#ff0000';
            break;
        case 'verde': document.bgColor='#00ff00';
            break;
        case 'azul': document.bgColor='#0000ff';
            break;
    }
}

//Ejercicio 10
function cicloWhile(){
    var div1 = document.getElementById("ejemplo10");
    var x;
    x=1;
    while (x<=100) {
        div1.innerHTML += '<br>'+x;
        x+=1;
    }
}

//Ejercicio 11
function acumulador(){
    var div1 = document.getElementById("ejemplo11");
    var x=1;
    var suma=0;
    var valor;
    while (x<=5){
        valor = prompt('Ingresa el valor:', '');
        valor = parseInt(valor);
        suma = suma+valor;
        x = x+1;
    }
    div1.innerHTML = "La suma de los valores es "+suma+"<br>";
}

//Ejercicio 12
function cicloDoWhile(){
    var div1 = document.getElementById("ejemplo12");
    var valor;
    div1.innerHTML += '<br>';
    do{
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);
        div1.innerHTML += 'El valor '+valor+' tiene ';
        if (valor<10)
            div1.innerHTML += 'Tiene 1 dígitos';
        else if (valor<100) {
            div1.innerHTML += 'Tiene 2 dígitos';
        }else {
            div1.innerHTML += 'Tiene 3 dígitos';
        }
        div1.innerHTML +='<br>';
    }while(valor!=0);
}

//Ejercicio 13
function ciclofor(){
    var div1 = document.getElementById("ejemplo13");
    var f;
    div1.innerHTML += '<br>';
    for(f=1; f<=10; f++){
        div1.innerHTML += f+" ";
    }
}

//Ejercicio 14
function funcionSinFuncion(){
    var div1 = document.getElementById("ejemplo14");
    div1.innerHTML += "<br>Cuidado<br>";
    div1.innerHTML += "Ingresa tu documento correctamente<br>";
    div1.innerHTML += "Cuidado<br>";
    div1.innerHTML += "Ingresa tu documento correctamente<br>";
    div1.innerHTML += "Cuidado<br>";
    div1.innerHTML += "Ingresa tu documento correctamente<br>";
}

//Ejercicio 15
function mostrarMensaje() {
    var div1 = document.getElementById("ejemplo15");
    div1.innerHTML += "Cuidado<br>";
    div1.innerHTML += "Ingresa tu documento correctamente<br>";
}

function funcionConFuncion(){
    var div1 = document.getElementById("ejemplo15");
    div1.innerHTML += "<br>";
    mostrarMensaje();
    mostrarMensaje();
    mostrarMensaje();
}

//Ejercicio 16
function mostrarRango(x1,x2) {
    var div1 = document.getElementById("ejemplo16");
    var inicio;
    for(inicio=x1; inicio<=x2; inicio++) {
        div1.innerHTML += inicio+' ';
    }
}

function funcionConDatosEntrada(){
    var div1 = document.getElementById("ejemplo16");
    div1.innerHTML = "<br>";
    var valor1,valor2;
    valor1 = prompt('Ingresa el valor inferior:', '');
    valor1 = parseInt(valor1);
    valor2 = prompt('Ingresa el valor superior:', '');
    valor2 = parseInt(valor2);
    mostrarRango(valor1,valor2);
}

//Ejercicio 17
function convertirCastellano(x) {
    if(x==1)
        return "uno";
    else if(x==2)
        return "dos";
    else if(x==3)
        return "tres";
    else if(x==4)
        return "cuatro";
    else if(x==5)
        return "cinco";
    else
        return "valor incorrecto";
}

function funcionRetornoVal(){
    var div1 = document.getElementById("ejemplo17");
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    div1.innerHTML = r;
}


//Ejercicio 18
function switchCase(x){
    switch (x) {
        case 1: return "uno";
        case 2: return "dos";
        case 3: return "tres";
        case 4: return "cuatro";
        case 5: return "cinco";
        default: return "valor incorrecto";
    }
}

function switchcaseLect(){
    var div1 = document.getElementById("ejemplo18");
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = switchCase(valor);
    div1.innerHTML = r;
}