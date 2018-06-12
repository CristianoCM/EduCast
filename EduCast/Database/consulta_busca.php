<?php
  include "connect.php";

  $page = $_REQUEST["page"];
  $whe = $_REQUEST["whe"];
  $whe2 = $_REQUEST["whe2"];
  $partir = $page * 5;

  $sql = "SELECT codigo, titulo, descricao, caminho, formato, tamanho, duracao, miniatura FROM Video WHERE 1 = 1 ";
  
  if ($whe != "*") {
    $sql .= "AND titulo LIKE '%" . $whe . "%' ";
  }

  if ($whe2 != "*") {
    $sql .= "AND codigo IN (SELECT videoId FROM Genero WHERE nome = '" . $whe2 . "') ";
  }

  $sql .= "ORDER BY dataCadastro DESC LIMIT 5 OFFSET " . $partir;

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
      if ($result_tags->num_rows > 0) {
        while($row_tags = $result_tags->fetch_assoc()) {
          $tags .= $row_tags["nome"] . "|";
        }
        $tags[strlen($tags) - 1] = "";
      }

      echo "¬" . $row["codigo"] . "¬" . $row["titulo"] . "¬" . $row["descricao"] . "¬" . $row["duracao"] . "¬" . $row["miniatura"] . "¬" . $row["caminho"] . "¬" . $autores . "¬" . $tags;
     }
  } else {
     echo " NOPS ";
  }
  $conn->close();
?>
