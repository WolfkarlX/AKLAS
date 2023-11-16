import { getTable, sendForm } from "./fetchAPI.js";

// Elementos DOM
const tbody = document.getElementById("vista-cuerpo");
const botonActualizar = document.querySelector("button[id='btn-actualizar']");
const formTable = document.getElementById("form-table");


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