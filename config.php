<?php
@session_start();
header('Content-Type: text/html; charset=utf-8');
	
//Base de Dados
$host    = 'localhost'; 	//Servidor
$user    = "spsp1";         //Usuário
$pass    = "spsp2018";      //Senha
@$db 	 = "task";
		
$mysqli = mysqli_connect($host, $user, $pass, @$db);
mysqli_set_charset($mysqli,'utf8'); //Change character set to utf8
$mysqli->query('SET AUTOCOMMIT = 1');

if (mysqli_connect_error ($mysqli)){
	echo "Falha na Conexão Erro: ".mysqli_connect_error();
	exit();
}

//$usermail = 'noreply@spsp.com.br';
//$pwdmail = '3m2i5s7s7';
//$hostmail = 'smtp.spsp.com.br';
//$portmail = 587;
?>