<?php
session_start();
include_once 'db.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"), true); // Decodificar como array asociativo

$username = $data['username'];
$password = $data['password'];

if (!empty($username) && !empty($password)) {
    $query = "SELECT id, nombre, pass FROM empleados WHERE nombre = :username AND activo = 1";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password === $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['nombre'];
        $_SESSION['rol'] = $user['rol'];

        echo json_encode(array("message" => "Login successful."));

        // Redireccionar según el rol del usuario
        if ($user['rol'] === 1) {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: user_dashboard.php");
        }
        exit;
    } else {
        echo json_encode(array("message" => "Invalid username or password."));
    }
} else {
    echo json_encode(array("message" => "Please fill in all fields."));
}
?>