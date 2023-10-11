let btn_sidebar = document.querySelector('#btn_menu'); //Guarda una variable del boton del sidebar
let sidebar = document.querySelector('.sidebar'); //Guarda una variable del div sidebar completo
let myform = document.querySelector("#myForm");//Formulario
let btn_registro = document.querySelector("#btn-registro");//Boton para abrir formulario
let btn_cerrarform = document.querySelector("#Cerrar_form");//Boton X para cerrarlo
let btn_cancelarform = document.querySelector("#Cancelar_registro");
let btn_submitform = document.querySelector("#submit");
let reloj = document.querySelector("#clock");
let togglePassword = document.querySelector('#togglePassword');
let contra = document.querySelector('#contra');

togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    let type = contra.getAttribute('type') === 'password' ? 'text' : 'password';
    contra.setAttribute('type', type);
    // toggle the eye slash icon
    togglePassword.classList.toggle("bx-lock-open-alt");
});

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
  myform.style.display = "none";
  myform.reset();
}

if (btn_registro) {
  btn_registro.onclick = function showForm() {
    document.getElementById("myForm").style.display = "block";
  }
  btn_cerrarform.onclick = closeForm;
  btn_cancelarform.onclick = closeForm;
  //btn_submitform.onclick = closeForm;
}
//Funcion para reloj
function updateTime() {
  var now = new Date();
  var hours = now.getHours();  //Obtiene horas
  var minutes = now.getMinutes(); //Obtiene minutos

  if (hours < 10) {
    hours = "0" + hours; //Se resetea horas
  }

  if (minutes < 10) {
    minutes = "0" + minutes;  //Se resetea minutos
  }

  if (hours >= "0" && hours <= 11) {
  var timeString = hours + ":" + minutes + " AM"; //Se crea string
  reloj.innerHTML = timeString; //Se hace print
  }
  else {
    var timeString = hours + ":" + minutes + " PM"; //Se crea string
    reloj.innerHTML = timeString; //Se hace print
  }
}
if(reloj){
  setInterval(updateTime, 1000); //Se actualiza el tiempo
}

