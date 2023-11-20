//oscuro → Es el nombre en el css que cambiara los colores a oscuros
/*function Oscuro() {
    let element = document.body;
    element.className =  "oscuro";
}

//claro → Es el nombre en el css que cambiar[a los colores a claro
function Claro() {
    let element = document.body;
    element.className = "claro";
} */

const body = document.querySelector('.main-content');
const config_tab = document.querySelector('.configuracion_tab');
const btn = document.querySelector('.btn');
const icon = document.querySelector('.btn__icon');
const opcion = document.getElementById("opcion");

//para guardar el modo oscuro use el objeto "local storage".

//función que almacena el valor verdadero si el modo oscuro está activado o falso si no lo está.
function store(value){
  localStorage.setItem('darkmode', value);
}




//Función que indica si existe la propiedad "darkmode". Carga la página como la habíamos dejado 
document.addEventListener('DOMContentLoaded', function(){
  function load(){
  const darkmode = localStorage.getItem('darkmode');

  //si el modo oscuro nunca fue activado
  if(!darkmode){
    store(false);
    icon.classList.add('fa-sun');
    opcion.innerHTML = "Tema Oscuro";
  } else if( darkmode == 'true'){ //si el modo oscuro está activado
    body.classList.add('darkmode');
    config_tab.classList.add('darkmode');
    icon.classList.add('fa-moon');
    opcion.innerHTML = "Tema Claro";
  } else if(darkmode == 'false'){ //si el modo oscuro existe pero está deshabilitado
    icon.classList.add('fa-sun');
    opcion.innerHTML = "Tema Oscuro";
  }
}
load();
});


btn.addEventListener('click', () => {

  body.classList.toggle('darkmode');
  icon.classList.add('animated');
  config_tab.classList.toggle('darkmode');
  //Guardar verdadero o falso
  store(body.classList.contains('darkmode'));

  if(body.classList.contains('darkmode')){
    icon.classList.remove('fa-sun');
    icon.classList.add('fa-moon');
    opcion.innerHTML = "Tema Claro";
  }else{
    icon.classList.remove('fa-moon');
    icon.classList.add('fa-sun');
    opcion.innerHTML = "Tema Oscuro";
  }
 
  setTimeout( () => {
    icon.classList.remove('animated');
  }, 500)
})
