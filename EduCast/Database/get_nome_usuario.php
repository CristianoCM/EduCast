<?php 
	include "connect.php";

	$sql = "SELECT nome FROM usuario WHERE ";
  	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "|" . $row["nome"];
		}
	} else {
		echo "|Nome do Usuário";
	}

	$conn->close();
 ?>