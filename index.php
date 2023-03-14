<?php
session_start(); 

if(!isset($_SESSION['UserValues'])){
    header("location:login.php");
    exit;
}else{
    header("location:dashboard.php");
}
