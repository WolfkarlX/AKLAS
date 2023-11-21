import { setOptions, sendData, getData } from "./fetchAPI.js";

const lineForm = document.getElementsByClassName("line-form");
const productSelects = document.getElementsByClassName("select-product");
const productInputs = document.getElementsByClassName("inputP");
const productOutputs = document.getElementsByClassName("outputP");
const mainForm = document.getElementById("main-form");
const btnAddProduct = document.getElementById("btnAgregarProducto");
const nproduct = document.getElementById("nproductos");
const notificaIcon = document.getElementById("iconoerror");
const listaNotif = document.querySelector("li");
let btn_noti = document.getElementById("notificacion");
let list_noti = document.querySelector(".Notif");

document.addEventListener("DOMContentLoaded", setSelectsProducts);

btnAddProduct.addEventListener("click", function(event){
    for (let i = 0; i < nproduct.value; i++) {
        const line = lineForm[0].cloneNode(true);
        mainForm.appendChild(line);
    }
    setSelectsProducts();
    nproduct.value = 1;
});

mainForm.addEventListener("submit", async function(event) {
    event.preventDefault();
    let mainFormData = new FormData(mainForm);
    let reason = mainFormData.get("reason");
    let products = mainFormData.getAll("producto");
    let inputP = mainFormData.getAll("inputP")
    let outputP = mainFormData.getAll("outputP");
    let datos = await sendData(urlSendData, {reason: reason, products: products, inputs: inputP, outputs: outputP});
    console.log(datos);
    location.assign("./");
});

async function setSelectsProducts(event){
    for (const select of productSelects) {
        if(!select.length){
            await setOptions(urlgetSelect_Products, select);
        }
        select.addEventListener("change", setMaxProductOutput);
    }
}

async function setMaxProductOutput(event) {
    for (let index = 0; index < productSelects.length; index++) {
        const select = productSelects[index];
        if(event.target === select){
            const output = productOutputs[index];
            let datos = await getData(urlgetSelect_Products);
            for (const dato of datos)
                if(dato.ProductID == select.value)
                    output.max = dato.Quantity;
        }
    }
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
            if(product.Falta) li.textContent += " hace falta producto";
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



// Agregar evento para ejecutar la función getTable al cargar la página
document.addEventListener("DOMContentLoaded", ()=>{
    cargarNotificaciones();
});

btn_noti.addEventListener("click", cargarNotificaciones);
