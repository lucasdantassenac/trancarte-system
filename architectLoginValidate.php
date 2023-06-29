<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
	include("includes/conexao.php");

    $login = $_POST['login'];
    $senha = md5($_POST['senha']);

    # aqui foi posto um scape das instruções pq da forma como estava poderia passar um conjunto de comandos para o mysql direto do formulario;
	$sql="SELECT * FROM arquitetos WHERE (email='$login' OR usuario = '$login' ) AND senha = '$senha' AND status = 'a';";
	$query=mysqli_query($mysqli,$sql);
	$num_linhas=mysqli_num_rows($query);
	
	if ($num_linhas=="0")
	{
		header("Location: index.php?erro=1");
	}
	else
	{
		$reg=mysqli_fetch_array($query);
		$codigo=$reg['idArquiteto'];
		$userType = "architect";
		$_SESSION["codigo"] = $codigo;
		$_SESSION['userType'] = $userType;
		header("Location: arquitetos/home.php");
		
	}
?>
