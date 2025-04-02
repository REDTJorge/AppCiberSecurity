<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Mi Aplicación</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .welcome-container {
            text-align: center;
            padding: 40px 20px;
        }
        
        .welcome-container h1 {
            margin-bottom: 20px;
            color: #333;
        }
        
        .welcome-container p {
            margin-bottom: 30px;
            font-size: 18px;
        }
        
        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }
        
        .button {
            display: inline-block;
            background-color: #4caf50;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .button:hover {
            background-color: #45a049;
            text-decoration: none;
        }
        
        .button.secondary {
            background-color: #2196F3;
        }
        
        .button.secondary:hover {
            background-color: #0b7dda;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-container">
            <h1>Bienvenido a Mi Aplicación</h1>
            <p>Un sistema simple de registro y acceso para usuarios.</p>
            
            <div class="button-container">
                <a href="login.php" class="button">Iniciar Sesión</a>
                <a href="register.php" class="button secondary">Registrarse</a>
            </div>
        </div>
    </div>
</body>
</html>
