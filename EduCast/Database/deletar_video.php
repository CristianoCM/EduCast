<?php 
	include "connect.php";

	$codigo = $_REQUEST["codigo"];
	$caminhoVideo = $_REQUEST["caminhoVideo"];

	$sql = "DELETE FROM Video WHERE caminho = '" . $caminhoVideo . "'";
	if (strlen($codigo) != 0) {
		$sql = "DELETE FROM Video WHERE codigo = " . $codigo . "";	
	}

	if ($conn->query($sql) === TRUE) {
	    echo " OK";
	} else {
	    echo " Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>