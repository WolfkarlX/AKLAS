let btn_sidebar = document.querySelector('#btn_menu'); //Guarda una variable del boton del sidebar
let sidebar = document.querySelector('.sidebar'); //Guarda una variable del div sidebar completo
let myform = document.querySelector("#myForm");//Formulario
let btn_registro = document.querySelector("#btn-registro");//Boton para abrir formulario
let btn_cerrarform = document.getElementsByClassName("CancelX");//Boton X para cerrarlo
let btn_cancelarform = document.getElementsByClassName("Cancelar");
let btn_submitform = document.querySelector("#submit");
let reloj = document.querySelector("#clock");
let input = document.querySelector("#myInput");
let gridcontainer = document.getElementById("gridcontainer");
let edit_form = document.getElementById("edit-form");
let btn_edit = document.getElementById("btn-edit");


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

function closeForm(form) {
  form = document.getElementById(form);
  form.style.display = "none";
  form.reset();
}

//funcion que abre y muestra el formulario que se desee
function showForm(form){
  document.getElementById(form).style.display = "block";
  
  for (var i = 0; i < btn_cerrarform.length; i++) {
    btn_cerrarform[i].onclick = (event)=>{ 
    event.preventDefault();      
    closeForm(form);  
    };
  }

  for (var i = 0; i < btn_cancelarform.length; i++) {
    btn_cancelarform[i].onclick = (event)=>{ 
    event.preventDefault();      
    closeForm(form);  
    };
  }
}

if(btn_registro){
  btn_registro.addEventListener("click", (event)=>{
    event.preventDefault();
    showForm(myform.id);
  });
}

if(btn_edit){
  btn_edit.addEventListener("click", (event)=>{
    event.preventDefault();
    showForm(edit_form.id);
  });
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

