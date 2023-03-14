<?php
session_start();
if(!isset($_SESSION['UserValues'])){
    header("location:login.php");
    exit;
}

require 'config/database.php';
require 'class/Pacientes.php';

$id = $_SESSION['UserValues']['id_user'];
if (!isset($_POST['calcular_presion']) && !isset($_POST['submit']) && !isset($_REQUEST['actualizar_presion'])){
    setcookie("visitcounter[$id][presion]", $_COOKIE['visitcounter'][$id]['presion'] + 1);
    $contador = $_COOKIE['visitcounter'][$id]['presion'];
    }else{
        $contador = $_COOKIE['visitcounter'][$id]['presion'];
    }

if(isset($_POST['calcular_presion'])){
    $tmpLectura1 = $_POST['lectura1'];
    $tmpLectura2 = $_POST['lectura2'];

    print_r($_POST['lectura1']);
    print_r($_POST['lectura2']);
    // if ($tmpLectura1 <= 41 || $tmpLectura2 <= 40) {
    //     $errormsg = "<div class='alert alert-danger' role='alert'>Repita la lectura para obtener un mejor diagnóstico. Ver cuadro de referencia.</div>";
    // } else {
        $tmpUser = new Pacientes();
        $tmpPresion = $tmpUser->CalcularPresion($tmpLectura1, $tmpLectura2);

        print_r($tmpUser->getPresionArterial());

        //print_r($tempPresion);
        if($tmpPresion == null){
            $errormsg = "<div class='alert alert-danger' role='alert'> Los valores de lectura no son validos. Repita la lectura para obtener un mejor diagnóstico. Ver cuadro de referencia.</div>";
        }else{
            
            $resultPresion = $tmpPresion;
            $_SESSION['TmpPresion'] = $tmpPresion;
        }
    // }
}

if(isset($_POST['submit'])){
    $tmpLectura1 = $_POST['set_lectura1'];
    $tmpLectura2 = $_POST['set_lectura2'];
    if ($tmpLectura1 <= 40 || $tmpLectura2 <= 40 ) {
        $errormsg = "<div class='alert alert-danger' role='alert'>Los valores de lectura no son validos. Repita la lectura para obtener un mejor diagnóstico. Ver cuadro de referencia.</div>";
        
    } else {
    
    $setUserPresion = new Pacientes();
    $setUserPresion->GuardarPresion(
        //colocar el prefijo en la llave
        $_SESSION['resultado']['p_estado'] = $_SESSION['TmpPresion']['p_estado'],
        $_SESSION['resultado']['p_lec1'] = $_SESSION['TmpPresion']['p_lec1'],
        $_SESSION['resultado']['p_lec2'] = $_SESSION['TmpPresion']['p_lec2'],
        $_SESSION['resultado']['p_nota'] = $_SESSION['TmpPresion']['p_nota'],
        $_SESSION['resultado']['p_advertencia'] = $_SESSION['TmpPresion']['p_advertencia'],
        $id);
    }
}

require 'views/presion.view.php';