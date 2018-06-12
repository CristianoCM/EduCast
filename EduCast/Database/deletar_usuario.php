<?php
	include "iniciar_sessao.php";
	include "connect.php";
	
	$sql = "DELETE FROM Usuario WHERE codigo = " . $_SESSION["IdUser"];

	if ($conn->query($sql) === TRUE) {
	    echo "|OK";
	    include "logout.php";
	} else {
	    echo "|Falha: " . $conn->error;
	}

	$conn->close();
?>