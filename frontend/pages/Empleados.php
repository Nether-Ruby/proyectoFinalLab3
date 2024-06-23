<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Empleados</title>
</head>
<body>
    <div id="nvar"></div>
        <br/>
        <br>
        <br>
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
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Empleados</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="fromularoEmpleado">
                        <input type="text" class="form-control mt-2" placeholder="Nombre y apellidos" aria-label="Username" aria-describedby="addon-wrapping" name="nombre">
                        <input type="number" class="form-control mt-2" placeholder="Dni" aria-label="Username" aria-describedby="addon-wrapping" name="dni">
                        <input type="text" class="form-control mt-2" placeholder="Rol" aria-label="Username" aria-describedby="addon-wrapping" name="rol">
                        <input type="submit" class="btn btn-primary mt-2" data-bs-dismiss="modal">

                    </form>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Understood</button>
                </div>
              </div>
            </div>
          </div>


    </div>
    <script src="../src/js/empleados/cargaEmpleados.js"></script>
    <script src="../src/js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>