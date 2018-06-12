<?php
	include "iniciar_sessao.php";

	if (!isset($_SESSION["User"])) {
		include "logout.php";
	} else {
		echo $_SESSION["User"];
	}
?>