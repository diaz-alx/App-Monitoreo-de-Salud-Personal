<?php
session_start();

require 'config/database.php';
require 'class/Pacientes.php';

if(isset($_POST['Submit']))
{
    $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
    
   	$validacion = new Pacientes();
    $id = $validacion->ValidarPaciente($Username, $Password);
    if (!$id)
    {
        $msg = "<div class='alert alert-danger' role='alert'>El usuario o la contraseña ingresada son incorretos!</div>";
    }else
    {
        $paciente = $validacion->get_paciente($id);
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
        }


        header("location:dashboard.php");
        exit;
    }
}

require 'views/login.view.php';