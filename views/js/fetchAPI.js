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

        // Crear 8 celdas
        for (let j = 0; j < 8; j++) {
        // Crear una nueva celda
        const cell = document.createElement("td");

        // Agregar contenido a la celda
        cell.textContent = `${dato[j]}`;

        // Agregar la celda a la fila
        row.appendChild(cell);
        }

        // Agregar la fila al tbody
        element.appendChild(row);
    }
    });
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