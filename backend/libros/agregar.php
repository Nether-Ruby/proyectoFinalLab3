<?php
include_once '../db.php';

$data = json_decode(file_get_contents("php://input"), true);

$titulo = $data['titulo'] ?? null;
$lanzamiento = $data['lanzamiento'] ?? null;
$editorial = $data['editorial'] ?? null;
$idioma = $data['idioma'] ?? null;
$genero = $data['genero'] ?? null;
$autor1 = $data['autor1'] ?? null;
$autor2 = $data['autor2'] ?? null;
$autor3 = $data['autor3'] ?? null;

if (!empty($titulo)) {
    $database = new Database();
    $db = $database->getConnection();

    // Verifica la existencia de la editorial
    $queryEditorial = "SELECT * FROM editoriales WHERE editorial = :editorial";
    $stmtEditorial = $db->prepare($queryEditorial);
    $stmtEditorial->bindValue(":editorial", $editorial, PDO::PARAM_STR);
    $stmtEditorial->execute();
    $editoriales = $stmtEditorial->fetchAll(PDO::FETCH_ASSOC);
    if (empty($editoriales)) {
        echo json_encode(array("message" => "La editorial ingresada no existe"));
        exit;
    }

    // Verifica la existencia de los autores
    $queryAutores = "SELECT * FROM autores WHERE activo = :activo";
    $params = array(':activo' => 1);
    if (!empty($autor1)) {
        $queryAutores .= " AND nombre = :autor1";
        $params[':autor1'] = $autor1;
    }
    if (!empty($autor2)) {
        $queryAutores .= " AND nombre = :autor2";
        $params[':autor2'] = $autor2;
    }
    if (!empty($autor3)) {
        $queryAutores .= " AND nombre = :autor3";
        $params[':autor3'] = $autor3;
    }
    $stmtAutores = $db->prepare($queryAutores);
    foreach ($params as $key => $value) {
        $stmtAutores->bindValue($key, $value, PDO::PARAM_STR);
    }
    $stmtAutores->execute();
    $autores = $stmtAutores->fetchAll(PDO::FETCH_ASSOC);
    if (empty($autores)) {
        echo json_encode(array('message' => 'El/los autor/es ingresados no existen'));
        exit;
    }

    // Inserción de libro
    $queryFilter = "SELECT id FROM libros WHERE titulo = :titulo";
    $stmt = $db->prepare($queryFilter);
    $stmt->bindValue(":titulo", $titulo, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result === false) {
        $query = "INSERT INTO libros (titulo, lanzamiento, editorial, idioma, genero, estado, activo) 
                  VALUES (:titulo, :lanzamiento, :editorial, :idioma, :genero, :estado, :activo)";
        $stmt = $db->prepare($query);

        $stmt->bindValue(":titulo", $titulo, PDO::PARAM_STR);
        $stmt->bindValue(":lanzamiento", $lanzamiento, PDO::PARAM_INT);
        $stmt->bindValue(":editorial", $editorial, PDO::PARAM_STR);
        $stmt->bindValue(":idioma", $idioma, PDO::PARAM_STR);
        $stmt->bindValue(":genero", $genero, PDO::PARAM_STR);
        $stmt->bindValue(":estado", true, PDO::PARAM_BOOL);
        $stmt->bindValue(':activo', true, PDO::PARAM_BOOL);

        if ($stmt->execute()) {
            // Obtener el ID del libro recién insertado
            $libroId = $db->lastInsertId();

            // Inserción en la tabla libros_autores
            $queryLibroAutor = "INSERT INTO libros_autores (libro_id, autor_id) VALUES (:libro_id, :autor_id)";
            $stmtLibroAutor = $db->prepare($queryLibroAutor);

            foreach ($autores as $autor) {
                $stmtLibroAutor->bindValue(':libro_id', $libroId, PDO::PARAM_INT);
                $stmtLibroAutor->bindValue(':autor_id', $autor['id'], PDO::PARAM_INT);
                $stmtLibroAutor->execute();
            }
            echo json_encode(array("message" => "Libro agregado exitosamente."));
        } else {
            echo json_encode(array("message" => "Error al agregar el libro."));
        }
    } else {
        if (!$result['activo']) {
            // El libro existe y no está activo, procede con la actualización
            $updateQuery = "UPDATE libros SET activo = :activo WHERE id = :id";
            $updateStmt = $db->prepare($updateQuery);
            $updateStmt->bindValue(':activo', true, PDO::PARAM_BOOL);
            $updateStmt->bindValue(':id', $result['id'], PDO::PARAM_INT);

            if ($updateStmt->execute()) {
                echo json_encode(array("message" => "Libro reactivado"));
            } else {
                echo json_encode(array("message" => "Error de reactivación"));
            }
        } else {
            // El libro existe y ya está activo
            echo json_encode(array("message" => "El libro ya existe y está activo"));
        }
    }
} else {
    echo json_encode(array("message" => "Datos incompletos."));
}
?>
