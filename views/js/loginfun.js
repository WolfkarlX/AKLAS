let togglePassword = document.querySelector('#togglePassword');
let contra = document.querySelector('#contra');
let icono = document.querySelector("#icono");


icono.onclick = togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    let type = contra.getAttribute('type') === 'password' ? 'text' : 'password';
    contra.setAttribute('type', type);
    // toggle the eye slash icon
    togglePassword.classList.toggle("bx-lock-open-alt");
  });