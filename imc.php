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
        $_SESSION['tmpimc'] = $tmpImc;
        print_r($tmpImc);
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
        //colocar el prejifo
        $_SESSION['resultado']['i_lec1'] = $_SESSION['tmpimc']['i_lec1'], 
        $_SESSION['resultado']['i_estado'] = $_SESSION['tmpimc']['i_estado'], 
        $_SESSION['resultado']['i_img_estado'] = $_SESSION['tmpimc']['i_img_estado'],
        $_SESSION['resultado']['i_nota'] = $_SESSION['tmpimc']['i_nota'],
        $_SESSION['resultado']['i_advertencia'] = $_SESSION['tmpimc']['i_advertencia'],
        $id,
        $_SESSION['UserValues']['peso'] = $tmpPeso 
    );

    }
}

require 'views/imc.view.php';