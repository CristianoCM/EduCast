<?php
	include "iniciar_sessao.php";
	include "connect.php";
	 
	$sql = "SELECT titulo, descricao, caminho, formato, tamanho, duracao, miniatura FROM Video WHERE codigo = " . $_REQUEST["codigo"];
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) { 
			echo "¬" . $row["titulo"] . "¬" . $row["descricao"] . "¬" . $row["caminho"] . "¬" . $row["formato"] . "¬" . $row["tamanho"] . "¬" . $row["duracao"] . "¬" . $row["miniatura"];
		}
	} else {
		echo "|NOPS";
	}
?>