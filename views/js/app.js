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
            //Limpia el formulario
            event.target.reset();
            event.target.style.display = "none";
        }
    })
})


/*Script para eliminar espacios en blanco del html */ 
    function eliminarEspacios() {
        // Obtén el contenido del textarea
        var input = document.getElementById("Desc")
        var textarea = document.getElementById("Name");
        var contenido = textarea.value;
        var content = input.value;

        // Reemplaza todos los espacios en blanco con una cadena vacía
        var contenidoSinEspacios = contenido.replace(/\s+/g, '');
        var contentwithouthspace = content.replace(/\s+/g, '');
        // Verifica si el contenido después de quitar los espacios es vacío
        if (contenidoSinEspacios === '') {
        // Si es vacío, establece el contenido del textarea como vacío
            textarea.value = '';
        }
        if(contentwithouthspace === ''){
            input.value = '';
        }
    }