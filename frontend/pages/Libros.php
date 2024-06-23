<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Libros</title>
</head>
<body>
    <div id="nvar"></div>
        <br/>
        <br>
        <br>
        <h3>Libros</h3>
        <div class="row" id="empleados">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <div class="card">
                <div class="card-body">
                    <h4>Nombre:</h4>
                    <h4>Apellido:</h4>
                    <h4>Dni:</h4>
                    <h4>Rol: </h4>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
          </div>
    <div id="modal">

        
          
          <!-- Modal -->
          <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Libros</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="fromularoEmpleado">
                        <input type="text" class="form-control mt-2" placeholder="Nombre del libro"  aria-describedby="addon-wrapping" name="titulo">
                        <input type="text" class="form-control mt-2" placeholder="Autor 1 "  aria-describedby="addon-wrapping" name="autor">
                        <input type="text" class="form-control mt-2" placeholder="Autor 2 "  aria-describedby="addon-wrapping" name="autor1">
                        <input type="text" class="form-control mt-2" placeholder="Autor 3 "  aria-describedby="addon-wrapping" name="autor2">
                        <input type="number" class="form-control mt-2" placeholder="Lanzamiento"  aria-describedby="addon-wrapping" name="lanzamiento">
                        <input type="text" class="form-control mt-2" placeholder="Editorial"  aria-describedby="addon-wrapping" name="editorial">
                        <input type="text" class="form-control mt-2" placeholder="Idioma"  aria-describedby="addon-wrapping" name="idioma">
                        <input type="text" class="form-control mt-2" placeholder="Genero"  aria-describedby="addon-wrapping" name="genero">
                        <label for="estado" class="form-label mt-2">Estado</label>
                        <select name="estado" class="form-select" >
                            <option value="disponible" disabled selected>##disponible</option>
                            <option value="nuevo">Nuevo</option>
                            <option value="usado">Usado</option>
                        </select>

                        <div class="modal-footer"></div>
                        <input type="submit" class="btn btn-primary mt-2" data-bs-dismiss="modal">
                     </div>

                    </form>
                  
                </div>
                
              </div>
            </div>
          </div>
          <!-- ############################################ -->
          <!-- Modal Edicion -->
          <div class="modal fade " id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="modalEditLabel">Libros</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" id="btnCloseEdit" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2>Edicion</h2>
                    <form action="" id="formEdit">
                        <input  id="inTitulo" type="text" class="form-control mt-2" placeholder="Nombre del libro"  aria-describedby="addon-wrapping" name="titulo">
                        <input  id="inAutor1" type="text" class="form-control mt-2" placeholder="Autor 1 "  aria-describedby="addon-wrapping" name="autor">
                        <input  id="inAutor2" type="text" class="form-control mt-2" placeholder="Autor 2 "  aria-describedby="addon-wrapping" name="autor1">
                        <input  id="inAutor3" type="text" class="form-control mt-2" placeholder="Autor 3 "  aria-describedby="addon-wrapping" name="autor2">
                        <input  id="inLanzamiento" type="date" class="form-control mt-2" placeholder="Lanzamiento"  aria-describedby="addon-wrapping" name="lanzamiento">
                        <input  id="inEditorial" type="text" class="form-control mt-2" placeholder="Editorial"  aria-describedby="addon-wrapping" name="editorial">
                        <input  id="inIdioma" type="text" class="form-control mt-2" placeholder="Idioma"  aria-describedby="addon-wrapping" name="idioma">
                        <input  id="inGenero" type="text" class="form-control mt-2" placeholder="Genero"  aria-describedby="addon-wrapping" name="genero">
                        <label for="estado" class="form-label mt-2">Estado</label>
                        <select id="inEstado" name="estado" class="form-select" >
                            <option value="disponible" disabled selected>##disponible</option>
                            <option value="nuevo">Nuevo</option>
                            <option value="usado">Usado</option>
                        </select>

                        <div class="modal-footer"></div>
                        <input type="submit" class="btn btn-primary mt-2" data-bs-dismiss="modal">
                     </div>

                    </form>
                  
                </div>
                
              </div>
            </div>
          </div>
<!-- Fin modal edicion -->
    </div>
    <script src="../src/js/libros/libros.js"></script>
    <script src="../src/js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>