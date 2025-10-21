<?php
// conexion.php

// -----------------------------------------------------------
// Configuración de la Base de Datos: 'deportivo_patagones'
// -----------------------------------------------------------
$host = '127.0.0.1'; 
$db   = 'deportivo_patagones'; 
$user = 'root'; // ¡Cambia esto por tu usuario de BD!
$pass = ''; // ¡Cambia esto por tu contraseña de BD!
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    // Lanza excepciones en caso de error para un manejo más fácil
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    // Devuelve los resultados como arrays asociativos
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // Desactiva la emulación de prepared statements (más seguro)
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     // Puedes iniciar la sesión aquí si no quieres que haya código HTML antes de session_start()
     if (session_status() === PHP_SESSION_NONE) {
        session_start();
     }
} catch (\PDOException $e) {
     // Detiene la ejecución y muestra un error si la conexión falla
     die("Error de conexión a la base de datos: " . $e->getMessage());
}

// Nota importante: Las columnas 'username' y 'email' deben ser únicas en tu tabla `users` para que la autenticación funcione correctamente.
?>