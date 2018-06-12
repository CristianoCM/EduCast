<?php 
	include "iniciar_sessao.php";
	include "connect.php";

	$c = '/var/www/html/Perfil/' . $_SESSION["IdUser"] . "." . end(explode("/", $_FILES['file']['type']));
	move_uploaded_file($_FILES['file']['tmp_name'], $c);

	# Verificando se Perfil já existe
	if(!isset($_SESSION['perfil']) || empty($_SESSION['perfil'])) {
	   	$sql = "SELECT codigo FROM Perfil WHERE usuarioId = " . $_SESSION["IdUser"];
  		$result = $conn->query($sql);

  		if ($result->num_rows > 0) {
  			while($row = $result->fetch_assoc()) {
				$_SESSION['perfil'] = $row['codigo'];
  			}

  			$sql2 = "UPDATE Perfil SET caminhoFoto = '" . $c . "' WHERE usuarioId = " . $_SESSION["IdUser"];

			if ($conn->query($sql2) === TRUE) {
			    echo "|SHOW";
			} else {
			    echo "|Error: " . $conn->error;
			}
  		} else {
  			$sql3 = "INSERT INTO Perfil (usuarioId, caminhoFoto) VALUES (" . $_SESSION["IdUser"] . ", '" . $c . "')";

			if ($conn->query($sql3) === TRUE) {
			    echo "|SHOW";
			} else {
			    echo "|Error: " . $conn->error;
			}
  		}
	} else {
		$sql4 = "UPDATE Perfil SET caminhoFoto = '" . $c . "' WHERE usuarioId = " . $_SESSION["IdUser"];

		if ($conn->query($sql4) === TRUE) {
		    echo "|SHOW";
		} else {
		    echo "|Error: " . $conn->error;
		}
	}

	$conn->close();
 ?>