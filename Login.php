<?php
// -----------------------------------------------------------
// Bloque PHP para Conexión, Registro e Inicio de Sesión
// -----------------------------------------------------------

// 1. Incluir el archivo de conexión
require_once 'includes/prueba.php'; 

// Variable para mensajes de estado
$message = '';
$message_type = ''; // 'success' o 'error'

// Si ya hay una sesión activa, redirigir al usuario (ejemplo: 'dashboard.php')
// if (isset($_SESSION['user_id'])) {
//     header('Location: dashboard.php');
//     exit;
// }

// 2. Comprobar si se ha enviado un formulario POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    
    // Función de saneamiento de datos
    $clean_input = function($data) use ($pdo) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };

    switch ($_POST['action']) {
        
        // ===================================================
        // Lógica de REGISTRO
        // ===================================================
        case 'register':
            
            $full_name = $clean_input($_POST['full_name']);
            $email     = $clean_input($_POST['email_register']);
            $phone     = $clean_input($_POST['phone']);
            $password  = $_POST['password_register'];
            $confirm   = $_POST['password_confirm'];

            // Validaciones básicas (puedes añadir más)
            if (empty($full_name) || empty($email) || empty($password) || empty($confirm)) {
                $message = 'Todos los campos obligatorios deben ser rellenados.';
                $message_type = 'error';
                break;
            }
            if ($password !== $confirm) {
                $message = 'Las contraseñas no coinciden.';
                $message_type = 'error';
                break;
            }
            
            try {
                // Comprobar si el email ya existe en la tabla users
                $stmt = $pdo->prepare("SELECT email FROM users WHERE email = ?");
                $stmt->execute([$email]);
                if ($stmt->fetch()) {
                    $message = 'El correo electrónico ya está registrado.';
                    $message_type = 'error';
                    break;
                }
                
                // Cifrar la contraseña antes de guardarla
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Iniciar una transacción para asegurar que ambos inserts se ejecuten o ninguno
                $pdo->beginTransaction();

                // 1. Insertar en la tabla `clients`
                $sql_client = "INSERT INTO clients (full_name, phone) VALUES (?, ?)";
                $stmt_client = $pdo->prepare($sql_client);
                $stmt_client->execute([$full_name, $phone]);

                // 2. Obtener el ID del cliente recién insertado
                $client_id = $pdo->lastInsertId();
                
                // 3. Insertar en la tabla `users` (asumimos que el 'username' es el 'full_name' o el email)
                // **NOTA**: Tu tabla `users` no tiene un campo `client_id`. Deberías añadirlo o usar una tabla relacional.
                // Usaremos 'full_name' para el 'username' en este ejemplo.
                $sql_user = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
                $stmt_user = $pdo->prepare($sql_user);
                // Si la tabla users tuviera `client_id`, la consulta sería: 
                // $sql_user = "INSERT INTO users (username, password, email, client_id) VALUES (?, ?, ?, ?)";
                // $stmt_user->execute([$full_name, $hashed_password, $email, $client_id]);
                $stmt_user->execute([$full_name, $hashed_password, $email]);

                // 4. Confirmar la transacción
                $pdo->commit();
                
                $message = '¡Registro exitoso! Ya puedes iniciar sesión.';
                $message_type = 'success';
                
            } catch (\PDOException $e) {
                // Revertir la transacción en caso de error
                if ($pdo->inTransaction()) {
                    $pdo->rollBack();
                }
                // Error 23000 es comúnmente una violación de integridad (ej: campo único duplicado)
                if ($e->getCode() == 23000) {
                     $message = 'Error: Ya existe un registro con este correo electrónico o nombre de usuario.';
                } else {
                     $message = 'Error en el registro: ' . $e->getMessage();
                }
                $message_type = 'error';
            }
            break;

        // ===================================================
        // Lógica de INICIO DE SESIÓN
        // ===================================================
        case 'login':
            
            $email    = $clean_input($_POST['email_login']);
            $password = $_POST['password_login'];

            if (empty($email) || empty($password)) {
                $message = 'Ingresa tu correo electrónico y contraseña.';
                $message_type = 'error';
                break;
            }

            try {
                // Buscar el usuario por email
                $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE email = ?");
                $stmt->execute([$email]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user['password'])) {
                    // Contraseña correcta, iniciar sesión
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    
                    // Redirigir al usuario
                    header('Location: dashboard.php'); // Reemplaza con tu página de inicio de sesión exitoso
                    exit;

                } else {
                    $message = 'Credenciales incorrectas.';
                    $message_type = 'error';
                }

            } catch (\PDOException $e) {
                $message = 'Error en el inicio de sesión: ' . $e->getMessage();
                $message_type = 'error';
            }
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deportivo Patagones - Acceso Miembros</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/login.css"> 
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="card w-full max-w-md">
        
        <?php if ($message): ?>
            <div class="p-4 mb-4 text-sm rounded-lg 
            <?php echo ($message_type == 'success') ? 'bg-green-100 text-green-700 border border-green-400' : 'bg-red-100 text-red-700 border border-red-400'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <div class="flex border-b">
            <div class="tab active w-1/2 py-4 text-center font-medium" onclick="switchTab('login')">
                Iniciar Sesión
            </div>
            <div class="tab w-1/2 py-4 text-center font-medium" onclick="switchTab('register')">
                Registrarse
            </div>
        </div>
        
        <div class="px-8 pt-8 text-center">
            <div class="logo-container inline-block mb-4">
                <div class="bg-red-100 p-4 rounded-full">
                    <i class="fas fa-running text-3xl text-red-500"></i>
                </div>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-1">Deportivo Patagones</h2>
            <p class="text-gray-600 mb-6">Acceso para miembros del club</p>
        </div>
        
        <div id="login-form" class="px-8 pb-8">
            <form id="login" method="POST" action="Login.php">
                 <input type="hidden" name="action" value="login">
                <div class="mb-4 input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="login-email" name="email_login" class="form-control w-full py-2 px-3 rounded-lg" placeholder=" " required>
                    <label class="floating-label">Correo electrónico</label>
                </div>
                
                <div class="mb-6 input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="login-password" name="password_login" class="form-control w-full py-2 px-3 rounded-lg" placeholder=" " required>
                    <label class="floating-label">Contraseña</label>
                </div>
                
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="mr-2">
                        <label for="remember" class="text-sm text-gray-600">Recordarme</label>
                    </div>
                    <a href="#" class="text-sm text-red-500 hover:underline">¿Olvidaste tu contraseña?</a>
                </div>
                
                <button type="submit" class="btn-primary w-full py-3 rounded-lg font-medium mb-4">
                    Iniciar Sesión
                </button>
                
                <div class="text-center text-sm text-gray-600">
                    ¿No tienes una cuenta? <a href="#" class="text-green-600 hover:underline font-medium" onclick="switchTab('register')">Regístrate</a>
                </div>
            </form>
        </div>
        
        <div id="register-form" class="px-8 pb-8 hidden">
            <form id="register" method="POST" action="Login.php">
                <input type="hidden" name="action" value="register">
                <div class="mb-4 input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="register-name" name="full_name" class="form-control w-full py-2 px-3 rounded-lg" placeholder=" " required>
                    <label class="floating-label">Nombre completo</label>
                </div>
                
                <div class="mb-4 input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="register-email" name="email_register" class="form-control w-full py-2 px-3 rounded-lg" placeholder=" " required>
                    <label class="floating-label">Correo electrónico</label>
                </div>
                
                <div class="mb-4 input-group">
                    <i class="fas fa-phone"></i>
                    <input type="tel" id="register-phone" name="phone" class="form-control w-full py-2 px-3 rounded-lg" placeholder=" ">
                    <label class="floating-label">Teléfono (opcional)</label>
                </div>
                
                <div class="mb-4 input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="register-password" name="password_register" class="form-control w-full py-2 px-3 rounded-lg" placeholder=" " required>
                    <label class="floating-label">Contraseña</label>
                </div>
                
                <div class="mb-6 input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="register-confirm" name="password_confirm" class="form-control w-full py-2 px-3 rounded-lg" placeholder=" " required>
                    <label class="floating-label">Confirmar contraseña</label>
                </div>
                
                <div class="mb-6">
                    <div class="flex items-start">
                        <input type="checkbox" id="terms" class="mt-1 mr-2" required>
                        <label for="terms" class="text-sm text-gray-600">
                            Acepto los <a href="#" class="text-red-500 hover:underline">términos y condiciones</a>.
                        </label>
                    </div>
                </div>
                
                <button type="submit" class="btn-primary w-full py-3 rounded-lg font-medium mb-4">
                    Registrarse
                </button>
                
                <div class="text-center text-sm text-gray-600">
                    ¿Ya tienes una cuenta? <a href="#" class="text-red-500 hover:underline font-medium" onclick="switchTab('login')">Inicia Sesión</a>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // Función para cambiar entre pestañas
        function switchTab(tabId) {
            document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.card > div:nth-child(1) .tab').forEach(tab => {
                if (tab.getAttribute('onclick').includes(tabId)) {
                    tab.classList.add('active');
                }
            });
            
            document.getElementById('login-form').classList.add('hidden');
            document.getElementById('register-form').classList.add('hidden');
            document.getElementById(tabId + '-form').classList.remove('hidden');
            
            // Si hay un mensaje de error/éxito, cambia a la pestaña del formulario que lo causó
            // Esto asegura que el usuario vea el mensaje tras la redirección
            const formAction = new URLSearchParams(window.location.search).get('action');
            if (formAction) {
                if (formAction === 'login' && tabId !== 'login') {
                    switchTab('login');
                } else if (formAction === 'register' && tabId !== 'register') {
                    switchTab('register');
                }
            }
        }
        
        // Función para manejar el estado activo de la pestaña al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            // Eliminar las simulaciones de JS ya que ahora usamos PHP/POST
            // document.getElementById('login').addEventListener('submit', function(e) { e.preventDefault(); ... });
            // document.getElementById('register').addEventListener('submit', function(e) { e.preventDefault(); ... });

            // Cargar la pestaña de registro si el formulario de registro se envió
            const urlParams = new URLSearchParams(window.location.search);
            const action = urlParams.get('action');
            const messageType = '<?php echo $message_type; ?>';

            if (messageType && action === 'register') {
                 // Si hubo un mensaje (éxito o error) y venimos del registro, mostramos el registro
                 switchTab('register');
            } else {
                 // Por defecto, mostrar login
                 switchTab('login');
            }

            // Lógica para que las etiquetas flotantes funcionen correctamente al cargar la página (si tienen valor)
            document.querySelectorAll('.form-control').forEach(input => {
                if (input.value) {
                    input.parentElement.classList.add('has-value');
                }
                
                // Add floating label functionality for all inputs
                input.addEventListener('focus', function() {
                    this.nextElementSibling.style.color = '#588157';
                });
                
                input.addEventListener('blur', function() {
                    if (!this.value) {
                        this.nextElementSibling.style.color = '#999';
                    }
                });
            });
        });
        
    </script>
</body>
</html>