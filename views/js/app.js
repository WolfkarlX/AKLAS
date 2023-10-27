// Importar funciones de API
import { getTable, sendForm } from "./fetchAPI.js";

// Elementos DOM
const tbody = document.getElementById("vista-cuerpo");
const botonActualizar = document.querySelector("button[id='btn-actualizar']");
const btnEliminar = document.getElementById("btn-delete");
const form = document.getElementById("myForm");
const formTable = document.getElementById("form-table");
const filter = document.getElementById("filter");
const tabla = document.getElementById('vista');
const btnEdit = document.getElementById("btn-edit");
const form_edit = document.getElementById("edit-form");
const difuminado = document.getElementById("difuminado");
const formNormal = document.querySelector("#form-normal"); //div del formulario
const formeditado = document.querySelector("#form-editado"); //div del formulario editado

var celdas = ""


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
            difuminado.style.display = "none"
            formNormal.style.display = "block";
            formeditado.style.display = "block";
        } else {
            alert("No se pudo añadir el registro");
        }
    })
})

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
                    //Recargar la tabla
                    tbody.innerHTML = "";
                    getTable(urlGetData, tbody);
                    btnEliminar.setAttribute("disabled", "");
                    btnEdit.setAttribute("disabled", "")
                } else {
                    alert("No se pudo eliminar el registro");
                }
            })
        }
    }
})

form_edit.addEventListener("submit", function(event){
    event.preventDefault();
    let res = sendForm(UrlsendEdit, event.target);
    res.then( data => {
        if(data){
            alert("Se edito correctamente");
                    //Recargar la tabla
                    tbody.innerHTML = "";
                    getTable(urlGetData, tbody);
                    btnEdit.setAttribute("disabled", "");
                    btnEliminar.setAttribute("disabled", "");
                    event.target.reset();
                    event.target.style.display = "none";
                    difuminado.style.display = "none";
                    formNormal.style.display = "block";
                    formeditado.style.display = "block";
                } else {
                    alert("No se pudo editar el registro");
                }
        }

    )

})

//Script para obtener los valores de la fila de la tabla
// Agrega un evento 'click' a la tabla
tabla.addEventListener('click', function(e) {
  // Asegúrate de que se haya hecho clic en una fila (tr)
  if (e.target.tagName === 'TD') {
    // Obtén la fila (tr) que contiene la celda (td) en la que se hizo clic
    let fila = e.target.parentElement;

    // Obtiene todas las celdas (td) de la fila seleccionada
    celdas = fila.getElementsByTagName('td');
    
    // Recorre las celdas para obtener los valores
    /*for (let i = 0; i < celdas.length; i++) {
      let valor = celdas[i].textContent;
      let object = document.getElementById("input" + (i+1));
      object.value = valor;
    }*/
  }
});

btnEdit.addEventListener("click", ()=>{
    // Recorre las celdas para obtener los valores
    for (let i = 0; i < celdas.length; i++) {
        let valor = celdas[i].textContent;
        let object = document.getElementById("input" + (i+1));
        object.value = valor;
    }
})

/*Script para filtrar registros en una tabla*/
    filter.addEventListener("keyup", function(event) {
        if (event.key == "Escape") event.target.value = "";
        const registers = document.querySelectorAll("#vista-cuerpo tr");
        registers.forEach(data => {
            let rawContent = data.innerHTML.replaceAll("<td>", "").replaceAll("</td>", "");
            rawContent.toLowerCase().includes(event.target.value.toLowerCase())
            ?data.style.display = ""
            :data.style.display = "none";
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