<?php
include_once '../db.php';

$database = new Database();
$db = $database->getConnection();

$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$genero = isset($_GET['genero']) ? $_GET['genero']: '';
$nacion = isset($_GET['nacion']) ? $_GET['nacion'] : '';

$query = "SELECT * FROM empleados WHERE 1=1 and activo = :activo";

if (!empty($nombre)) {
    $query .= " AND nombre LIKE :nombre";
}
if (!empty($genero)) {
    $query .= " AND genero LIKE :genero";
}
if (!empty($nacion)) {
    $query .= " AND nacion LIKE :nacion";
}

$stmt = $db->prepare($query);
$stmt->bindValue(':activo', 1, PDO::PARAM_INT);
$stmt->bindValue(':nombre', '%' . $nombre . '%', PDO::PARAM_STR);
$stmt->bindValue(':genero', '%' . $genero . '%', PDO::PARAM_STR);
$stmt->bindValue(':nacion', '%' . $nacion . '%', PDO::PARAM_STR);
$stmt->execute();

$autores = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($autores);
?>
