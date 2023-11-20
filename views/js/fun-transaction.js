import { createSelectors, LimitInputs, sendForm, getData } from "./fetchAPI.js";
let btn_sidebar = document.querySelector('#btn_menu'); //Guarda una variable del boton del sidebar
let sidebar = document.querySelector('.sidebar'); //Guarda una variable del div sidebar completo
let myform = document.querySelector("#myForm");//Formulario
let formNormal = document.querySelector("#form-normal"); //div del formulario
let btn_registro = document.querySelector("#btn-registro");//Boton para abrir formulario
let btn_cerrarform = document.getElementsByClassName("CancelX");//Boton X para cerrarlo
let btn_cancelarform = document.getElementsByClassName("Cancelar");
let reloj = document.querySelector("#clock");
let difuminado = document.getElementById("difuminado");
let btn_fondo = document.querySelector("#ConfiguracionBoton");
let logout_link = document.getElementById("logout-link");
let logout_link2 = document.getElementById("logout-link2");
let btn_user = document.getElementById("UsuarioBoton");
let btn_noti = document.getElementById("notificacion");
let btn_config = document.getElementById("ConfiguracionBoton");
const list_noti = document.querySelector(".Notif");
let cerrartab = document.getElementById("cerrarcosa");
const notificaIcon = document.getElementById("iconoerror");
let cuadro = document.getElementById("config_tab");
let difuminado2 = document.getElementById("difuminado2");

if(reloj){
  setInterval(updateTime, 1000); //Se actualiza el tiempo
}

document.addEventListener("DOMContentLoaded", () => {
  if (localStorage.getItem("sidebar") === "true") {
    sidebar.classList.add('active');
  }

  btn_sidebar.onclick = function () {
    sidebar.classList.toggle('active');
    localStorage.setItem("sidebar", sidebar.classList.contains('active'));
  };
});

function closeForm(form, difuminado) {
  form.style.display = "none";
  difuminado.style.display = "none";
}

//funcion que abre y muestra el formulario que se desee
function showForm(form, difuminado){
  form.style.display = "block";
  form.style.zIndex = "11";
  difuminado.style.display = "flex";
  difuminado.style.zIndex = "10";
  difuminado.style.backdropFilter = "blur(5px)";
  difuminado.style.position = "absolute";
  difuminado.style.width = "100%";
  difuminado.style.top = "0";
  difuminado.style.height = "100%";
  for (var i = 0; i < btn_cerrarform.length; i++) {
    btn_cerrarform[i].onclick = (event)=>{ 
    closeForm(form, difuminado);
    event.target.form.reset();
    };
  }

  for (var i = 0; i < btn_cancelarform.length; i++) {
    btn_cancelarform[i].onclick = (event)=>{ 
    closeForm(form, difuminado);
    event.target.form.reset(); 
    };
  }
}

if(btn_registro){
  btn_registro.addEventListener("click", (event)=>{showForm(formNormal, difuminado)});
}

if(btn_fondo){
  btn_fondo.addEventListener("click", (event)=>{
    var cuadro = document.getElementById("config_tab");
    var cuadrouser = document.getElementById("user_tab");
    var cuadronoti = document.getElementById("notif_tab");
    if(cuadro.style.display === "none") {
      cuadro.style.display = "block";
      cuadrouser.style.display = "none";
      cuadronoti.style.display = "none";
      difuminado2.style.display = "flex";
      difuminado2.style.zIndex = "2";
      sidebar.style.zIndex = "-1";
    }
 
    
  })
}
if(btn_user){
  btn_user.addEventListener("click", (evemt)=>{
    var cuadrouser = document.getElementById("user_tab");
    var cuadro = document.getElementById("config_tab");
    var cuadronoti = document.getElementById("notif_tab");
    if(cuadrouser.style.display === "none") {
      cuadrouser.style.display = "block";
      cuadro.style.display = "none";
      cuadronoti.style.display = "none";
      sidebar.style.zIndex = "-1";
      btn_config.style.borderBottomColor = "transparent";
      btn_noti.style.borderBottomColor = "transparent";
      btn_user.style.borderBottomColor = "#f7f7f8";
    }
    else {
      cuadrouser.style.display = "none";
      cuadro.style.display = "none";
      cuadronoti.style.display = "none";
      btn_user.style.borderBottomColor = "transparent";
      btn_config.style.borderBottomColor = "transparent";
      btn_noti.style.borderBottomColor = "transparent";
    }
  } )
}
if(btn_noti){
  btn_noti.addEventListener("click", (evemt)=>{
    var cuadrouser = document.getElementById("user_tab");
    var cuadronoti = document.getElementById("notif_tab");
    var cuadro = document.getElementById("config_tab");
    if(cuadronoti.style.display === "none") {
      cuadronoti.style.display = "block";
      
      btn_config.style.borderBottomColor = "transparent";
      btn_user.style.borderBottomColor = "transparent";
      btn_noti.style.borderBottomColor = "#f7f7f8";
      cuadro.style.display = "none";
      cuadrouser.style.display = "none";
    }
    else {
      cuadronoti.style.display = "none";
      cuadro.style.display = "none";
      cuadrouser.style.display = "none";
      btn_noti.style.borderBottomColor = "transparent";
      btn_config.style.borderBottomColor = "transparent";
      btn_user.style.borderBottomColor = "transparent";
    }
  } )
}
if(cerrartab) {
  cerrartab.addEventListener("click", (event)=>{
    cuadro.style.display = "none";
    difuminado2.style.display = "none";
    difuminado2.style.zIndex = "-1";
    sidebar.style.zIndex = "8";
  })
}

//Funcion para reloj
function updateTime() {
  const date = new Date();
  const options = { hour: 'numeric', minute: 'numeric', hour12: true };
  const time = date.toLocaleTimeString('en-US', options);
  reloj.innerHTML = time;
}

//Función para preguntar el cierre de sesión
function cerrarSesion(event) {
  let res = confirm("¿Seguro que quiere cerrar sesión?");
  if(!res)
    event.preventDefault();
}
logout_link.addEventListener("click", cerrarSesion);
logout_link2.addEventListener("click", cerrarSesion);

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

document.addEventListener("DOMContentLoaded", cargarNotificaciones);

btn_noti.addEventListener("click", cargarNotificaciones);