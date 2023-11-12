import { createSelectors, LimitInputs, sendForm } from "./fetchAPI.js";
let btn_sidebar = document.querySelector('#btn_menu'); //Guarda una variable del boton del sidebar
let sidebar = document.querySelector('.sidebar'); //Guarda una variable del div sidebar completo
let myform = document.querySelector("#myForm");//Formulario
let formNormal = document.querySelector("#form-normal"); //div del formulario
let formeditado = document.querySelector("#form-editado"); //div del formulario editado
let btn_registro = document.querySelector("#btn-registro");//Boton para abrir formulario
let btn_cerrarform = document.getElementsByClassName("CancelX");//Boton X para cerrarlo
let btn_cancelarform = document.getElementsByClassName("Cancelar");
let btn_submitform = document.querySelector("#submit");
let reloj = document.querySelector("#clock");
let input = document.querySelector("#myInput");
let gridcontainer = document.getElementById("gridcontainer");
let edit_form = document.querySelector("#edit-form");
let btn_edit = document.getElementById("btn-edit");
let difuminado = document.getElementById("difuminado");
let btn_fondo = document.querySelector("#ConfiguracionBoton");
let selectorforarea = document.getElementById("Sarea");
let selectorforcategory = document.getElementById("Scate");
let selectorforsupplier = document.getElementById("Sproovedor");
let Sarea = document.getElementById("input5");
let Scategory = document.getElementById("input4");
let Ssupplier = document.getElementById("input3");
let logout_link = document.getElementById("logout-link");
let formforarea = document.getElementById("getnrackA");
let inputForarea = document.getElementById("ar");
let nracks = document.getElementById("RN");
let nfilas = document.getElementById("file");
let nracksE = document.getElementById("input7");
let nfilesE = document.getElementById("input8");
let btn_user = document.getElementById("UsuarioBoton");
let btn_noti = document.getElementById("notificacion");
let btn_tags = document.getElementById("btn-tags");
let tagsForm = document.getElementById("tagsForm");

if(reloj){
  setInterval(updateTime, 1000); //Se actualiza el tiempo
}

if(btn_sidebar) {
btn_sidebar.onclick = function () { //Funcion para abrir sidebar xD
    sidebar.classList.toggle('active'); // C abre
    localStorage.setItem("sidebar", sidebar.classList.contains('active'));
};
}

document.addEventListener("DOMContentLoaded", () => {
  if (localStorage.getItem("sidebar") === "true") {
    sidebar.classList.toggle('active');
  }
});

function closeForm(form, difuminado) {
  form = document.getElementById(form);
  difuminado = document.getElementById(difuminado);
  form.style.display = "none";
  difuminado.style.display = "none";
  form.reset();
  if(nracks && nfilas){
    nracks.setAttribute("disabled", "true");
    nfilas.setAttribute("disabled", "true");
  }
}

//funcion que abre y muestra el formulario que se desee
function showForm(form, difuminado){
  document.getElementById("sidebarid").style.zIndex = "-1";
  document.getElementById(form).style.display = "block";
  document.getElementById(difuminado).style.backdropFilter = "blur(5px)";
  document.getElementById(difuminado).style.display = "flex";
  document.getElementById(difuminado).style.zIndex = "2";
  document.getElementById(difuminado).style.position = "absolute";
  document.getElementById(difuminado).style.width = "100%";
  document.getElementById(difuminado).style.top = "0";
  document.getElementById(difuminado).style.height = "100%";
  for (var i = 0; i < btn_cerrarform.length; i++) {
    btn_cerrarform[i].onclick = (event)=>{ 
    event.preventDefault();      
    document.getElementById(difuminado).style.backdropFilter = "none";
    document.getElementById("form-editado").style.display = "block";
    document.getElementById("form-normal").style.display = "block";
    document.getElementById("sidebarid").style.zIndex = "8";
    closeForm(form, difuminado);  
    };
  }

  for (var i = 0; i < btn_cancelarform.length; i++) {
    btn_cancelarform[i].onclick = (event)=>{ 
    event.preventDefault();      
    document.getElementById(difuminado).style.backdropFilter = "none";
    document.getElementById("form-editado").style.display = "block";
    document.getElementById("form-normal").style.display = "block";
    document.getElementById("sidebarid").style.zIndex = "8";
    closeForm(form, difuminado);  
    };
  }
}



if(btn_registro){
  btn_registro.addEventListener("click", (event)=>{
    document.getElementById("form-editado").style.display = "none";
    event.preventDefault();
    if(selectorforarea && selectorforcategory && selectorforsupplier){
      createSelectors(urlgetSelects_supplier,  selectorforsupplier);
      createSelectors(urlgetSelects_area, selectorforarea,false, null, null, null, null, null, null, true);
      createSelectors(urlgetSelects_category, selectorforcategory);
    }
    showForm(myform.id, difuminado.id);
  });
}

if(btn_edit){
  btn_edit.addEventListener("click", (event)=>{
    document.getElementById("form-normal").style.display = "none";
    event.preventDefault();
    showForm(edit_form.id, difuminado.id);
  });
}

if(btn_tags){
  btn_tags.addEventListener("click", (event)=>{
    showForm(tagsForm.id, difuminado.id);
  });
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
    }
    else {
      cuadro.style.display = "none"
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
    }
    else {
      cuadrouser.style.display = "none";
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
      cuadro.style.display = "none";
      cuadrouser.style.display = "none";
    }
    else {
      cuadronoti.style.display = "none";
    }
  } )
}


if(selectorforarea){
    selectorforarea.addEventListener("click", function (event){
      if (selectorforarea.value !== "") {
        nracks.removeAttribute("disabled");
        nfilas.removeAttribute("disabled");

        let value = selectorforarea.value;
        inputForarea.value = value;
        LimitInputs(formforarea,nracks, urlGetnracks);
        LimitInputs(formforarea, nfilas, urlGetnfiles);
      }
    });

}

if(Sarea){
  if(Sarea.tagName === "SELECT"){
   if(Sarea.name === "area"){
      Sarea.addEventListener("click", function (event){
        if (event.target.value !== "") {

          let value = event.target.value;
          inputForarea.value = value;
          LimitInputs(formforarea, nracksE, urlGetnracks);
          LimitInputs(formforarea, nfilesE, urlGetnfiles);
        }
      });
    }
  }
}

//Funcion para reloj
function updateTime() {

  const date = new Date();
  const options = { hour: 'numeric', minute: 'numeric', hour12: true };
  const time = date.toLocaleTimeString('en-US', options);
  reloj.innerHTML = time;
  
}

//Funcion para buscar
if(input) {
input.onkeyup = function search() {
  var filter, i, txtValue, homebutton;
  filter = input.value.toUpperCase();
  homebutton = gridcontainer.getElementsByClassName("homebutton");
  for (i = 0; i < homebutton.length; i++) {
    txtValue = homebutton[i].textContent || homebutton[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      homebutton[i].style.display = "";
    } else {
      homebutton[i].style.display = "none";
    }
  }
}
}

//Función para preguntar el cierre de sesión
logout_link.addEventListener("click", function(event){
  let res = confirm("¿Seguro que quiere cerrar sesión?");
  if(!res)
    event.preventDefault();
});