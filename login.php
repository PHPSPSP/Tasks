<?php
session_start();
require("config.php");

$l = $_POST['l'];
$s = $_POST['s'];
$s = md5(md5(md5(md5($s))));

$sql = "SELECT * FROM usuarios WHERE email='$l' AND senha='$s'";
$query = mysqli_query($mysqli, $sql);
$cnt = mysqli_num_rows($query);

while($linha = mysqli_fetch_array($query)) {
	if($cnt > 0) {
		echo "Aqui";
	
		$_SESSION['nome'] 		= $linha['nome'];		
		$_SESSION['id'] 		= $linha['id'];
		$_SESSION['mail'] 		= $linha['mail'];
		$_SESSION['senha'] 		= $linha['senha'];		
	  header("Location: dashboard.php");
	} else {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		        window.alert('Usuario ou Senha inválidos.');
				window.location.href='index.php';
		        </SCRIPT>");	
	}
}
?>