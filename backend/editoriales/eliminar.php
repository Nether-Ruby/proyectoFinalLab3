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
        echo json_encode(array("message" => "La editorial no existe"));
    } else {
        if (!$result['Activa']) {
            // editorial exists and is not active, proceed with the UPDATE
            echo json_encode(array("message" => "La editorial ya fue eliminada"));
        } else {
            // editorial exists and is already active
            $updateQuery = "UPDATE editoriales SET activa = :activa WHERE editorial = :editorial";
            $updateStmt = $db->prepare($updateQuery);
            $updateStmt->bindValue(':activa', false, PDO::PARAM_BOOL);
            $updateStmt->bindValue(':editorial', $data->editorial, PDO::PARAM_STR);

            if ($updateStmt->execute()) {
                echo json_encode(array("message" => "editorial eliminada"));
            } else {
                echo json_encode(array("message" => "Error de eliminación"));
            }
        }
    }
} else {
    echo json_encode(array("message" => "Datos incompletos."));
}
?>