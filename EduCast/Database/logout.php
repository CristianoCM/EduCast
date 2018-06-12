<?php 
	include "iniciar_sessao.php";
	
	session_unset();
	session_destroy();
	header("Location: ../Login.html");
	exit();
?>

<!DOCTYPE html>
<html>
<head>
	<title>...</title>
</head>
<body>
	<div style="text-align: center;">
		Deslogando...
	</div>
</body>
</html>