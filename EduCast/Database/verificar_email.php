<?php 
	include "connect.php";

	$e = $_REQUEST["ema"];

	$sql = "SELECT codigo FROM Usuario WHERE email = '" . $e . "'";
  	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo " OK";
	} else {
		echo " Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>
