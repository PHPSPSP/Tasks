<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

header("Content-Type: text/html; charset=UTF-8",true) ;
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set("America/Sao_Paulo");

include("config.php");

$cod = $_POST['cod'];
$tit = $_POST['tit'];
$ocr = $_POST['ocr'];
$date = date('Y-m-d');

  $a=mysqli_query($mysqli,"INSERT INTO tarefa (id,codigo,titulo,ocorrencia,dt_ini) VALUES (0,$cod,'$tit','$ocr','$date')");    
  if($a){  
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('incluido com Sucesso!');
    window.location.href='dashboard.php';
    </SCRIPT>");
    exit;
  }

?>