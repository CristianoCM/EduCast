<?php 
	include "connect.php";

	$titulo = $_REQUEST["titulo"];
	$caminhoVideo = $_REQUEST["caminhoVideo"];
	$caminhoMiniatura = $_REQUEST["caminhoMiniatura"];
	$formato = $_REQUEST["formato"];
	$tamanho = $_REQUEST["tamanho"];
	$duracao = $_REQUEST["duracao"];
	$descricao = $_REQUEST["descricao"];
	$codigo = $_REQUEST["codigo"];
	//$tituloF = $_REQUEST["tituloF"];

	$sql = "UPDATE Video SET titulo = '" . $titulo . "', descricao = '" . $descricao . "', caminho = '" . $caminhoVideo . "', formato = '" . $formato . "', tamanho = '" . $tamanho . "', duracao = '" . $duracao . "', miniatura = '" . $caminhoMiniatura . "' WHERE codigo = " . $codigo;

	if ($conn->query($sql) === TRUE) {
	    echo "|OK";
	} else {
	    echo "|Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>