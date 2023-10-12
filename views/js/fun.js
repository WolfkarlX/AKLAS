let btn_sidebar = document.querySelector('#btn_menu'); //Guarda una variable del boton del sidebar
let sidebar = document.querySelector('.sidebar'); //Guarda una variable del div sidebar completo
let myform = document.querySelector("#myForm");//Formulario
let btn_registro = document.querySelector("#btn-registro");//Boton para abrir formulario
let btn_cerrarform = document.querySelector("#Cerrar_form");//Boton X para cerrarlo
let btn_cancelarform = document.querySelector("#Cancelar_registro");
let btn_submitform = document.querySelector("#submit");
let reloj = document.querySelector("#clock");


if(reloj){
  setInterval(updateTime, 1000); //Se actualiza el tiempo
}



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
  /*
  var now = new Date();
  var hours = now.getHours();  //Obtiene horas
  var minutes = now.getMinutes(); //Obtiene minutos

  if (hours < 10) {
    hours = "0" + hours; //pone un 0 antes de la hora por ejemplo 05 horas
  }

  if (minutes < 10) {
    minutes = "0" + minutes;  //pone un 0 antes del minuto cuando es unico 03 minutos
  }
  if (hours >= 0 && hours <= 11) {
    var timeString = hours + ":" + minutes + " hrs"; //Se crea string
    reloj.innerHTML = timeString; //Se hace print
  }
  if (hours >= 12 && hours <= 23) {
    var timeString = hours + ":" + minutes + " hrs"; //Se crea string
    reloj.innerHTML = timeString; //Se hace print
  }
  */
  const date = new Date();
  const options = { hour: 'numeric', minute: 'numeric', hour12: true };
  const time = date.toLocaleTimeString('en-US', options);
  reloj.innerHTML = time;
  
  
}

