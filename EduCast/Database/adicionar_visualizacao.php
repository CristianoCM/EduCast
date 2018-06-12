<?php
	include "iniciar_sessao.php"; 
	include "connect.php";

	$vi = $_REQUEST["vi"];
	$u = $_SESSION["IdUser"];

	$sql = "INSERT INTO Visualizados (usuarioId, videoId) VALUES (" . $u . ", " . $vi . ")";

	if ($conn->query($sql) === TRUE) {
	    echo " OK";
	} else {
	    echo " Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>