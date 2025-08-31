<?php
session_start();

// Si la sesión no está activa, redirige al login
if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit;
}

// Verificación de rol
function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function isUser() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'user';
}
?>
