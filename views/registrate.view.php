<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type='text/css' href="css/fontawesome/all.js">
	<link rel="stylesheet" type='text/css' href="css/bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type='text/css' href="css/estilos.css">
	<title>Crea una cuenta</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">ClINICA ABC</h1>
		<h1 class="titulo">Regístrate</h1>
		
		<hr class="border">

		<form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<h5 class="text-center">Datos Personales</h5>
			<div class="form-group">
				<i class="icono izquierda fas fa-user fa-2x"></i><input class="usuario" type="text" name="usuario" placeholder="Usuario">
			</div>

			<div class="form-group">
				<i class="icono izquierda fas fa-lock fa-2x"></i><input class="usuario" type="text" name="nombre" placeholder="Nombre">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><select class="usuario" name="genero" id="genero">
															<option value="femenino">femenino</option>
															<option value="masculino">masculino</option>
														</select>
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input class="fecha" type="date" name="fecha"  min="1900-01-01" placeholder="Fecha de Nacimiento">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input class="valores" type="number" name="peso" step="0.01" min="10" max="500" placeholder="Peso en KG">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input class="valores" type="number" name="altura" step="0.01" min="1" max="3" placeholder="Altura en mts">
			</div>
			<h5 class="text-center">Validar Contraseña</h5>
			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input class="password" type="password" name="password" placeholder="Contraseña">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input class="password_btn" type="password" name="password2" placeholder="Repite la contraseña">
				<i class="submit-btn fas fa-arrow-alt-to-right" onclick="login.submit()"></i>
			</div>

			<!-- Comprobamos si la variable errores esta seteada, si es asi mostramos los errores -->
			<?php if(!empty($errores)): ?>
				
					
						<?php echo $errores; ?>
					
				
			<?php endif; ?>
		</form>

		<p class="texto-registrate">
			¿ Ya tienes cuenta ?
			<a href="login.php">Iniciar Sesión</a>
		</p>

	</div>
</body>
</html>