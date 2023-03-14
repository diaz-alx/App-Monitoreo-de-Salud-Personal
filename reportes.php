<?php
session_start();

if(!isset($_SESSION['UserValues'])){
    header("location:login.php");
    exit;
}
require 'config/database.php';
require 'class/Pacientes.php';

$id = $_SESSION['UserValues']['id_user'];
if (!isset($_POST['generarReporte']) && !isset($_POST['submit'])){
    setcookie("visitcounter[$id][reportes]", $_COOKIE['visitcounter'][$id]['reportes'] + 1);
    $contador = $_COOKIE['visitcounter'][$id]['reportes'];
    }else{
        $contador = $_COOKIE['visitcounter'][$id]['reportes'];
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tipoReporte = $_POST['tipo'];
 
    if ($tipoReporte == 'imc' ) {
        
        $reporte = new Pacientes();

        $datos = $reporte->ReporteImc($id);
    } elseif ($tipoReporte == 'glucosa') {
        $reporte = new Pacientes();

        $datos = $reporte->ReporteGlucosa($id);
    }else  {
        $reporte = new Pacientes();

        $datos = $reporte->ReportePresion($id);
    }
}




require 'views/reportes.view.php';