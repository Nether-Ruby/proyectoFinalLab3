<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Autores</title>
</head>
<body>
    <div id="nvar"></div>
    <div class="container" data-bs-theme="dark">
        <br>
        <br>
        <br>
        <h2>Autores</h2>
        <h4>Lista de autores</h4>
        <div class="list-group" id="listaAutores">
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true" onclick="abrirModar(2)">
              Autor 1
            </a>
            <a href="#" class="list-group-item list-group-item-action" onclick="abrirModar(1)">Autor 2</a>
            <a href="#" class="list-group-item list-group-item-action">Autor 3</a>
            <a href="#" class="list-group-item list-group-item-action">Autor 4</a>
          
        </div>
    <!-- Modal -->
    <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color: white;">Libros</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cerrarModal()"></button>
            </div>
            <div class="modal-body">
                <ol class="list-group list-group-numbered" id="listaLibros">
                    <li class="list-group-item">Libro 1 </li>
                    <li class="list-group-item">A list item</li>
                    <li class="list-group-item">A list item</li>
                </ol>
              
            </div>
            
          </div>
        </div>
      </div>
      <script src="../src/js/autores/autores.js"></script>
    <script src="../src/js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>