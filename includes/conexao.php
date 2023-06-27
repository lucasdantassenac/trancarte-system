<?php

	require_once 'dblogindata.php';

	// Conecta-se ao banco de dados MySQL
	$mysqli = new mysqli($db_server, $db_user, $db_password, $db);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	// Caso algo tenha dado errado, exibe uma mensagem de erro
	if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

?>
