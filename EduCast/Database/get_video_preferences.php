<?php
	include "iniciar_sessao.php";
	include "connect.php";
	 
	$sql = "SELECT rodarAutomatico FROM Perfil WHERE usuarioId = " . $_SESSION["IdUser"];
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) { 
			echo "|" . $row['rodarAutomatico'];
		}
	} else {
		echo "|NOPS";
	}
?>