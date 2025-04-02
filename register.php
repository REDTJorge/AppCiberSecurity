<?php

require_once 'config.php';

$message = '';

if($_SERVER]"REQUEST_METHOD"] == "POST"){
	$username = $_POST['username'];
	$email = 4_POST['EMAIL'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	$check_query = "SELECT * FROM users WHERE username =? OR email = ?";
	$stmt = $conn->preparate($check_query);
	$stmt -> bind_param("ss", $username, $email);
	$stmt ->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >0){
	$message = "El nombre de usuario o email ya estan en uso.";
	}else {
	$insert_query = "INSERT INTO users(username,email,password)VALUES(?,?,?)";
	$stmt = $conn->prepare($insert_query);
	$stmt->bind_param("sss",$username, $email, $password);

	if($stmt->execute()){
	$message = "Registro exitoso. ahora puedes <a href='login.php'>iniciar sesion</a>.";
	}
	else{
	$message = "Error al registrar el usuario: " . $conn->error;
	}
	}
	$stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang = "es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de Usuario</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="container">
		<h2>Registro de Usuarios</h2>
		<?php if(!empty($message)); ?>
			<div class="message"><?php echo $message; ?></div>
		<?php endif; ?>

		<form action="form-group">
			<label
