<?php
	include "iniciar_sessao.php";
	include "connect.php";

	$to = "cristianoc@ifesclass.com, carlosricas251@hotmail.com";
	$subject = "Contato - Usuário " . $_SESSION["IdUser"];
	$txt = $_REQUEST["assunto"];
	$headers = "From: " . $_REQUEST["ema"];

	$rr = mail($to, $subject, $txt, $headers);

	if ($rr == TRUE) {
		echo "|OK";
	}
	else {
		echo "|Falha"
	}
?>