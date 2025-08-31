<?php
session_start();
require_once __DIR__ . '/includes/conn.php'; // este define $pdo

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

    if (!$username || !$password) {
        die("Por favor complete todos los campos.");
    }

    try {
        // Usamos $pdo en lugar de $conn
        $stmt = $pdo->prepare("SELECT id, username, password, role FROM users WHERE username = :username LIMIT 1");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificación con SHA-256 (según tu tabla actual)
            if (hash('sha256', $password) === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Redirigir según rol
                $redirect = ($user['role'] === 'admin') ? 'admin/index.php' : 'user/index.php';
                header("Location: $redirect");
                exit;
            } else {
                die("Contraseña incorrecta.");
            }
        } else {
            die("Usuario no encontrado.");
        }
    } catch (PDOException $e) {
        die("Error en la consulta: " . $e->getMessage());
    }
} else {
    header("Location: login.php");
    exit;
}
?>
