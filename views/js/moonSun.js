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
const btn = document.querySelector('.btn');
const icon = document.querySelector('.btn__icon');
const opcion = document.getElementById("opcion");

//to save the dark mode use the object "local storage".

//function that stores the value true if the dark mode is activated or false if it's not.
function store(value){
  localStorage.setItem('darkmode', value);
}

//funcion que se fija si existe ña clase darkmode en la pagina 
function load(){
  const darkmode = localStorage.getItem('darkmode');

  //if the dark mode was never activated
  if(!darkmode){
    store(false);
    icon.classList.add('fa-sun');
    opcion.innerHTML = "Modo Oscuro";
  } else if( darkmode == 'true'){ //if the dark mode is activated
    body.classList.add('darkmode');
    icon.classList.add('fa-moon');
    opcion.innerHTML = "Modo Claro";
  } else if(darkmode == 'false'){ //if the dark mode exists but is disabled
    icon.classList.add('fa-sun');
    opcion.innerHTML = "Modo Oscuro";
  }
}


load();

btn.addEventListener('click', () => {

  body.classList.toggle('darkmode');
  icon.classList.add('animated');

  //save true or false
  store(body.classList.contains('darkmode'));

  if(body.classList.contains('darkmode')){
    icon.classList.remove('fa-sun');
    icon.classList.add('fa-moon');
    opcion.innerHTML = "Modo Claro";
  }else{
    icon.classList.remove('fa-moon');
    icon.classList.add('fa-sun');
    opcion.innerHTML = "Modo Oscuro";
  }

  setTimeout( () => {
    icon.classList.remove('animated');
  }, 500)
})