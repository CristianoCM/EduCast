<?php 
	include "iniciar_sessao.php";
	include "connect.php";

	$sql = "UPDATE Usuario SET nome = '" . $_REQUEST["nome"] . "' WHERE email = '" . $_SESSION["User"] . "'";

	if ($conn->query($sql) === TRUE) {
		$_SESSION["Name"] = $_REQUEST["nome"];
	    echo $_SESSION["User"] . "|SHOW";
	} else {
	    echo "|Error: " . $conn->error;
	}

	$conn->close();
 ?>