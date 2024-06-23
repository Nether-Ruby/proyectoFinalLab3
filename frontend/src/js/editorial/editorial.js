const staticBackdrop=document.getElementById("staticBackdrop")
const listaAutores=document.getElementById("listaAutores")
const listaLibros=document.getElementById("listaLibros")

let urlApi="http://localhost/proyectofinal/backend/editoriales/server.php"
function abrirModar(id) {
rellenarLibros(id)
    staticBackdrop.setAttribute("style","display:block")
staticBackdrop.setAttribute("class","modal fade show")
staticBackdrop.setAttribute("role","dialog")
staticBackdrop.setAttribute("aria-modal","true")
staticBackdrop.setAttribute("aria-hidden","false")

async function llamarEditorialesApi(urlApi) {
    try {
        const respuesta = await fetch(urlApi); // Realizar petición GET
        const editorialesApi = await respuesta.json(); // Convertir respuesta a JSON
        return editorialesApi; // Retornar los datos de las editoriales
    } catch (error) {
        console.error("Error al obtener editoriales:", error);
        return []; // En caso de error, retornar un array vacío
    }
}

async function rellenarEditoriales() {
    const editoriales = await llamarEditorialesApi(urlApi); // Obtener las editoriales

    // Generar el HTML para mostrar las editoriales
    const html = editoriales.map(editorial => {
        return `
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h4>Nombre: ${editorial.nombre}</h4>
                    </div>
                </div>
            </div>`;
    }).join("");

    // Insertar el HTML generado en el contenedor de editoriales
    listaAutores.innerHTML = html;
}


}
function cerrarModal() {
    staticBackdrop.setAttribute("style","display:none")
    staticBackdrop.setAttribute("class","modal fade")
}

async function llamarLibros(id_autor) {
    try {
        if(urlApi==""){
            //fetch("http://localhost:3000/libros")
        }else{
            
            const response=await fetch(urlApi+"/"+id_autor)
            const librosres=await response.json()
            console.log(libros)
            libros=librosres
        }

    } catch (error) {
        console.log(error)

    }
}

async function rellenarLibros(id) {
    listaLibros.innerHTML=""
    const lib=await llamarLibros(id)
    let html=libros.map((libro)=>{return `

        <a href="#" class="list-group-item list-group-item-action active" aria-current="true" onclick="abrirModar(2)">
              ${libro.titulo}
            </a>
                    
    `}).join("")
    
    listaLibros.innerHTML=html
}


async function llamarAutores() {
    if(urlApi==""){
        //fetch("http://localhost:3000/autores")
    }else{
        const response=await fetch(urlApi)
        const autoresres=await response.json()
        console.log(autores)
        autores=autoresres
    }
}

async function rellenarAutores() {
    listaAutores.innerHTML=""
    const aut=await llamarAutores()

    let html=autores.map((autor)=>{return `

        <a href="#" class="list-group-item list-group-item-action active" aria-current="true" onclick="abrirModar(2)">
              ${autor.nombre}
            </a>
                    
    `}).join("")
    
    listaAutores.innerHTML=html
}
//rellenarAutores()
window.addEventListener("load", () => {
    rellenarAutores();
    rellenarEditoriales();
});