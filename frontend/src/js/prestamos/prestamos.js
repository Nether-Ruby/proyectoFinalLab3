const formulario=document.querySelector("#formularioPrestamos")
const urlApi=""
function leerLocalStorage(nombreItem) {
    console.log(localStorage.getItem("usuario"))
    return JSON.parse(localStorage[nombreItem]) || []
  }

const usuarioData=leerLocalStorage("usuario")
formulario.addEventListener("submit",async (e)=>{

    e.preventDefault()
    const formularioData=new FormData(e.target)
    const objetoFormulario=Object.fromEntries(formularioData)
    objetoFormulario.empleado_id=usuarioData.id

    //console.log(objetoFormulario)
    //peticion a la api dede fetch recordar que se usa post para  indicar que es un nuevo registro
    if(urlApi==""){
        console.log(objetoFormulario)
    }
    else{
        await fetch(urlApi,{
            method:"POST",
            body:JSON.stringify(objetoFormulario),
            headers:{
                "Content-Type":"application/json"
            }
        })
    }
})