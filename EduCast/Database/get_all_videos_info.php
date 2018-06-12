<?php
	include "iniciar_sessao.php";
	include "connect.php";
	 
	$sql = "SELECT codigo, titulo, descricao, caminho, formato, tamanho, duracao, miniatura, dataCadastro FROM Video";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) { 
			echo "¬" . $row["codigo"]  . "¬" . $row["titulo"] . "¬" . $row["descricao"] . "¬" . $row["caminho"] . "¬" . $row["formato"] . "¬" . $row["tamanho"] . "¬" . $row["duracao"] . "¬" . $row["miniatura"] . "¬" . $row["dataCadastro"];
		}
	} else {
		echo "|NOPS";
	}
?>