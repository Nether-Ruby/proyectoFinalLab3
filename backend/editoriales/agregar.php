<?php
include_once '../db.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->editorial)) {
    $database = new Database();
    $db = $database->getConnection();
    $queryFilter = "SELECT activa FROM editoriales WHERE editorial = :editorial";
    $stmtFilter = $db->prepare($queryFilter);
    $stmtFilter->bindValue(":editorial", $data->editorial);
    $stmtFilter->execute();
    $result = $stmtFilter->fetch(PDO::FETCH_ASSOC);

    if ($result === false) {
        $query = "INSERT INTO editoriales (editorial, activa) VALUES (:editorial, :activa)";
        $stmt = $db->prepare($query);

        $stmt->bindValue(":editorial", $data->editorial);
        $stmt->bindValue(':activa', true, PDO::PARAM_BOOL);

        if ($stmt->execute()) {
            echo json_encode(array("message" => "Editorial agregada exitosamente."));
        } else {
            echo json_encode(array("message" => "Error al agregar la editorial."));
        }
    } else {
        if (!$result['Activa']) {
            // editorial exists and is not active, proceed with the UPDATE
            $updateQuery = "UPDATE editoriales SET editorial = :activa WHERE editorial = :editorial";
            $updateStmt = $db->prepare($updateQuery);
            $updateStmt->bindValue(':activa', true, PDO::PARAM_BOOL);
            $updateStmt->bindValue(':editorial', $data->editorial, PDO::PARAM_STR);

            if ($updateStmt->execute()) {
                echo json_encode(array("message" => "Editorial reactivada"));
            } else {
                echo json_encode(array("message" => "Error de reactivación"));
            }
        } else {
            // editorial exists and is already active
            echo json_encode(array("message" => "La editorial ya existe y está activa"));
            ;
        }
    }
} else {
    echo json_encode(array("message" => "Datos incompletos."));
}
?>