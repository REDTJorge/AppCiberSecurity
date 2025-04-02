<?php
// Iniciar sesión
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <a href="logout.php" class="btn">Cerrar Sesión</a>
        </div>
        
        <div class="dashboard-content">
            <h3>Panel de Control</h3>
            <p>Este es el panel de control de tu aplicación. Aquí puedes agregar el contenido específico de tu aplicación.</p>
            
            <!-- Aquí puedes agregar el contenido específico de tu aplicación -->
            <div class="app-section">
                <h4>Funcionalidades de la Aplicación</h4>
                <ul>
                    <li><a href="#">Módulo 1</a></li>
                    <li><a href="#">Módulo 2</a></li>
                    <li><a href="#">Módulo 3</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
