import { getTable, sendForm } from "./fetchAPI.js";

// Elementos DOM
const tbody = document.getElementById("vista-cuerpo");
const botonActualizar = document.querySelector("button[id='btn-actualizar']");
const formTable = document.getElementById("form-table");
const idkey = document.getElementById("input6");
const names =  document.getElementById("input2");
const lastnames = document.getElementById("input3");
const description = document.getElementById("input4");
const rol = document.getElementById("input5");
const email =document.getElementById("imail");
const pasword = document.getElementById("passw");
const confirmpassword = document.getElementById("passw1"); 
const nemail = document.getElementById("Nemail");
const send = document.getElementById("send");
const btn_edit = document.getElementById("btn-edit");
const tabla = document.getElementById("vista");
var celdas = "";
const title = document.getElementById("title");
const secret = document.getElementById("secret");
const formusers = document.getElementById("form-users");

async function cargarTabla(){
    tbody.innerHTML = "";
    await getTable(urlGetData, tbody);
}

// Agregar evento para ejecutar la función getTable al cargar la página
document.addEventListener("DOMContentLoaded", ()=>{
    cargarTabla();
});
// al clickear el boton de actualizar se cambian los nombres de los botones y valores del formulario
botonActualizar.addEventListener("click", () => {
    cargarTabla();
    title.innerText = "Nuevo Empleado";
    secret.innerText = "Contraseña:";
    send.value = "Crear";
    formusers.reset();
    idkey.value = "";
    formusers.setAttribute("action", "../../controllers/register.php");
});


// Añadir evento submit al formulario de eliminacion
formTable.addEventListener("submit", function(event) {
    event.preventDefault();
    const registro = event.target.elements.registro.value;
    if (registro) {
        if (confirm("Seguro que desea eliminar este registro: " + registro)) {
            let res = sendForm(urlSendRegister, event.target);
            res.then(data => {
                if(data){
                    alert("Se elimino el registro correctamente");
                    cargarTabla();
                } else {
                    alert("No se pudo eliminar el registro");
                }
            })
        }
    }
})

// se obtienen los valores de la tabla
tabla.addEventListener('click', function(e) {
    // Asegúrate de que se haya hecho clic en una fila (tr)
      if (e.target.tagName === 'TD') {
      // Obtén la fila (tr) que contiene la celda (td) en la que se hizo clic
          let fila = e.target.parentElement;
          // Obtiene todas las celdas (td) de la fila seleccionada
          celdas = fila.getElementsByTagName('td');
    }
});

// al hacer click en el boton de editar se obtienen 
//los inputs y se asignan los valores
btn_edit.addEventListener("click", ()=>{
    for (let i = 0; i < celdas.length; i++) {
        let valor = celdas[i].textContent;
        let object = document.getElementById("input" + (i+1));
        if(object){
            object.value = valor;
        }
    }   //cambia los nombres de los titulos y valores de los formularios
    title.innerText = "Editar Usuario";
    secret.innerText = "Nueva contraseña";
    send.value = "Editar";
    nemail.innerText = "Nuevo E-mail:";
    names.setAttribute("required", "");
    lastnames.setAttribute("required", "");
    rol.setAttribute("required", "");
    email.setAttribute("required", "");
    pasword.setAttribute("required", "");
    confirmpassword.setAttribute("required", "");
    formusers.setAttribute("action", "../../controllers/edit-user.php");
})


// llena el input con el numero de cuenta automatico
send.addEventListener("click", (e)=>{
    //e.preventDefault();
    if(idkey){
        if(idkey.name === "IdKey" && idkey.value === ""){
            idkey.value = createId();
        }
    }
})

//Funcion que crea los numeros de cuenta automaticamente
function createId(){
    let date = new Date();
    let year = date.getFullYear() %100;
    var month = date.getMonth() + 1;
    month = month.toString();
    
    if(month.length < 2){
        console.log("esmenor a 2")
        month = "0" + month;
    }

    let digitos = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

  // Mezclar los dígitos de forma aleatoria
    for (var i = digitos.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
    // Intercambiar elementos
        [digitos[i], digitos[j]] = [digitos[j], digitos[i]];
    }

  // Tomar los primeros 4 dígitos del array
    let randomN = digitos.slice(0, 4).join('');
    let key = year + month + randomN;
    return key;
}
