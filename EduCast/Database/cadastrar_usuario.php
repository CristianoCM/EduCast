<?php 
	include "connect.php";

	$u = $_REQUEST["ema"];
	$s = $_REQUEST["sen"];

	$sql = "INSERT INTO Usuario (email, senha) VALUES ('" . $u . "', '" . $s . "')";

	if ($conn->query($sql) === TRUE) {
	    echo " OK";
	} else {
	    echo " Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>