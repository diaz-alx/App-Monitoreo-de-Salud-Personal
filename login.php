<?php session_start();



require 'config/database.php';
require 'class/Pacientes.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password = hash('sha512', $password);

	// Nos conectamos a la base de datos
	$validacion = new Pacientes();
    $id = $validacion->ValidarPaciente($usuario, $password);

    if (!$id)
    {
        $msg = "<div class='alert alert-danger' role='alert'>El usuario o la contraseña ingresada son incorretos!</div>";
    }
    else
    {
        $paciente = $validacion->get_paciente($id);
        
        $resultado = $validacion->BuscarResultados($id);
       
        $_SESSION['resultado'] = $resultado;
        $_SESSION['UserValues'] = $paciente;
        if (isset($_COOKIE['visitcounter'][$id]))
        {
            setcookie("visitcounter[$id][index]", $_COOKIE['visitcounter'][$id]['index'] + 1);
        }
        else
        {
            setcookie("visitcounter[$id][index]", 1);
            setcookie("visitcounter[$id][imc]", 0);
            setcookie("visitcounter[$id][glucosa]", 0);
            setcookie("visitcounter[$id][presion]", 0);
            setcookie("visitcounter[$id][reportes]", 0);
        }

        header("location:dashboard.php");
        exit;
    }

	
}

require 'views/login.view.php';

?>