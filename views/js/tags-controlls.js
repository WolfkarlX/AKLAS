import { getData } from "./fetchAPI.js";

const tbody = document.getElementById("vista-cuerpo");

async function getTags(){
    const relProductTag = await getData(urlGetTags);
    for (const row of tbody.rows) {
        const ID = row.cells[0].textContent;
        const td = row.insertCell(-1);
        for (const rel of relProductTag)
            if(rel.ProductID == ID)
                td.textContent += rel.TagName + ', ';
        td.textContent = td.textContent.substring(0, td.textContent.length - 2);
    }
}

export { getTags };