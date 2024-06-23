const nvar=document.querySelector("#nvar")
function leerLocalStorage(nombreItem) {
  console.log(localStorage.getItem("usuario"))
  return JSON.parse(localStorage[nombreItem]) || []
}
function crearItemLocalStorage(nombre,valor) {

  localStorage.setItem(nombre,JSON.stringify(valor))
  return JSON.parse(localStorage.getItem(nombre))

}

//crearItemLocalStorage("usuario",{nombre:"Javier",id:1,rol:"admin"})

const usuario=leerLocalStorage("usuario")
console.log(usuario)
window.onload=()=>{

    nvar.innerHTML=`
    <nav class="navbar bg-body-tertiary fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Libreria</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">${usuario.nombre}|| ${usuario.rol}|| ${usuario.id}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/proyectofinal/frontend/index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/proyectofinal/frontend/pages/Empleados.php">Empleado</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/proyectofinal/frontend/pages/Clientes.php">Cliente</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/proyectofinal/frontend/pages/Libros.php">Libro</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/proyectofinal/frontend/pages/Prestamos.php">Prestamos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/proyectofinal/frontend/pages/Autores.php">Autor</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/proyectofinal/frontend/pages/Editorial.php">Editorial</a>
                  </li>
                
               
              </ul>
             
            </div>
          </div>
        </div>
      </nav>

    `

}