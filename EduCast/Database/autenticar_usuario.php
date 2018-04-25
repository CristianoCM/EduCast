<?php
	session_start();
?>

<?php 
	include "connect.php";

	$u = $_REQUEST["usuario"];
	$s = $_REQUEST["senha"];

	$sql = "SELECT nome FROM usuario WHERE email = '" . $u . "' AND senha = '" . $s . "'";
  	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$_SESSION["nomeUsuario"] = $row["nome"];
			$_SESSION["emailUsuario"] = $u;
			echo " OK";
		}
	} else {
		echo " NOPS";
	}

	$conn->close();
?>