import { setOptions, sendData, getData } from "./fetchAPI.js";

const lineForm = document.getElementsByClassName("line-form");
const productSelects = document.getElementsByClassName("select-product");
const productInputs = document.getElementsByClassName("inputP");
const productOutputs = document.getElementsByClassName("outputP");
const mainForm = document.getElementById("main-form");
const btnAddProduct = document.getElementById("btnAgregarProducto");
const nproduct = document.getElementById("nproductos");

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