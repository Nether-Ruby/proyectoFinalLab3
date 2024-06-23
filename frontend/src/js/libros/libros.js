const contenedorEmpleados=document.querySelector("#empleados")
const formularioEmpleado=document.querySelector("#fromularoEmpleado")
const modalEdit=document.querySelector("#modalEdit")
const formEdit=document.querySelector("#formEdit")
let urlApi="http://localhost/proyectofinal/backend/libros/server.php"
let idEdit=0
let libros=
    [
        {
            id:1,
            titulo:"Principitos de la programación",
            autor:"Hernandez",
            editorial:"12345678",
            genero:"misterio",
            idioma:"español",
            estado:"nuevo",
            lanzamiento:"01-01-2022"
        },
        {
            
            id:2,
            titulo:"Principitos de la programaciónv 2",
            autor:"Hernandez",
            editorial:"12345678",
            genero:"misterio",
            idioma:"español",
            estado:"nuevo"
        },
        {
            
            id:3,
            titulo:"Principitos de la programación 3",
            autor:"Hernandez",
            editorial:"12345678",
            genero:"misterio",
            idioma:"español",
            estado:"nuevo"
        },
        {
            
            id:4,
            titulo:"Principitos de la programación 4",
            autor:"Hernandez",
            editorial:"12345678",
            genero:"misterio",
            idioma:"español",
            estado:"nuevo"
        }

    ]


async function llamarEmpleadosApi(params) {
    
    if(!urlApi==""){
        const respuesta=await fetch(urlApi) //peticion get 
        const empleadosApi=await respuesta.json()
        console.log(empleadosApi)
        libros=empleadosApi
    }
    return libros
}

//rellenando la lista de empleados
async function rellenarEmpleados() {
        contenedorEmpleados.innerHTML=""
    const libros=await llamarEmpleadosApi()

    let html=libros.map((libro)=>{return `
    <div class="col-sm-6 mb-3 mb-sm-0">
              <div class="card">
                <div class="card-body">
                    <h4>Id:${libro.id}</h4>

                    <h4>Titulo :${libro.titulo}</h4>
                    <h4>Autor:${libro.autor}</h4>
                    <h4>Editorial:${libro.editorial}</h4>
                    <h4>Genero:${libro.genero}</h4>
                    <h4>Idioma:${libro.idioma}</h4>
                    <h4>Estado:${libro.estado}</h4>
                    <a href="#" class="btn btn-primary" onClick="eliminarLibro(${libro.id})">Eliminar</a>
                    <a href="#" class="btn btn-primary" onClick="abiriModalEdicion(${libro.id})">Editar</a>

                </div>
              </div>
            </div>
    `
    }).join("")
    html+=`
        <br/>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Añadir
          </button>
    
    `
    contenedorEmpleados.innerHTML=html
    console.log("render")
}
//llamando a la api

rellenarEmpleados()

formularioEmpleado.addEventListener("submit",async (e)=>{

    e.preventDefault()
    const formularioDatos=new FormData(e.target)
    const objetoFormulario=Object.fromEntries(formularioDatos)
    console.log(objetoFormulario)
    //peticion a la api dede fetch recordar que se usa post para  indicar que es un nuevo registro
    if(urlApi==""){
        console.log(objetoFormulario)
        libros.push(objetoFormulario)
        console.log(libros)
        await rellenarEmpleados()
    }
    else{
        fetch(urlApi,{
            method:"POST",
            body:JSON.stringify(objetoFormulario),
            headers:{
                "Content-Type":"application/json"
            }
        })
    }

})

//funciones para eliminar y editar

async function eliminarLibro(id) {
    const confirmacion=confirm("¿Deseas eliminar el libro? "+id )
    if(confirmacion){
        //peticion a la api dede fetch recordar que se usa delete para  indicar que es un nuevo registro
        fetch(urlApi+"/"+id,{
            method:"DELETE",
            headers:{
                "Content-Type":"application/json"
            }
        })
        rellenarEmpleados()
    }
}
const $=(id)=>document.getElementById(id) 
function abiriModalEdicion(id) {
    idEdit=id
    modalEdit.setAttribute("style","display:block")
    const m=modalEdit.getAttribute("class")
    modalEdit.setAttribute("class",m+" show")
    //busqueda por id 
    const idLibro=libros.find(libro=>libro.id==id)
    //llamamos los datos que ya tenemos mostrando
    document.getElementById("inTitulo").setAttribute("value",idLibro.titulo)
     document.getElementById("inAutor1").setAttribute("value",idLibro.autor)
    document.getElementById("inEditorial").setAttribute("value",idLibro.editorial)
    document.getElementById("inGenero").setAttribute("value",idLibro.genero)
    document.getElementById("inIdioma").setAttribute("value",idLibro.idioma)
    //document.getElementById("inEstado").setAttribute("value",idLibro.estado)
    document.getElementById('inEstado').value = idLibro.estado;
    
    //document.getElementById("inId").setAttribute("value",idLibro)
}

async function submitFormularioEdit(e) {
    e.preventDefault()
    const formularioEdit=new FormData(e.target)
    const objetoFormulario=Object.fromEntries(formularioEdit)
    console.log(objetoFormulario)
    //peticion a la api dede fetch recordar que se usa post para  indicar que es un nuevo registro
    if(urlApi==""){
        console.log(objetoFormulario,idEdit)
        libros.forEach(
            (libro)=>{
                if(libro.id==idEdit){
                    libro.titulo=objetoFormulario.titulo
                    libro.autor=objetoFormulario.autor
                    libro.editorial=objetoFormulario.editorial
                    libro.genero=objetoFormulario.genero
                    libro.idioma=objetoFormulario.idioma
                    libro.estado=objetoFormulario.estado
                }
            }
        )
        console.log(libros)
        await rellenarEmpleados()
    }
    else{
        fetch(urlApi,{
            method:"PUT",
            body:JSON.stringify(objetoFormulario),
            headers:{
                "Content-Type":"application/json"
            }
        })
    }
    
}

formEdit.addEventListener("submit",submitFormularioEdit)

$("btnCloseEdit").addEventListener("click",()=>{
    modalEdit.setAttribute("style","display:none")
    const m=modalEdit.getAttribute("class")
    modalEdit.setAttribute("class",m.replace(" show",""))
})