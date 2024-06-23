const staticBackdrop=document.getElementById("staticBackdrop")
const listaAutores=document.getElementById("listaAutores")
const listaLibros=document.getElementById("listaLibros")
const autores=[

    {
        id:1,
        nombre:"Hernandez",
        dni:"12345678"

    },
    {
        id:2,
        nombre:"jose perez",
        dni:"12345678"
    }
]
let libros=[
    {
        id:1,
        titulo:"libro1",
        autor:"autor1",
        editorial:"editorial1",
        genero:"genero1",
        idioma:"idioma1",
        estado:"estado1"
    },
    {
        id:2,
        titulo:"libro2",
        autor:"autor2",
        editorial:"editorial2",
        genero:"genero2",
        idioma:"idioma2",
        estado:"estado2"
    }
]
let urlApi=""
function abrirModar(id) {
rellenarLibros(id)
    staticBackdrop.setAttribute("style","display:block")
staticBackdrop.setAttribute("class","modal fade show")
staticBackdrop.setAttribute("role","dialog")
staticBackdrop.setAttribute("aria-modal","true")
staticBackdrop.setAttribute("aria-hidden","false")

    

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
window.addEventListener("load",rellenarAutores)