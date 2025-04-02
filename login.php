<?php
// Iniciar sesión
session_start();

// Incluir el archivo de configuración
require_once 'config.php';

$message = '';

// Verificar si el usuario ya está logueado
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

// Procesar formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Buscar usuario en la base de datos
    $query = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        // Verificar contraseña
        if (password_verify($password, $user['password'])) {
            // Guardar información de sesión
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // Redirigir al dashboard
            header("Location: dashboard.php");
            exit;
        } else {
            $message = "La contraseña no es válida.";
        }
    } else {
        $message = "No se encontró una cuenta con ese nombre de usuario.";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <?php if(!empty($message)): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="form-group">
                <input type="submit" value="Iniciar Sesión">
            </div>
        </form>
        
        <p>¿No tienes una cuenta? <a href="register.php">Regístrate</a></p>
    </div>
</body>
</html>
