function validateForm() {
    // Validamos el correo electrónico
    var email = document.querySelector("input[name='email']").value;
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailRegex.test(email)) {
        alert("El correo electrónico no es válido.");
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

function ConfirmAll() {
    swal({
        title: "¿Estás seguro de hacer genocidio?",
        text: "¡Una vez realizado el genocidio, no se podrán recuperar las publicaciones!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
          swal("¡LISTO!, ¡ACABAS DE REALIZAR UN GENOCIDIO!", {
            icon: "success",
          });
        } else {
          swal("¡VALE!", "no se ha eliminado ninguna publicación");
        }
    }); 
}



