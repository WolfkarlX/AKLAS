// Importar funciones de API
import { getTable, sendForm, createSelectors, LimitInputs , getData } from "./fetchAPI.js";
import { getTags } from "./tags-controlls.js";

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
let nracks = document.getElementById("RN");
let nfilas = document.getElementById("file");
let nracksE = document.getElementById("input7");
let nfilesE = document.getElementById("input8");
let selectorforarea = document.getElementById("Sarea");
let selectorforcategory = document.getElementById("Scate");
let selectorforsupplier = document.getElementById("Sproovedor");
let Sarea = document.getElementById("input5");
let Scategory = document.getElementById("input4");
let Ssupplier = document.getElementById("input3");
let sidebar = document.getElementById("sidebarid");
let inputForarea = document.getElementById("ar");
let formforarea = document.getElementById("getnrackA");
let btnTags = document.getElementById("btn-tags");
let btn_noti = document.getElementById("notificacion");
let list_noti = document.querySelector(".Notif");
const notificaIcon = document.getElementById("iconoerror");

async function cargarTabla(){
    tbody.innerHTML = "";
    await getTable(urlGetData, tbody);
    if(typeof urlGetTags !== 'undefined')
        getTags();

    btnEliminar.setAttribute("disabled", "");
    btnEdit.setAttribute("disabled", "");
    if(btnTags)
        btnTags.setAttribute("disabled", "");
}

async function cargarNotificaciones() {
    const notifyProducts = await getData("../../controllers/notify-products.php");
    list_noti.innerHTML = "";
    for (const product of notifyProducts) {
        if(product.Falta || product.Sobra){
            const li = document.createElement("li");
            notificaIcon.style.display = "flex";
            li.style.margin = "10";
            li.style.padding = "0";
            li.style.textDecoration = "none";
            li.style.marginBottom = "20px";
            li.textContent = product.ProductName;
            if(product.Falta) li.textContent += "° hace falta producto";
            if(product.Sobra) li.textContent += " Sobra producto";
            list_noti.appendChild(li);
        }
       
    }
}

var celdas = "";

// Agregar evento para ejecutar la función getTable al cargar la página
document.addEventListener("DOMContentLoaded", ()=>{
    cargarTabla();
    cargarNotificaciones();
});

btn_noti.addEventListener("click", cargarNotificaciones);

// Agregar evento para ejecutar la función getTable al hacer click en el botón
botonActualizar.addEventListener("click", () => {
    cargarTabla();
});

// Añadir un evento submit al formulario
form.addEventListener("submit", function(event) {
    // Prevenir el comportamiento por defecto del formulario
    event.preventDefault();
    if(nracks && nfilas){
        if (nracks.hasAttribute("disabled")  || nfilas.hasAttribute("disabled")){
          alert("Seleccione un Área");
        }else{
            var res = sendForm(urlSendData, event.target);
            nracks.setAttribute("disabled", "true");
            nfilas.setAttribute("disabled", "true");
        }
    }else{
        var res = sendForm(urlSendData, event.target);
    }  
    //Enviar solicitud
    if(res){
        res.then(data => {
            if(data){
                alert("El registro se agrego exitosamente");
                //Recargar la tabla
                cargarTabla();
                //Limpia el formulario
                event.target.reset();
                event.target.style.display = "none";
                difuminado.style.display = "none"
                formNormal.style.display = "block";
                formeditado.style.display = "block";
                sidebar.style.zIndex = "8";
            } else {
                alert("No se pudo añadir el registro");
            }
        })
    }
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
                    cargarTabla();
                } else {
                    alert("No se pudo eliminar el registro");
                }
            })
        }
    }
})

form_edit.addEventListener("submit", function(event){
    event.preventDefault();
    if(nracksE && nfilesE){
        if (nracksE.hasAttribute("disabled")  || nfilesE.hasAttribute("disabled")){
          alert("Seleccione un Área");
        }else{
            var res = sendForm(UrlsendEdit, event.target);
        }
    }else{
        var res = sendForm(UrlsendEdit, event.target);
    }
    if(res){
        res.then( data => {
            if(data){
                alert("Se edito correctamente");
                        //Recargar la tabla
                        cargarTabla();
                        event.target.style.display = "none";
                        difuminado.style.display = "none";
                        formNormal.style.display = "block";
                        formeditado.style.display = "block";
                        sidebar.style.zIndex = "8";
                    } else {
                        alert("No se pudo editar el registro");
                    }
            }

        )
    }
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
  }
});

btnEdit.addEventListener("click", ()=>{
    // Recorre las celdas para obtener los valores
    for (let i = 0; i < celdas.length; i++) {
        let valor = celdas[i].textContent;
        if(celdas[4]){
            var indxA = celdas[4].textContent.toString();
            var indxC = celdas[3].textContent.toString();
            var indxS = celdas[2].textContent.toString();
        }
        //se obtienen los objetos y se rellenan con sus respectivos campos
        let object = document.getElementById("input" + (i+1));
        if(object){
            object.value = valor;
            if(object.tagName === "SELECT"){
                let objectid = object.id;
                switch(objectid){
                    case "input3": createSelectors(urlgetSelects_supplier, object, indxS); break;
                    case "input4": createSelectors(urlgetSelects_category, object, indxC); break;
                    case "input5": createSelectors(urlgetSelects_area, object, indxA, nfilesE, nracksE, inputForarea, formforarea, urlGetnracks, urlGetnfiles, 1); break;
                }
            }
        }
    }
    /*if(Sarea){
        if(Sarea.tagName === "SELECT"){
            if(Sarea.name === "area"){
                    let value = Sarea.value;
                    inputForarea.value = value;
                    LimitInputs(formforarea, nracksE, urlGetnracks);
                    LimitInputs(formforarea, nfilesE, urlGetnfiles);
            }
        }
    }*/
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