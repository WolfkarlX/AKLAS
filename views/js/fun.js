let btn_sidebar = document.querySelector('#btn_menu'); //Guarda una variable del boton del sidebar
let sidebar = document.querySelector('.sidebar'); //Guarda una variable del div sidebar completo

let btn_registro = document.querySelector("#btn-registro");//Boton para abrir formulario
let btn_cerrarform = document.querySelector("#Cerrar_form");//Boton X para cerrarlo
let btn_cancelarform = document.querySelector("#Cancelar_registro");
let btn_submitform = document.querySelector("#submit");

btn_sidebar.onclick = function () { //Funcion para abrir sidebar xD
    sidebar.classList.toggle('active'); // C abre
    localStorage.setItem("sidebar", sidebar.classList.contains('active'));
};

document.addEventListener("DOMContentLoaded", () => {
  if (localStorage.getItem("sidebar") === "true") {
    sidebar.classList.toggle('active');
  }
});

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

if (btn_registro) {
  btn_registro.onclick = function showForm() {
    document.getElementById("myForm").style.display = "block";
  }
  btn_cerrarform.onclick = closeForm;
  btn_cancelarform.onclick = closeForm;
  btn_submitform.onclick = closeForm;
}