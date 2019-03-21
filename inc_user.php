<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

header("Content-Type: text/html; charset=UTF-8",true) ;
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set("America/Sao_Paulo");

include("config.php");

$mail = $_POST['mail'];
$nome = $_POST['nome'];
$s = md5(md5(md5(md5($_POST['senha']))));

$sql = mysqli_query($mysqli,"SELECT * FROM usuarios WHERE email='$mail'");
$cnt = mysqli_num_rows($sql);

if ($cnt <= 0){
  $a=mysqli_query($mysqli,"INSERT INTO usuarios(nome,email,senha) VALUES('$nome','$mail','$s')");
  
  $mysqli->query($a);
  if($a){  
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Cadastrado com Sucesso!');
    window.location.href='index.php';
    </SCRIPT>");
    exit;
  }
} else {

  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Usuário já Cadastrado!');
    window.location.href='index.php';
    </SCRIPT>");
}

?>