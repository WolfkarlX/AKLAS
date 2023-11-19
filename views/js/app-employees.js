import { getTable, sendForm } from "./fetchAPI.js";

// Elementos DOM
const tbody = document.getElementById("vista-cuerpo");
const botonActualizar = document.querySelector("button[id='btn-actualizar']");
const formTable = document.getElementById("form-table");
const idkey = document.getElementById("employeN"); 
const send = document.getElementById("send");


async function cargarTabla(){
    tbody.innerHTML = "";
    await getTable(urlGetData, tbody);
}

// Agregar evento para ejecutar la función getTable al cargar la página
document.addEventListener("DOMContentLoaded", ()=>{
    cargarTabla();
});

botonActualizar.addEventListener("click", () => {
    cargarTabla();
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

send.addEventListener("click", (e)=>{
    //e.preventDefault();
    if(idkey){
        idkey.value = createId();
    }
})


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
