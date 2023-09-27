function validateForm() {
    // Validamos la cuenta
    var cuenta = document.querySelector("input[name='cuenta']").value;
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailRegex.test(cuenta)) {
        alert("La cuenta no es válida.");
        return false;
    }

    // Validamos la contraseña
    var password = document.querySelector("input[name='password']").value;
    if (password.length < 6) {
        alert("La contraseña debe tener al menos 6 caracteres.");
        return false;
    }

    return true;
}

// Evento de clic en el botón de inicio de sesión
document.querySelector(".button").addEventListener("click", function () {
    if (validateForm()) {
        // Enviamos el formulario
        document.querySelector("form").submit();
    }
});
// Evento de submit en el formulario para evitar envio automatico
document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault();
  });



