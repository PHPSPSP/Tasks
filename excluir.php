<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

header("Content-Type: text/html; charset=UTF-8",true) ;
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set("America/Sao_Paulo");

include("config.php");
$id = $_GET['id'];

  $a=mysqli_query($mysqli,"DELETE FROM tarefa where id=".$id);  
  $mysqli->query($a);

  if($a){  
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Deletado com Sucesso!');
    window.location.href='dashboard.php';
    </SCRIPT>");
    exit;
  }

?>