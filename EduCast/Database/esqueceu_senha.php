<?php
include "connect.php";

$ema = $_REQUEST["ema"];

$sql = "SELECT nome, senha FROM Usuario WHERE email = '" . $ema . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
	// A mensagem que será enviada
	$msg = "Usuário: " . $row["nome"] . "\nSenha: " . $row["senha"];
	$assunto = "EduCast - Recuperação de Conta";
	$cabe = "From: educast@educast.com";

	// Use wordwrap() se as linhas forem maiores que 70 caracteres
	//$msg = wordwrap($msg,70);

	// Enviar o e-mail
	mail($ema, $assunto, $msg, $cabe);
}

?>