// Importar funciones de API
import { getTable, sendForm } from "./fetchAPI.js";

// Elementos DOM
const tbody = document.getElementById("vista-cuerpo");
const botonActualizar = document.querySelector("button[id='btn-actualizar']");
const form = document.getElementById("myForm");

// Agregar evento para ejecutar la función getTable al cargar la página
document.addEventListener("DOMContentLoaded", () => getTable(urlGetData, tbody));

// Agregar evento para ejecutar la función getTable al hacer click en el botón
botonActualizar.addEventListener("click", () => {
    tbody.innerHTML = "";
    getTable(urlGetData, tbody);
});

// Añadir un evento submit al formulario
form.addEventListener("submit", function(event) {
    // Prevenir el comportamiento por defecto del formulario
    event.preventDefault();
    //Enviar solicitud
    let res = sendForm(urlSendData, event.target);
    res.then(data => {
        if(data){
            alert("El registro se agrego exitosamente");
            //Recargar la tabla
            tbody.innerHTML = "";
            getTable(urlGetData, tbody);
            //Cierra el formulario
            closeForm();
            //Limpia el formulario
            event.target.reset();
        }
    })
})