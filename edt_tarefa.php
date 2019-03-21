<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

header("Content-Type: text/html; charset=UTF-8",true) ;
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set("America/Sao_Paulo");

include("config.php");

$id = $_POST['id'];
$tit = $_POST['tit'];
$status = $_POST['status'];
$ocr = $_POST['ocr'];
$sol = $_POST['sol'];

  $a=mysqli_query($mysqli,"UPDATE tarefa SET titulo='$tit',status='$status',ocorrencia='$ocr', solucao='$sol' where id=".$id);  
  $mysqli->query($a);

  if($a){  
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Alterado com Sucesso!');
    window.location.href='dashboard.php';
    </SCRIPT>");
    exit;
  }

?>