<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
	include("includes/conexao.php");

    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    # aqui foi posto um scape das instruções pq da forma como estava poderia passar um conjunto de comandos para o mysql direto do formulario;
	$sql="SELECT * FROM arquitetos WHERE email='$email' AND senha = '$senha' AND status = 'a';";
	$query=mysqli_query($mysqli,$sql);
	$num_linhas=mysqli_num_rows($query);
	
	if ($num_linhas=="0")
	{
		echo $email;
		echo $senha;
		#header("Location: index.php?erro=1");
	}
	else
	{
		$reg=mysqli_fetch_array($query);
		$codigo=$reg['idArquiteto'];
		
		$_SESSION["codigo"] = $codigo;
		
		header("Location: arquitetos/home.php");
		
	}
?>
