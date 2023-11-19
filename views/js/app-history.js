import { createRows, sendData } from "./fetchAPI.js";

// Elementos DOM
const tbody = document.getElementById("vista-cuerpo");
const botonActualizar = document.querySelector("button[id='btn-actualizar']");
const formTable = document.getElementById("form-table");

function getParameterByName(name) {
    const url = location.search;
    const regex = new RegExp(`[&?]${name}=([^&#]*)`);
    const results = regex.exec(url);
    return results === null ? "" : decodeURIComponent(results[1]);
  }

async function cargarTabla(){
    tbody.innerHTML = "";
    let register = getParameterByName("registro");
    let datos = await sendData(urlGetTransactionDetails, {registro: register});
    createRows(datos, tbody);
}

// Agregar evento para ejecutar la función getTable al cargar la página
document.addEventListener("DOMContentLoaded", cargarTabla);

botonActualizar.addEventListener("click", cargarTabla);
