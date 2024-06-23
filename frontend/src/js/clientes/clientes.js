const contenedorEmpleados=document.querySelector("#empleados")
const formularioEmpleado=document.querySelector("#fromularoEmpleado")

urlApi=""

async function llamarEmpleadosApi(params) {
    let empleados=[]
    
    if(urlApi==""){
        empleados=[
            {
                id:1,
                nombre:"Javier",
                apellidos:"Hernandez",
                dni:"12345678",
            },
            {
                id:2,
                nombre:"Antonio",
                apellidos:"Hernandez",
                dni:"452345254",
            },
            {
                id:3,
                nombre:"Pedro",
                apellidos:"Hernandez",
                dni:"12345678",
            },
            {
                id:4,
                nombre:"Correa",
                apellidos:"Hernandez",
                dni:"12345678",
            }

        ]
    }
    else{
        const respuesta=await fetch(urlApi) //peticion get 
        const empleadosApi=await respuesta.json()
        console.log(empleadosApi)
        empleados=empleadosApi
    }
    return empleados
}

//rellenando la lista de empleados
async function rellenarEmpleados() {
    const empleados=await llamarEmpleadosApi()
    let html=empleados.map((empleado)=>{return `
    <div class="col-sm-6 mb-3 mb-sm-0">
              <div class="card">
                <div class="card-body">
                    <h4>Id:${empleado.id}</h4>

                    <h4>Nombre y Apellidos:${empleado.nombre}</h4>
                    <h4>Dni:${empleado.dni}</h4>
                    <a href="#" class="btn btn-primary">Eliminar</a>
                    <a href="#" class="btn btn-primary">Editar</a>

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
}
//llamando a la api

rellenarEmpleados()



formularioEmpleado.addEventListener("submit",(e)=>{

    e.preventDefault()
    const formularioDatos=new FormData(e.target)
    const objetoFormulario=Object.fromEntries(formularioDatos)
    //console.log(objetoFormulario)
    //peticion a la api dede fetch recordar que se usa post para  indicar que es un nuevo registro
    if(urlApi==""){
        console.log(objetoFormulario)
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