<?php 
	include "connect.php";

	$titulo = $_REQUEST["titulo"];
	$caminhoVideo = $_REQUEST["caminhoVideo"];
	$caminhoMiniatura = $_REQUEST["caminhoMiniatura"];
	$formato = $_REQUEST["formato"];
	$tamanho = $_REQUEST["tamanho"];
	$tamanhoUnidade = $_REQUEST["tamanhoUnidade"];
	$duracao = $_REQUEST["duracao"];
	$descricao = $_REQUEST["descricao"];

	$sql = "INSERT INTO Video (titulo, descricao, caminho, formato, tamanho, duracao, miniatura) VALUES ('" . $titulo . "', '" . $descricao . "', '" . $caminhoVideo . "', '" . $formato . "', '" . ($tamanho . $tamanhoUnidade) . "', '" . $duracao . "', '" . $caminhoMiniatura . "')";

	if ($conn->query($sql) === TRUE) {
	    echo " OK";
	} else {
	    echo " Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>