<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type='text/css' href="css/fontawesome/all.js">
	<link rel="stylesheet" type='text/css' href="css/bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type='text/css' href="css/estilos.css">
	
	<title>Iniciar Sesión</title>
</head>
<body>
	<div class="contenedor">
	<h1 class="titulo">ClINICA ABC</h1>
		<h1 class="titulo">Iniciar Sesión</h1>
		
		<hr class="border">

		<form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input class="usuario" type="text" name="usuario" placeholder="Usuario">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input class="password_btn" type="password" name="password" placeholder="Password">
				<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
			</div>

			<!-- Comprobamos si la variable errores esta seteada, si es asi mostramos los errores -->
			<?php if(!empty($msg)): ?>
				
						<?php echo $msg; ?>
					
			<?php endif; ?>
		</form>

		<p class="texto-registrate">
			¿ Aun no tienes cuenta ?
			<a href="registrate.php">Regístrate</a>
		</p>

	</div>
</body>
<footer>
<p class="text-center">Universidad Tecnológica de Panamá &reg;</p>
<p class="text-center">Por: Gabriel Díaz</p>
</footer>
</html>