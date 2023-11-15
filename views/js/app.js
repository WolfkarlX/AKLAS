// Importar funciones de API
import { getTable, sendForm, createSelectors, LimitInputs , getData, sendData, getFilter, setOptions } from "./fetchAPI.js";
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
let tagList = document.getElementById("tag-list");
let product_id = document.getElementById("hid_product_id");
let tagSelects = document.querySelectorAll(".tag-select");
let tagForm = document.getElementById("tagsForm");
let btn_noti = document.getElementById("notificacion");
let list_noti = document.querySelector(".Notif");
const HeaderS = document.getElementById("head-option");
const selectfrom = document.getElementById("selectfrom"); 
const notificaIcon = document.getElementById("iconoerror");
const listaNotif = document.querySelector("li");

async function cargarTabla(){
    tbody.innerHTML = "";
    await getTable(urlGetData, tbody);
    if(typeof urlGetTags !== 'undefined')
        getTags();

    btnEliminar.setAttribute("disabled", "");
    btnEdit.setAttribute("disabled", "");
    if(selectfrom){
        selectfrom.selectedIndex = 0;
        selectfrom.setAttribute("disabled", "");
    }

    if(HeaderS){
        HeaderS.selectedIndex = 0;
    }
    
    if(btnTags)
        btnTags.setAttribute("disabled", "");
}

async function cargarNotificaciones() {
    const notifyProducts = await getData("../../controllers/notify-products.php");
    list_noti.innerHTML = "";
    let hasLi = false;
    for (const product of notifyProducts) {
        if(product.Falta || product.Sobra){
            const li = document.createElement("li");
            li.id = "listanoti";
            li.style.margin = "10";
            li.style.padding = "0";
            li.style.textDecoration = "none";
            li.style.marginBottom = "20px";
            li.textContent = product.ProductName;
            if(product.Falta) li.textContent += "° hace falta producto";
            if(product.Sobra) li.textContent += " Sobra producto";
            list_noti.appendChild(li);
            hasLi = true;
        }
       
    }
    if(hasLi) {
        notificaIcon.style.display = "flex";
    } else {
        notificaIcon.style.display = "none";
    }
}
const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
        if (mutation.type === 'childList') {
            if (list_noti.children.length > 0) {
                notificaIcon.style.display = "flex";
            } else {
                notificaIcon.style.display = "none";
            }
        }
    });
});

observer.observe(list_noti, { childList: true });

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
                if(HeaderS && selectfrom ){
                    if(HeaderS.value !== "" && selectfrom.value === ""){
                        let valor = HeaderS.value;
                        switch(valor){
                            case "1": 
                            getFilter(urlFilter_Area, tbody, 0);
                            break;
                            case "2": 
                            getFilter(urlFilter_Categoría, tbody, 0);
                            break;
                            case "3": getFilter(urlFilter_Supplier, tbody, 0);
                            break;
                        }
                    }
                    else if(HeaderS.value !== "" && selectfrom.value !== ""){
                        let valor = HeaderS.value;
                        console.log(valor)
                        console.log(selectfrom.value);
                        switch(valor){
                            case "1": getFilter(urlFilter_especeficArea, tbody, selectfrom.value);break;
                            case "2": getFilter(urlFilter_especeficCategory, tbody, selectfrom.value);break;
                            case "3": getFilter(urlFilter_especeficSupplier, tbody, selectfrom.value);break;
                        }
                        
                    }else{
                        cargarTabla();
                    }
                }else{
                    cargarTabla();
                }
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
                    if(HeaderS && selectfrom ){
                        if(HeaderS.value !== "" && selectfrom.value === ""){
                            let valor = HeaderS.value;
                            switch(valor){
                                case "1": 
                                getFilter(urlFilter_Area, tbody, 0);
                                break;
                                case "2": 
                                getFilter(urlFilter_Categoría, tbody, 0);
                                break;
                                case "3": getFilter(urlFilter_Supplier, tbody, 0);
                                break;
                            }
                        }
                        else if(HeaderS.value !== "" && selectfrom.value !== ""){
                            let valor = HeaderS.value;
                            switch(valor){
                                case "1": getFilter(urlFilter_especeficArea, tbody, selectfrom.value);break;
                                case "2": getFilter(urlFilter_especeficCategory, tbody, selectfrom.value);break;
                                case "3": getFilter(urlFilter_especeficSupplier, tbody, selectfrom.value);break;
                            } 
                        }
                        else{
                            cargarTabla();
                        }  
                    }else{
                        cargarTabla();
                    }
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
                //if(localStorage.getItem("Filtered") === "true" && localStorage.getItem("Filtered_esp") !== "true"){
                if(HeaderS && selectfrom ){
                    if(HeaderS.value !== "" && selectfrom.value === ""){
                        let valor = HeaderS.value;
                        console.log(valor);
                        switch(valor){
                            case "1": 
                            getFilter(urlFilter_Area, tbody, 0);
                            break;
                            case "2": 
                            getFilter(urlFilter_Categoría, tbody, 0);
                            break;
                            case "3": getFilter(urlFilter_Supplier, tbody, 0);
                            break;
                        }
                    }//if(localStorage.getItem("Filtered") === "true" && localStorage.getItem("Filtered_esp") === "true"){
                    else if(HeaderS.value !== "" && selectfrom.value !== ""){
                        let valor = HeaderS.value;
                        console.log(valor)
                        console.log(selectfrom.value);
                        switch(valor){
                            case "1": getFilter(urlFilter_especeficArea, tbody, selectfrom.value);break;
                            case "2": getFilter(urlFilter_especeficCategory, tbody, selectfrom.value);break;
                            case "3": getFilter(urlFilter_especeficSupplier, tbody, selectfrom.value);break;
                        }   
                    }else{
                        cargarTabla();
                    }
                }else{
                    cargarTabla();
                }
                event.target.style.display = "none";
                difuminado.style.display = "none";
                formNormal.style.display = "block";
                formeditado.style.display = "block";
                sidebar.style.zIndex = "8";
            } else {
                alert("No se pudo editar el registro");
            }
            
        });
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
})

