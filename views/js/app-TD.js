import { setOptions, sendData } from "./fetchAPI.js";

const lineForm = document.getElementsByClassName("line-form");
const productSelects = document.getElementsByClassName("select-product");
const productInputs = document.getElementsByClassName("inputP");
const productOutputs = document.getElementsByClassName("outputP");
const mainForm = document.getElementById("main-form");
const btnAddProduct = document.getElementById("btnAgregarProducto");
const nproduct = document.getElementById("nproductos");

document.addEventListener("DOMContentLoaded", async function(event){
    for (const select of productSelects) {
        await setOptions(urlgetSelect_Products, select);
    }
});

btnAddProduct.addEventListener("click", function(event){
    for (let i = 0; i < nproduct.value; i++) {
        const line = lineForm[0].cloneNode(true);
        mainForm.appendChild(line);
    }
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