//Funcion para cargar en la tabla los proveedores
function getTable(url, element) {
    // Hacer una petición fetch al servidor
    fetch(url)
    .then(response => response.json())
    .then(datos => {
    // Iterar por la lista de productos
    for (const dato of datos) {
        // Crear una nueva fila
        const row = document.createElement("tr");

        // Crear celdas con su contenido y añadirlas a la fila
        for (const campo of Object.values(dato)) {
            const cell = document.createElement("td");
            cell.textContent = `${campo}`;
            row.appendChild(cell);
        }

        // Se crea radiobutton con id = "rbtn-" + dato.TagID y valor dato.TagID
        const radio = document.createElement("input");
        radio.setAttribute("type", "radio");
        radio.setAttribute("name", "registro");
        radio.setAttribute("id", "rbtn-" + dato.TagID);
        radio.value = dato.TagID;
        radio.style.display = "none";

        row.onclick = () => {
            focusRadio("rbtn-" + dato.TagID);
            enableButton("btn-delete", "rbtn-" + dato.TagID);
        };

        // Agregar la fila al tbody
        element.appendChild(radio);
        element.appendChild(row);
    }
    });
}

function enableButton(id, id_radio) {
    const btn = document.getElementById(id);
    const radio = document.getElementById(id_radio);
    radio.checked ? btn.removeAttribute("disabled") : btn.setAttribute("disabled", "") ;
}

function focusRadio(id) {
    const radio = document.getElementById(id);
    radio.checked ? radio.checked = false : radio.checked = true;
}

async function sendForm(url, form) {
    const formData = new FormData(form);
    const response = await fetch(url, {
        method: "POST",
        body: formData
    });
    return await response.json();
}

export { getTable, sendForm };