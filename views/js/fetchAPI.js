//Funcion para cargar en la tabla los proveedores
function getTable(url, element) {
    return new Promise((resolve, reject) => {
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

            // Se crea radiobutton con id = "rbtn-" + Object.values(dato)[0] y valor Object.values(dato)[0]
            let id = Object.values(dato)[0];
            const radio = document.createElement("input");
            radio.setAttribute("type", "radio");
            radio.setAttribute("name", "registro");
            radio.setAttribute("id", "rbtn-" + id);
            radio.value = id;
            radio.style.display = "none";

            row.onclick = () => {
                focusRadio("rbtn-" + id);
                enableButton("btn-delete", "rbtn-" + id);
                enableButton("btn-edit", "rbtn-" + id);
                if(document.getElementById("btn-tags"))
                    enableButton("btn-tags", "rbtn-" + id);
            };
            
            // Agregar la fila al tbody
            element.appendChild(radio);
            element.appendChild(row);
        }
        resolve();
        });
    });
}

function getData(url) {
    return new Promise((resolve, reject) => {
        // Hacer una petición fetch al servidor
        fetch(url)
        .then(response => response.json())
        .then(datos => {
            resolve(datos);
        })
        .catch(error => reject(error));
    });
}

function sendData(url, obj) {
    // Crear un objeto FormData vacío
    let formData = new FormData();
    // Recorrer las propiedades del objeto obj
    for (let key in obj) {
      // Agregar cada par clave-valor al objeto FormData
        formData.append(key, obj[key]);
    }
  
    // Enviar una solicitud POST a la url con el objeto FormData como el cuerpo
    return fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "multipart/form-data"
        },
        body: formData
    })
    .then((response) => response.json())
    .then((data) => data);
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

async function createSelectors(url, element, edit = false, elementF=null, elementR=null, input=null, form=null, urlforlimitR = null, urlforlimitF = null, gettype = false){
    //elimina options si es que los hay dentro del elemento select
    if(element.tagName === "SELECT"){
        while (element.firstChild) {
            element.removeChild(element.firstChild);
        }

        if(edit === false){
            var count = 0;
            let opt = document.createElement("option");
            opt.setAttribute("selected", "");
            opt.value = "";
            opt.setAttribute("disabled", "");
            opt.innerText = "Seleccione una Opcion";
            element.appendChild(opt);

            // Hacer una petición fetch al servidor
            fetch(url)
            .then(response => response.json())
            .then(data => {
            // Iterar por la lista de productos
                data.forEach(registro => {
                    const keys = Object.keys(registro);
                    const option = document.createElement('option');
            
                    // Elige la primera clave como valor y texto
                    
                    option.value = registro[keys[0]];
                    if(gettype === false){
                        option.text = registro[keys[1]];
                    }else{
                        option.text = registro[keys[1]].toString() + " -> " + registro[keys[2]].toString();
                    }
                    element.appendChild(option);
                    count ++;
                });
                if(count < 1){
                    showempty(element);
                }
            });
        }else{
            if(gettype === false ){
                var count = 0;
                // Hacer una petición fetch al servidor
                fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Iterar por la lista de productos
                    data.forEach(registro => {
                        const keys = Object.keys(registro);
                        const option = document.createElement('option');
                        
                        option.value = registro[keys[0]];
                        option.text = registro[keys[1]];
                        if(option.text.toString() == edit){
                            option.setAttribute("selected", "");
                            if(input != null && form!= null && urlforlimitR != null && urlforlimitF != null && elementF!=null && elementR != null){
                                input.value = option.value;
                                LimitInputs(form,elementF, urlforlimitF);
                                LimitInputs(form,elementR, urlforlimitR);

                            }
                        } 
                        element.appendChild(option);
                        count ++;
                    });
                    if(count < 1){
                        showempty(element);
                    }
                });
            }else
            {   
                var count = 0;
                fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Iterar por la lista de productos
                    data.forEach(registro => {
                        const keys = Object.keys(registro);
                        const option = document.createElement('option');
                
                        // Elige la primera clave como valor y texto
                        option.value = registro[keys[0]];
                        option.text = registro[keys[1]].toString() + " -> " + registro[keys[2]].toString();
                        //console.log(registro[keys[2]]);
                        if(registro[keys[1]].toString() == edit){
                            option.setAttribute("selected", "");
                            if(input != null && form!= null && urlforlimitR != null && urlforlimitF != null && elementF!=null && elementR != null){
                                input.value = option.value;
                                LimitInputs(form,elementF, urlforlimitF);
                                LimitInputs(form,elementR, urlforlimitR);
                            }
                        } 
                        element.appendChild(option);
                        count ++;
                    });
                    if(count < 1){
                        showempty(element);
                    }
                });
            }
        }
    }else{
        return false;
    }
}


async function LimitInputs(form, element, url) {
    const formData = new FormData(form);
    const response = await fetch(url, {
        method: "POST",
        body: formData
    });
    if (element && element.tagName.toLowerCase() === "input" && element.type.toLowerCase() === "number") {
        if (element.getAttribute("name") === "rackn" || element.getAttribute("name") === "fila") {
            const data = await response.json();
            for (const dato of data) {
                for (const campo of Object.values(dato)) {
                    element.setAttribute("max", `${campo}`);
                }
            }
        }
    }
}

async function showempty(element){
    element.setAttribute("disabled", "");
        switch(element.id){ 
            case"Sarea" || "input5": alert("No hay areas disponibles"); 
            window.location.href = "../../views/areas/"; break;
            case"Sproovedor" || "input3": alert("No hay proovedores disponibles");
            window.location.href = "../../views/suppliers/"; break;
            case"Scate" || "input4": alert("No hay categorías disponibles"); 
            window.location.href = "../../views/categories/"; break;
        }
}

async function sendForm(url, form) {
    try{
        const formData = new FormData(form);
        const response = await fetch(url, {
            method: "POST",
            body: formData
        });
        return await response.json();
    }catch(error){
        console.log(error);
        alert("No es posible realizar la accion en este momento");
    }
}

export { getTable, sendForm, createSelectors, LimitInputs, getData, sendData };