if (HeaderS ) {
    HeaderS.addEventListener("change", (e)=>{
        e.preventDefault();
        while (selectfrom.firstChild) {
            selectfrom.removeChild(selectfrom.firstChild);
        }

        switch(e.target.value){
            case "1": selectfrom.removeAttribute("disabled"); createSelectors(urlgetSelects_area,selectfrom, false, null, null, null, null, null, null, 1); getFilter(urlFilter_Area, tbody, 0);/*getFilter(,) FILTER DE SOLO AREAS*/ break;
            case "2": selectfrom.removeAttribute("disabled"); createSelectors(urlgetSelects_category,selectfrom); getFilter(urlFilter_Categoría, tbody, 0);/*getFilter(,) FILTER DE SOLO AREAS*/ break;
            case "3": selectfrom.removeAttribute("disabled"); createSelectors(urlgetSelects_supplier,selectfrom); getFilter(urlFilter_Supplier, tbody, 0);/*getFilter(,) FILTER DE SOLO AREAS*/ break;
            case "4": selectfrom.removeAttribute("disabled"); //createSelectors(urlgetSelects_area,selectfrom); getFilter(,) FILTER DE SOLO AREAS break;
        }
    })
}

if (selectfrom ) {
    selectfrom.addEventListener("click", (e) =>{
        e.preventDefault();
        if(selectfrom.length < 2){
            alert("No hay elementos");
        }
    })
}

if (selectfrom ) {
    selectfrom.addEventListener("change", (e) =>{
        e.preventDefault();
        let valor = HeaderS.value;
        var count = 1;
        //localStorage.setItem("Filtered_esp", "true");
        switch(valor){
            case "1": count = getFilter(urlFilter_especeficArea, tbody, e.target.value);break;
            case "2": count = getFilter(urlFilter_especeficCategory, tbody, e.target.value);break;
            case "3": count = getFilter(urlFilter_especeficSupplier, tbody, e.target.value);break;
        }
        
    })
}

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

if (btnTags) {
    btnTags.addEventListener("click", async (event) => {
        let formDataProduct = new FormData(formTable);
        let productTags = await sendData(urlgetTagByProduct, {registro : formDataProduct.get('registro')});
        tagSelects.forEach(async (select, index) => {
            await setOptions(urlgetSelects_tags, select);
            if(typeof productTags[index] !== "undefined") select.value = productTags[index].TagID;
        });
        product_id.value = formDataProduct.get('registro');
    });
    tagForm.addEventListener("submit", async (event) => {
        event.preventDefault();
        let json = await sendForm(urlsetProductTags, event.target);
        let data = await json;
        if(data){
            alert("Se establecieron correctamente las etiquetas");
            cargarTabla();
            event.target.reset();
            event.target.style.display = "none";
            difuminado.style.display = "none"
        } else {
            alert("No se pudo establecer las etiquetas");
        }
    });
}
