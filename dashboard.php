<?php
session_start();
if(!isset($_SESSION['UserValues'])){
    header("location:login.php");
    exit;
}

if (isset($_COOKIE['visitcounter'])){
    $id = $_SESSION['UserValues']['id_user'];

    $visit_counter['c_index'] =  $_COOKIE['visitcounter'][$id]['index'];
    $visit_counter['c_imc'] =  $_COOKIE['visitcounter'][$id]['imc'];
    $visit_counter['c_glucosa'] =  $_COOKIE['visitcounter'][$id]['glucosa'];
    $visit_counter['c_presion'] =  $_COOKIE['visitcounter'][$id]['presion'];
    }
    else{
    $mensaje = 'Bienvenido a nuestra pagina web';
    }
require 'views/dashboard.view.php';