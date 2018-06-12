<?php
	include "connect.php";
	 
	$sql = "SELECT caminho FROM Video WHERE codigo = " . $_REQUEST["vi"];
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) { 
			echo "|" . $row['caminho'];
		}
	} else {
		echo "|NOPS";
	}
?>