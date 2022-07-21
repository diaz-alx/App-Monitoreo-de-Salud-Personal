<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
    <title>Clínica ABC</title>
</head>
<body>
<div class="wrapper">
	<h2 class="text-center">Bienvenido a nuestra Web</h2> 
    <form class="form-signin" action="" method="POST">       
      <h2 class="form-signin-heading text-center">CLINICA ABC</h2>
      <input type="text" class="form-control" name="Username" placeholder="Nombre de usuario" required="" autofocus="" />
      <input type="password" class="form-control" name="Password" placeholder="Contraseña" required=""/>
	  <?php if(isset($msg)){?>
		<?php echo $msg;?>
		<?php } ?>      
      
      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Iniciar Sesión" name="Submit">
    </form>
</div>

</body>
<footer>
<p class="text-center">Universidad Tecnológica de Panamá &reg;</p>
<p class="text-center">Por: Gabriel Díaz & Gerardo Valderrama</p>
</footer>
</html>