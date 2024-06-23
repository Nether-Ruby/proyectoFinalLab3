<?php
include_once '../db.php';

$database = new Database();
$db = $database->getConnection();

$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$genero = isset($_GET['genero']) ? $_GET['genero']: '';
$idioma = isset($_GET['idioma']) ? $_GET['idioma'] : '';

$query = "SELECT * FROM libros WHERE 1=1 and activo = :activo";

if (!empty($nombre)) {
    $query .= " AND nombre LIKE :nombre";
}
if (!empty($genero)) {
    $query .= " AND genero LIKE :genero";
}
if (!empty($idioma)) {
    $query .= " AND idioma LIKE :idioma";
}

$stmt = $db->prepare($query);
$stmt->bindValue(':activo', 1, PDO::PARAM_INT);
$stmt->bindValue(':nombre', '%' . $nombre . '%', PDO::PARAM_STR);
$stmt->bindValue(':genero', '%' . $genero . '%', PDO::PARAM_STR);
$stmt->bindValue(':idioma', '%' . $idioma . '%', PDO::PARAM_STR);
$stmt->execute();

$libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($autores);
?>
