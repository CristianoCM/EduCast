<?php 
	include "connect.php";

	$sql = "UPDATE Usuario SET nome = '" + $_REQUEST["nome"] + "' WHERE email = '" . $_SESSION["emailUsuario"] . "'";

	if ($conn->query($sql) === TRUE) {
	    echo "|SHOW";
	} else {
	    echo "|Error: " . $conn->error;
	}

	$conn->close();
 ?>