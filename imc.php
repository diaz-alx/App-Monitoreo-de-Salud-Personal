<?php
session_start();
if(!isset($_SESSION['UserValues'])){
    header("location:login.php");
    exit;
}
require 'config/database.php';
require 'class/Pacientes.php';

$id = $_SESSION['UserValues']['id_user'];
if ( !isset($_POST['calcular_imc']) && !isset($_POST['submit']) && !isset($_REQUEST['actualizar_imc'])){
    setcookie("visitcounter[$id][imc]", $_COOKIE['visitcounter'][$id]['imc'] + 1);
    $contador = $_COOKIE['visitcounter'][$id]['imc'];
    }else{
        $contador = $_COOKIE['visitcounter'][$id]['imc'];
    }



if(isset($_POST['calcular_imc'])){
    $tmpPeso = $_POST['peso_imc'];
    $tmpAltura = $_POST['altura_imc'];
    if ($tmpPeso <= 0 || $tmpAltura <= 0) {
        $errormsg = "<div class='alert alert-danger' role='alert'>Los valores ingresados no son validos!</div>";
        
    } else {
        $tmpUser = new Pacientes();
        $tmpImc = $tmpUser->CalcularImc($tmpPeso, $tmpAltura, FALSE);
        $resultImc = $tmpImc;
        $_SESSION['TmpImcResult'] = $tmpImc;

        echo $_SESSION['TmpImcResult']['imc_valor'];
    }
}

if(isset($_POST['submit'])){
    $tmpPeso = $_POST['peso'];
    $tmpAltura = $_POST['altura'];

    if ($tmpPeso <= 0 || $tmpAltura <= 0) {
        $errormsg = "<div class='alert alert-danger' role='alert'>Los valores ingresados no son validos!</div>";
        
    } else {
    
    $setUserImc = new Pacientes();
    $setUserImc->GuardarImc(
        $_SESSION['TmpImcResult']['imc_valor'],
        $_SESSION['TmpImcResult']['estado'], 
        $_SESSION['TmpImcResult']['img_estado'],
        $_SESSION['TmpImcResult']['nota'],
        $_SESSION['TmpImcResult']['advertencia'],
        $id);

    }
}

require 'views/imc.view.php';