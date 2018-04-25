<?php
  include "connect.php";

  $page = $_REQUEST["page"];
  $whe = $_REQUEST["whe"];
  $whe2 = $_REQUEST["whe2"];
  $partir = $page * 5;

  $sql = "SELECT codigo, titulo, descricao, caminho, formato, tamanho, duracao, miniatura FROM Video ";
  if ($whe != "") {
    $sql .= " WHERE titulo LIKE '%" . $whe . "%' ";
    if ($whe2 != "" && $whe2 != "Todas") {
      $sql .= " AND codigo IN (SELECT videoId FROM Genero WHERE nome = '" . $whe2 . "') "
    }
    $sql .= "ORDER BY dataCadastro DESC LIMIT 5 OFFSET " . $partir;
  } else {
    $sql .= "LIMIT 5 OFFSET " . $partir;
  }
  
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {

      $sql_autores = "SELECT codigo, nome FROM Autor WHERE videoId = " . $row["codigo"];
      $result_autores = $conn->query($sql_autores);

      $autores = "";
      if ($result_autores->num_rows > 0) {
        while($row_autores = $result_autores->fetch_assoc()) {
          $autores .= $row_autores["nome"] . ",";
        }
        $autores[strlen($autores) - 1] = "";
      }

      $sql_tags = "SELECT codigo, nome FROM Genero WHERE videoId = " . $row["codigo"];
      $result_tags = $conn->query($sql_tags);

      $tags = "";
      if ($sql_tags->num_rows > 0) {
        while($row_tags = $result_tags->fetch_assoc()) {
          $tags .= $row_tags["nome"] . ",";
        }
      }

      echo " " . $row["codigo"] . " " . $row["titulo"] . " " . $row["descricao"] . " " . $row["duracao"] . " " . $row["miniatura"] . " " . $row["caminho"] . " " . $autores . " " . $tags;
     }
  } else {
     echo " NULL NULL NULL NULL NULL NULL NULL NULL ";
  }
  $conn->close();
?>
