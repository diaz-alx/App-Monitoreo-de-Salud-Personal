<?php
session_start();

if(!isset($_SESSION['UserValues'])){
    header("location:login.php");
    exit;
}
require 'class/Pacientes.class.php';

$id = $_SESSION['UserValues']['id_user'];
if (!isset($_POST['calcular_glucosa']) && !isset($_POST['submit']) && !isset($_REQUEST['actualizar_glucosa'])){
    setcookie("visitcounter[$id][glucosa]", $_COOKIE['visitcounter'][$id]['glucosa'] + 1);
    $contador = $_COOKIE['visitcounter'][$id]['glucosa'];
    }else{
        $contador = $_COOKIE['visitcounter'][$id]['glucosa'];
    }

if(isset($_POST['calcular_glucosa'])){
    $tmpLectura = $_POST['lectura'];
    $tmpPeriodo = $_POST['periodo'];
    if ($tmpLectura <= 0 ) {
        $errormsg = "<div class='alert alert-danger' role='alert'>Los valores ingresados no son validos!</div>";
        
    } else {
        $tmpUser = new Pacientes($_SESSION['UserValues']['user'], $_SESSION['UserValues']['pass']);
    
        $tmpGlucosa = $tmpUser->CalcularGlucosa($tmpLectura, $tmpPeriodo, FALSE);
        $resultGlucosa = $tmpGlucosa;
        $_SESSION['TmpValGlucosa'] = $resultGlucosa;
    }
}

if(isset($_POST['submit'])){
    $tmpLectura = $_POST['set_lectura'];
    $tmpPeriodo = $_POST['set_periodo'];
    if ($tmpLectura <= 0 ) {
        $errormsg = "<div class='alert alert-danger' role='alert'>Los valores ingresados no son validos!</div>";
        
    } else {
    
    $setUserGlucosa = new Pacientes();
    
    $setGlucosa = $setUserGlucosa->GuardarGlucosa(
        $tmpLectura,
        $tmpPeriodo, TRUE);
   
    }
}
require 'views/glucometro.view.php';