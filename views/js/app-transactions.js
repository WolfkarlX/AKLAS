import { getTable } from "./fetchAPI.js";

// Elementos DOM
const tbody = document.getElementById("vista-cuerpo");
const botonActualizar = document.querySelector("button[id='btn-actualizar']");
const btnHistorial = document.getElementById("btn-history");
const formTable = document.getElementById("form-table");


async function cargarTabla(){
    tbody.innerHTML = "";
    await getTable(urlGetData, tbody);
    if(btnHistorial)
        btnHistorial.setAttribute("disabled", "");
}

// Agregar evento para ejecutar la función getTable al cargar la página
document.addEventListener("DOMContentLoaded", cargarTabla);

botonActualizar.addEventListener("click", cargarTabla);
