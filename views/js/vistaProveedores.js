// Obtener el elemento tbody
const tbody = document.getElementById("vista-cuerpo");

//Funcion para cargar en la tabla los proveedores
function cargarProveedores() {
    // Hacer una petición fetch al servidor
    fetch("../../controllers/suppliers.php")
    .then(response => response.json())
    .then(datos => {
    // Iterar por la lista de productos
    for (const dato of datos) {
        // Crear una nueva fila
        const row = document.createElement("tr");

        // Crear 9 celdas
        for (let j = 0; j < 8; j++) {
        // Crear una nueva celda
        const cell = document.createElement("td");

        // Agregar contenido a la celda
        cell.textContent = `${dato[j]}`;

        // Agregar la celda a la fila
        row.appendChild(cell);
        }

        // Agregar la fila al tbody
        tbody.appendChild(row);
    }
    });
}

// Agregar evento para ejecutar la función al cargar la página
document.addEventListener("DOMContentLoaded", cargarProveedores);

// Agregar evento para ejecutar la función al hacer click en el botón
const botonActualizar = document.querySelector("button[id='btn-actualizar']");
botonActualizar.addEventListener("click", () => {
    tbody.innerHTML = "";
    cargarProveedores();
});