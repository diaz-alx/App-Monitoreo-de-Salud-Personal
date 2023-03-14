<?php session_start();
// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al contenido, para que no pueda volver a registrar un usuario.
if(isset($_SESSION['UserValues'])){
    header("location:index.php");
	die();
}
require 'config/database.php';
require 'class/Pacientes.php';
// Comprobamos si ya han sido enviado los datos
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Validamos que los datos hayan sido rellenados
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$nombre = filter_var(strtolower($_POST['nombre']), FILTER_SANITIZE_STRING);
	$fecha = $_POST['fecha'];
	$genero = $_POST['genero'];
	$altura = $_POST['altura'];
	$peso = $_POST['peso'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$errores = '';
	// Comprobamos que ninguno de los campos este vacio.
	if (empty($usuario) or empty($password) or empty($password2) or empty($fecha) or empty($peso) or empty($altura) or empty($genero) or empty($nombre)) {
		$errores = "<div class='alert alert-danger' role='alert'>Por favor rellena todos los datos correctamente!</div>";
	} else {
		// Comprobamos que el usuario no exista ya.
		$validacion = new Pacientes();
		$resultado = $validacion->ValidarPacienteExist($usuario);
		// Si resultado es diferente a false entonces significa que ya existe el usuario.
		if ($resultado != false) {
			$errores .= "<div class='alert alert-danger' role='alert'>El nombre de usuario ya existe</div>";
		}
		// Hasheamos nuestra contraseña para protegerla un poco.
		# OJO: La seguridad es un tema muy complejo, aqui solo estamos haciendo un hash de la contraseña,
		# pero esto no asegura por completo la informacion encriptada.
		$password = hash('sha512', $password);
		$password2 = hash('sha512', $password2);
		// Comprobamos que las contraseñas sean iguales.
		if ($password != $password2) {
			$errores.= "<div class='alert alert-danger' role='alert'>Las contraseñas no son iguales</div>";
		}
	}
	// Comprobamos si hay errores, sino entonces agregamos el usuario y redirigimos.
	if ($errores == '') {
		$validacion->RegistrarNuevoPaciente($usuario,$password,$nombre,$genero,$fecha, $peso, $altura);
		// Despues de registrar al usuario redirigimos para que inicie sesion.
		header('Location: login.php');
	}
}
require 'views/registrate.view.php';
?>