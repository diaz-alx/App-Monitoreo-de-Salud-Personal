<?php
session_start();
if(!isset($_SESSION['UserValues'])){
    header("location:login.php");
    exit;
}

require 'class/Pacientes.class.php';

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
    if ($tmpLectura1 <= 40 || $tmpLectura2 <= 40  ) {
        $errormsg = "<div class='alert alert-danger' role='alert'>Los valores de lectura no son validos. Repita la lectura para obtener un mejor diagnóstico. Ver cuadro de referencia.</div>";
    } else {
        $tmpUser = new Pacientes($_SESSION['UserValues']['user'], $_SESSION['UserValues']['pass']);
        $tmpPresion = $tmpUser->setPresionArterial($tmpLectura1, $tmpLectura2, FALSE);
        if(null != $tmpPresion){
            $resultPresion = $tmpPresion;
        }else{
            $errormsg = "<div class='alert alert-danger' role='alert'>Los valores de lectura no son validos. Repita la lectura para obtener un mejor diagnóstico. Ver cuadro de referencia.</div>";
        }
    }
}

if(isset($_POST['submit'])){
    $tmpLectura1 = $_POST['set_lectura1'];
    $tmpLectura2 = $_POST['set_lectura2'];
    if ($tmpLectura1 <= 40 || $tmpLectura2 <= 40 ) {
        $errormsg = "<div class='alert alert-danger' role='alert'>Los valores de lectura no son validos. Repita la lectura para obtener un mejor diagnóstico. Ver cuadro de referencia.</div>";
        
    } else {
    
    $setUserPresion = new Pacientes($_SESSION['UserValues']['user'], $_SESSION['UserValues']['pass']);
    
    $setPresion = $setUserPresion->setPresionArterial($tmpLectura1,$tmpLectura2, TRUE);
    $_SESSION['UserValues']['presion']['estado'] = $setUserPresion->getPresionArterial()['estado'];
    $_SESSION['UserValues']['presion']['sistolica'] = $setUserPresion->getPresionArterial()['sistolica'];
    $_SESSION['UserValues']['presion']['diastolica'] = $setUserPresion->getPresionArterial()['diastolica'];
    $_SESSION['UserValues']['presion']['mensaje'] = $setUserPresion->getPresionArterial()['mensaje'];
    $_SESSION['UserValues']['presion']['alerta'] = $setUserPresion->getPresionArterial()['alerta'];
    }
}

require 'views/presion.view.php';