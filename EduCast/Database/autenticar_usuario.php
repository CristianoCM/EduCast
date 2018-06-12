<?php
	include "iniciar_sessao.php"; 
	include "connect.php";

	$u = $_REQUEST["usuario"];
	$s = $_REQUEST["senha"];

	$sql = "SELECT codigo, nome, dataCadastro FROM Usuario WHERE email = '" . $u . "' AND senha = '" . md5($s) . "'";
  	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$_SESSION["IdUser"] = $row["codigo"];
			$_SESSION["Name"] = $row["nome"];
			$_SESSION["User"] = $u;
			$_SESSION["Passwd"] = $s;
			$_SESSION["Dt"] = $row["dataCadastro"];
			echo " OK";
		}
	} else {
		echo " NOPS";
	}

	$conn->close();
?>